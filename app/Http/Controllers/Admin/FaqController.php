<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.faqs.index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        Faq::create([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);

        return redirect()->route('admin.faqs.index');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', ['faq' => $faq]);
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $faq->update([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);

        return redirect()->route('admin.faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index');
    }
}
