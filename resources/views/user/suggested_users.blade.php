@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
<div class="container w-50">
    <h3 class="h4 mb-3">Suggested</h3>
    @foreach($all_suggested_users as $user)
        <div class="row mb-3 align-items-center">
            <div class="col-3">
                <a href="{{ route('profile.show', $user->id) }}">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-md">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                    @endif
                </a>
            </div>
            <div class="col text-truncate ps-0">                
                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
               
                <p class="mb-0 text-muted">{{ $user->email }}</p>
                
                <p class="mb-0 text-muted small">
                    @if($user->isFollower())
                        Follows you
                    @else
                        @if($user->followers->count() > 1)
                            {{ $user->followers->count() }} followers
                        @elseif($user->followers->count() == 1)
                            1 follower
                        @else
                            No followers yet
                        @endif
                    @endif
                </p>
            </div>
            <div class="col-auto">
                <form action="{{ route('follow.store', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn p-0 text-primary">Follow</button>
                </form>
            </div>
        </div>
    @endforeach
@endSection