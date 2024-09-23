@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <p class="mb-2 fw-bold">Category <span class="fw-light">(up to 3)</span></p>
        <div>
            @forelse ($all_categories as $category)
                <div class="form-check form-check-inline">
                    @if(in_array($category->id, $selected_categories))
                        {{-- category(loop) is included in post categories --}}
                        {{-- in_array function check if category is in array 'selected_categories' --}}
                        <input class="form-check-input" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}" checked>
                    @else
                        <input class="form-check-input" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}">
                    @endif
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @empty
                <span class="text-muted">No categories found</span>
            @endforelse
        </div>
        @error('categories')
            <p class="mb-0 text-danger small">{{ $message }}</p>
        @enderror

        <label for="description" class="form-label mt-3 fw-bold">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $post->description) }}</textarea>
        @error('description')
            <p class="mb-0 text-danger small">{{ $message }}</p>
        @enderror

        <label for="image" class="form-label mt-3 fw-bold">Image</label>        
        <img src="{{ $post->image }}" alt="" class="w-50 img-thumbnail d-block mb-1">
        <input type="file" name="image" id="image" class="form-control">
        <p class="form-text mb-0">
            Acceptable formats: jpeg, jpg, png, gif <br>
            Max size: 1048 KB
        </p>
        @error('image')
            <p class="mb-0 text-danger small">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-warning px-4 mt-3">Save</button>

    </form>


@endsection