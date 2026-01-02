<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use App\Models\Visitor;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests
        if ($request->method() !== 'GET') {
            return $response;
        }

        // Exclude admin routes
        if ($request->is('admin') || $request->is('admin/*')) {
            return $response;
        }

        // Exclude asset requests
        if ($request->is('build/*') || $request->is('images/*') || $request->is('storage/*')) {
            return $response;
        }

        // Exclude outbound tracking routes (these are tracked in analytics_events)
        if ($request->is('out') || $request->is('out/*')) {
            return $response;
        }

        // Get or create visitor token
        $visitorToken = $request->cookie('visitor_id');
        if (!$visitorToken) {
            $visitorToken = Str::uuid()->toString();
            cookie()->queue('visitor_id', $visitorToken, 60 * 24 * 365); // 1 year
        }

        // Find or create visitor
        $visitor = Visitor::findOrCreateByToken($visitorToken);

        // Update visitor metadata on first visit
        if ($visitor->wasRecentlyCreated) {
            $visitor->update([
                'first_referrer' => $request->header('referer'),
                'first_referrer_domain' => $this->extractDomain($request->header('referer')),
                'user_agent' => $request->userAgent(),
                'device_type' => $this->detectDeviceType($request->userAgent()),
            ]);
        } else {
            $visitor->updateLastSeen();
        }

        // Determine page type and key
        $routeName = $request->route()?->getName();
        $pageType = null;
        $pageKey = null;
        $projectId = null;

        if ($routeName === 'landing' || $request->path() === '/') {
            $pageType = 'landing';
            $pageKey = 'home';
        } elseif ($routeName === 'work.detail') {
            $pageType = 'work_detail';
            $slug = $request->route('slug');
            $pageKey = $slug;

            // Find project ID
            $project = Project::where('slug', $slug)->first();
            if ($project) {
                $projectId = $project->id;
            }
        }

        // Track page view
        PageView::create([
            'occurred_at' => now(),
            'visitor_id' => $visitor->id,
            'visitor_token' => $visitorToken,
            'session_id_hash' => $this->getSessionHash($request),
            'method' => $request->method(),
            'status_code' => $response->getStatusCode(),
            'path' => $request->path(),
            'route_name' => $routeName,
            'page_type' => $pageType,
            'page_key' => $pageKey,
            'project_id' => $projectId,
            'referrer' => $request->header('referer'),
            'referrer_domain' => $this->extractDomain($request->header('referer')),
            'utm_source' => $request->query('utm_source'),
            'utm_medium' => $request->query('utm_medium'),
            'utm_campaign' => $request->query('utm_campaign'),
            'utm_term' => $request->query('utm_term'),
            'utm_content' => $request->query('utm_content'),
            'ip_hash' => $this->hashIp($request->ip()),
            'user_agent' => $request->userAgent(),
        ]);

        return $response;
    }

    /**
     * Extract domain from URL
     */
    private function extractDomain(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $parsed = parse_url($url);
        return $parsed['host'] ?? null;
    }

    /**
     * Hash IP address for privacy
     */
    private function hashIp(?string $ip): ?string
    {
        if (!$ip) {
            return null;
        }

        return hash('sha256', $ip . config('app.key'));
    }

    /**
     * Get session hash
     */
    private function getSessionHash(Request $request): ?string
    {
        $sessionId = $request->session()->getId();
        if (!$sessionId) {
            return null;
        }

        return hash('sha256', $sessionId);
    }

    /**
     * Detect device type from user agent
     */
    private function detectDeviceType(?string $userAgent): string
    {
        if (!$userAgent) {
            return 'unknown';
        }

        $userAgent = strtolower($userAgent);

        // Check for bots
        if (preg_match('/bot|crawler|spider|crawling/i', $userAgent)) {
            return 'bot';
        }

        // Check for mobile
        if (preg_match('/mobile|android|iphone|ipad|ipod/i', $userAgent)) {
            return preg_match('/ipad/i', $userAgent) ? 'tablet' : 'mobile';
        }

        // Check for tablet
        if (preg_match('/tablet/i', $userAgent)) {
            return 'tablet';
        }

        return 'desktop';
    }
}
