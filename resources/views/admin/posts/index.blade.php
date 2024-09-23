@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')    
    <form action="{{ route('admin.posts')}}" method="get">
        <input type="text" name="search" placeholder="Search..." value="{{ $search }}" class="form-control form-control-sm w-auto ms-auto mb-3">
    </form>

    <table class="table table-hover bg-white border text-secondary align-middle">
        <thead class="table-primary small text-uppercase text-secondary">
            <tr>
                <th></th>
                <th></th>
                <th>Category</th>
                <th>Owner</th>
                <th>Created At</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($all_posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>                    
                        <img src="{{ $post->image }}" alt="" class="image-lg d-block mx-auto">                    
                    </td>
                    <td>
                        @forelse($post->categoryPosts as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">{{ $category_post->category->name }}</div>
                        @empty
                            <div class="badge bg-dark">Uncategorized</div>
                        @endforelse                    
                    </td>
                    <td>
                        <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        {{-- status --}}
                        @if($post->trashed())
                            <i class="fa-solid fa-circle-minus text-secondary"></i> Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> Visible
                        @endif
                    </td>
                    <td>
                        {{-- button --}}
                        {{-- @if($post->user->id != Auth::user()->id) --}}
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @if($post->trashed())
                                        {{-- unhide --}}
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-post{{ $post->id }}">
                                            <i class="fa-solid fa-eye"></i> Unhide Post {{ $post->id }}
                                        </button>
                                    @else
                                        {{-- hide --}}
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post{{ $post->id }}">
                                            <i class="fa-solid fa-eye-slash"></i> Hide Post {{ $post->id }}
                                        </button>
                                    @endif                                
                                </div>
                            </div>
                            @include('admin.posts.status')
                            
                        {{-- @endif --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $all_posts->links() }}
@endsection
