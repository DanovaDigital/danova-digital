<?php

namespace App\Http\Controllers;

use App\Models\Project;

class WorkController extends Controller
{
    public function show(string $slug)
    {
        $projectModel = Project::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $image = null;
        if ($projectModel->hero_image) {
            $image = asset('storage/' . $projectModel->hero_image);
        } elseif ($projectModel->hero_image_url) {
            $image = $projectModel->hero_image_url;
        }

        $project = [
            'id' => $projectModel->id,
            'slug' => $projectModel->slug,
            'title' => $projectModel->title,
            'subtitle' => $projectModel->subtitle,
            'client' => $projectModel->client,
            'industry' => $projectModel->industry,
            'year' => $projectModel->year,
            'duration' => $projectModel->duration,
            'image' => $image,
            'challenge' => $projectModel->challenge,
            'solution' => $projectModel->solution,
            'results' => $projectModel->results ?? [],
            'features' => $projectModel->features ?? [],
            'tech' => $projectModel->tech ?? [],
            'testimonial' => $projectModel->testimonial ?? [
                'text' => null,
                'author' => null,
                'role' => null,
            ],
        ];

        return view('work-detail', ['project' => $project]);
    }
}
