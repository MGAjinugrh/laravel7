@extends('layouts.app')
@section('title',$post->title)
@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <div class="text-secondary">
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> &middot; {{ $post->created_at->format("d, F Y") }}
        @isset ($post->tags)
            &middot;
        @endisset
        @foreach ($post->tags as $tag)
            <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
        @endforeach
    </div>
    <hr>
    <p>{{ $post->body }}</p>
    <p>
        <div class="text-secondary">
            Written by {{ $post->user->name }}
        </div>
        @if(auth()->user()->id == $post->user_id)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link text-danger btn-sm p-0" data-toggle="modal" data-target="#deleteModal">
                Delete
            </button>    
        @endif
        <a href="{{ route('posts.index') }}" class="btn btn-link text-primary btn-sm p-0">Kembali</a>
    </p>
</div>
@if(auth()->user()->id == $post->user_id)
    @include('posts.partials.modal')    
@endif
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
