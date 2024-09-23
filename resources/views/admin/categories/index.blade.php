@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')

<div class="row mb-2">
    <div class="col-4">
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf        
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Add a category...">
    </div>
    <div class="col-2">
            <button type="submit" class="form-control btn btn-primary">+ Add</button>
    </div>
    <div class="row">
            @error('name')
                <p class="text-danger m-0 small">{{ $message }}</p>
            @enderror
    </div>
    </form>
</div>
    <table class="table table-hover bg-white border text-secondary text-center align-middle">
        <thead class="table-warning small text-uppercase text-secondary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Count</th>
                <th>Last Updated</th>
                <th></th>                
            </tr>
        </thead>
        <tbody>
            @forelse($all_categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td class="text-dark">{{ $category->name }}</td>
                    <td>{{ $category->categoryPosts->count() }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit-category{{ $category->id }}">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-category{{ $category->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                    @include('admin.categories.delete')
                </tr>
            @empty
                <td class="text-center" colspan="5">No categories yet.</td>
            @endforelse
            <tr>
                <td>0</td>
                <td>Uncategorized</td>
                <td>{{ $uncategorized_count }}</td>
                <td colspan="2"></td>                
            </tr>
        </tbody>
    </table>

    {{ $all_categories->links() }}

@endsection