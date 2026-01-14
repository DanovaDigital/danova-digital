<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\SiteSetting;
use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutboundController extends Controller
{
    public function whatsapp(Request $request): RedirectResponse
    {
        $settings = SiteSetting::query()->get()->keyBy('key');
        $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

        $whatsappNumber = (string) $setting('contact.whatsapp', '6281234567890');
        $whatsappNumberDigits = SiteSetting::normalizeWhatsappNumber($whatsappNumber);

        $projectTitle = $request->query('project_title');
        $customMessage = $request->query('message');

        $prefill = $setting(
            'contact.whatsapp_prefill',
            'Hi Danova, saya tertarik diskusi project website.',
        );

        if (is_string($customMessage) && trim($customMessage) !== '') {
            $prefill = mb_substr(trim($customMessage), 0, 1500);
        } elseif (is_string($projectTitle) && $projectTitle !== '') {
            $prefill = 'Hi Danova, saya tertarik diskusi project seperti ' . $projectTitle . '.';
        }

        $targetUrl = 'https://wa.me/' . $whatsappNumberDigits . '?text=' . rawurlencode($prefill);

        $this->trackOutboundEvent($request, 'whatsapp', $targetUrl);

        return redirect()->away($targetUrl);
    }

    public function email(Request $request): RedirectResponse
    {
        $settings = SiteSetting::query()->get()->keyBy('key');
        $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

        $gmail = (string) $setting('contact.email', 'danovaagency@gmail.com');

        $subject = $request->query('subject');
        if (!is_string($subject) || trim($subject) === '') {
            $subject = (string) $setting('contact.email_subject', 'Project Inquiry — Danova');
        }
        $subject = mb_substr(trim((string) $subject), 0, 120);

        $body = $request->query('body');
        if (!is_string($body) || trim($body) === '') {
            $body = (string) $setting(
                'contact.email_body',
                "Hi Danova Team,\n\nNama:\nBrand/Usaha:\nWebsite/Sosmed:\nLayanan yang dibutuhkan: (Website / Landing Page / Brand System)\nBudget range:\nTimeline:\nTujuan:\n\nThanks,\n",
            );
        }
        $body = mb_substr((string) $body, 0, 4000);

        $targetUrl = 'https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($gmail)
            . '&su=' . rawurlencode($subject)
            . '&body=' . rawurlencode($body);

        $this->trackOutboundEvent($request, 'email', $targetUrl);

        return redirect()->away($targetUrl);
    }

    public function pricing(Request $request): RedirectResponse
    {
        $settings = SiteSetting::query()->get()->keyBy('key');
        $setting = fn(string $key, $default = null) => optional($settings->get($key))->value ?? $default;

        $whatsappNumber = (string) $setting('contact.whatsapp', '6281234567890');
        $whatsappNumberDigits = SiteSetting::normalizeWhatsappNumber($whatsappNumber);

        $packageName = (string) $request->query('package', '');
        $packagePrice = (string) $request->query('price', '');

        $message = 'Hi Danova, saya tertarik dengan paket ' . $packageName . ' (' . $packagePrice . ').\n\n'
            . 'Nama:\n'
            . 'Brand/Usaha:\n'
            . 'Website/Sosmed:\n'
            . 'Timeline yang diharapkan:\n'
            . 'Tujuan project:\n\n'
            . 'Terima kasih!';

        $targetUrl = 'https://wa.me/' . $whatsappNumberDigits . '?text=' . rawurlencode($message);

        $this->trackOutboundEvent($request, 'pricing', $targetUrl, [
            'pricing_plan_id' => $request->query('plan_id'),
            'package_name' => $packageName ?: null,
            'package_price' => $packagePrice ?: null,
        ]);

        return redirect()->away($targetUrl);
    }

    private function trackOutboundEvent(Request $request, string $eventName, string $targetUrl, array $extra = []): void
    {
        $deviceType = $this->detectDeviceType($request->userAgent());
        if ($deviceType === 'bot') {
            return;
        }

        $visitorToken = $request->cookie('visitor_id');
        if (!$visitorToken) {
            $visitorToken = Str::uuid()->toString();
            cookie()->queue('visitor_id', $visitorToken, 60 * 24 * 365);
        }

        $visitor = Visitor::findOrCreateByToken($visitorToken);
        if ($visitor->wasRecentlyCreated) {
            $visitor->update([
                'first_referrer' => $request->header('referer'),
                'first_referrer_domain' => $this->extractDomain($request->header('referer')),
                'user_agent' => $request->userAgent(),
                'device_type' => $deviceType,
            ]);
        } else {
            $visitor->updateLastSeen();
        }

        $context = $request->query('context');

        $projectId = $request->query('project_id');
        if (!is_numeric($projectId)) {
            $projectId = null;
        }

        $pricingPlanId = $extra['pricing_plan_id'] ?? null;
        if (!is_numeric($pricingPlanId)) {
            $pricingPlanId = null;
        }

        AnalyticsEvent::create([
            'occurred_at' => now(),
            'visitor_id' => $visitor->id,
            'visitor_token' => $visitorToken,
            'session_id_hash' => $this->getSessionHash($request),
            'event_type' => 'outbound',
            'event_name' => $eventName,
            'context' => is_string($context) && $context !== '' ? $context : null,
            'project_id' => $projectId,
            'pricing_plan_id' => $pricingPlanId,
            'package_name' => $extra['package_name'] ?? null,
            'package_price' => $extra['package_price'] ?? null,
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
    }

    private function extractDomain(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $parsed = parse_url($url);
        return $parsed['host'] ?? null;
    }

    private function hashIp(?string $ip): ?string
    {
        if (!$ip) {
            return null;
        }

        return hash('sha256', $ip . config('app.key'));
    }

    private function getSessionHash(Request $request): ?string
    {
        $sessionId = $request->session()->getId();
        if (!$sessionId) {
            return null;
        }

        return hash('sha256', $sessionId);
    }

    private function detectDeviceType(?string $userAgent): string
    {
        if (!$userAgent) {
            return 'unknown';
        }

        $userAgent = strtolower($userAgent);

        if (preg_match('/bot|crawler|spider|crawling/i', $userAgent)) {
            return 'bot';
        }

        if (preg_match('/mobile|android|iphone|ipad|ipod/i', $userAgent)) {
            return preg_match('/ipad/i', $userAgent) ? 'tablet' : 'mobile';
        }

        if (preg_match('/tablet/i', $userAgent)) {
            return 'tablet';
        }

        return 'desktop';
    }
}
