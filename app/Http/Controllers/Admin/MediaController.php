<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::query()->orderByDesc('id')->get();

        return view('admin.media.index', ['media' => $media]);
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required', 'file', 'max:10240'],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        $file = $request->file('file');
        $path = $file->store('cms', 'public');

        Media::create([
            'disk' => 'public',
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'title' => $data['title'] ?? null,
            'alt_text' => $data['alt_text'] ?? null,
        ]);

        return redirect()->route('admin.media.index');
    }

    public function edit(Media $medium)
    {
        return view('admin.media.edit', ['medium' => $medium]);
    }

    public function update(Request $request, Media $medium)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        $medium->update($data);

        return redirect()->route('admin.media.index');
    }

    public function destroy(Media $medium)
    {
        Storage::disk($medium->disk)->delete($medium->path);
        $medium->delete();

        return redirect()->route('admin.media.index');
    }
}
