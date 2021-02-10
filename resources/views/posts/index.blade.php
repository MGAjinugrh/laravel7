@extends('layouts.app')
@section('title','Posts')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            @isset($category)
                <h4>Category : {{ $category->name }}</h4>            
            @elseif(isset($tag))
                <h4>Tag : {{ $tag->name }}</h4>
            @else
                <h4>All Posts</h4>
            @endisset
            <hr>
        </div>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>                
        </div>
    </div>
    <div class="row">
        @if ($posts->count())
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <div>
                            {{ Str::limit($post->body,100,'...') }}
                        </div>
                        <a href="/posts/{{ $post->slug }}">Read more</a>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            Diterbitkan {{ $post->created_at->diffForHumans() }} {{-- config>app.php => locale:'id' --}}
                            <!-- is login -->
                            @if(auth()->user()->is($post->user))
                                <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning text-white">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="d-flex justify-content-center">Nothing to see here...</div>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
