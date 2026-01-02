<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::query()->orderByDesc('is_featured')->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'avatar_image' => ['nullable', 'file', 'image', 'max:5120'],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'avatar_url' => ['nullable', 'string'],
        ]);

        // Handle avatar image upload
        $avatarImagePath = null;
        if ($request->hasFile('avatar_image')) {
            $file = $request->file('avatar_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $avatarImagePath = $file->storeAs('images/testimonials', $filename, 'public');
        }

        Testimonial::create([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_featured' => (bool) ($data['is_featured'] ?? false),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'avatar_image' => $avatarImagePath,
            'name' => $data['name'],
            'title' => $data['title'] ?? null,
            'quote' => $data['quote'],
            'avatar_url' => $data['avatar_url'] ?? null,
        ]);

        return redirect()->route('admin.testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'avatar_image' => ['nullable', 'file', 'image', 'max:5120'],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'avatar_url' => ['nullable', 'string'],
        ]);

        // Handle avatar image upload
        $avatarImagePath = $testimonial->avatar_image;
        if ($request->hasFile('avatar_image')) {
            // Delete old image if exists
            if ($testimonial->avatar_image && Storage::disk('public')->exists($testimonial->avatar_image)) {
                Storage::disk('public')->delete($testimonial->avatar_image);
            }

            $file = $request->file('avatar_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $avatarImagePath = $file->storeAs('images/testimonials', $filename, 'public');
        }

        $testimonial->update([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_featured' => (bool) ($data['is_featured'] ?? false),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'avatar_image' => $avatarImagePath,
            'name' => $data['name'],
            'title' => $data['title'] ?? null,
            'quote' => $data['quote'],
            'avatar_url' => $data['avatar_url'] ?? null,
        ]);

        return redirect()->route('admin.testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete avatar image if exists
        if ($testimonial->avatar_image && Storage::disk('public')->exists($testimonial->avatar_image)) {
            Storage::disk('public')->delete($testimonial->avatar_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index');
    }
}
