@extends('admin.layout')

@section('title', 'Edit FAQ — Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1>Edit FAQ</h1>
            <div class="muted">{{ $faq->question }}</div>
        </div>
        <a class="btn" href="{{ route('admin.faqs.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order) }}" />
            </div>

            <div class="field">
                <label class="checkbox">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $faq->is_published) ? 'checked' : '' }} />
                    Published
                </label>
            </div>
        </div>

        <div class="field">
            <label>Question</label>
            <input type="text" name="question" value="{{ old('question', $faq->question) }}" />
        </div>

        <div class="field">
            <label>Answer</label>
            <textarea name="answer">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn" href="{{ route('admin.faqs.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection