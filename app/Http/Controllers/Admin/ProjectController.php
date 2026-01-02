<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:255'],
            'hero_image' => ['nullable', 'file', 'image', 'max:10240'],
            'hero_image_url' => ['nullable', 'string'],
            'challenge' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'results_json' => ['nullable', 'string'],
            'features_json' => ['nullable', 'string'],
            'tech_json' => ['nullable', 'string'],
            'testimonial_json' => ['nullable', 'string'],
        ]);

        // Handle hero image upload
        $heroImagePath = null;
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $heroImagePath = $file->storeAs('images/projects', $filename, 'public');
        }

        Project::create([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'slug' => $data['slug'],
            'hero_image' => $heroImagePath,
            'title' => $data['title'],
            'subtitle' => $data['subtitle'] ?? null,
            'client' => $data['client'] ?? null,
            'industry' => $data['industry'] ?? null,
            'year' => $data['year'] ?? null,
            'duration' => $data['duration'] ?? null,
            'hero_image_url' => $data['hero_image_url'] ?? null,
            'challenge' => $data['challenge'] ?? null,
            'solution' => $data['solution'] ?? null,
            'results' => $this->decodeJsonOrNull($data['results_json'] ?? null),
            'features' => $this->decodeJsonOrNull($data['features_json'] ?? null),
            'tech' => $this->decodeJsonOrNull($data['tech_json'] ?? null),
            'testimonial' => $this->decodeJsonOrNull($data['testimonial_json'] ?? null),
        ]);

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug,' . $project->id],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:255'],
            'hero_image' => ['nullable', 'file', 'image', 'max:10240'],
            'hero_image_url' => ['nullable', 'string'],
            'challenge' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'results_json' => ['nullable', 'string'],
            'features_json' => ['nullable', 'string'],
            'tech_json' => ['nullable', 'string'],
            'testimonial_json' => ['nullable', 'string'],
        ]);

        // Handle hero image upload
        $heroImagePath = $project->hero_image;
        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($project->hero_image && Storage::disk('public')->exists($project->hero_image)) {
                Storage::disk('public')->delete($project->hero_image);
            }

            $file = $request->file('hero_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $heroImagePath = $file->storeAs('images/projects', $filename, 'public');
        }

        $project->update([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'slug' => $data['slug'],
            'hero_image' => $heroImagePath,
            'title' => $data['title'],
            'subtitle' => $data['subtitle'] ?? null,
            'client' => $data['client'] ?? null,
            'industry' => $data['industry'] ?? null,
            'year' => $data['year'] ?? null,
            'duration' => $data['duration'] ?? null,
            'hero_image_url' => $data['hero_image_url'] ?? null,
            'challenge' => $data['challenge'] ?? null,
            'solution' => $data['solution'] ?? null,
            'results' => $this->decodeJsonOrNull($data['results_json'] ?? null),
            'features' => $this->decodeJsonOrNull($data['features_json'] ?? null),
            'tech' => $this->decodeJsonOrNull($data['tech_json'] ?? null),
            'testimonial' => $this->decodeJsonOrNull($data['testimonial_json'] ?? null),
        ]);

        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        // Delete hero image if exists
        if ($project->hero_image && Storage::disk('public')->exists($project->hero_image)) {
            Storage::disk('public')->delete($project->hero_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    private function decodeJsonOrNull(?string $json): mixed
    {
        $json = trim((string) $json);
        if ($json === '') {
            return null;
        }

        $decoded = json_decode($json, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
    }
}
