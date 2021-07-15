@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <hr>
    <!-- Looping through posts > else error message -->
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        
                            <h3><a href="/posts/{{$post->id}}" style="color:#3b46ac">{{$post->title}}</a></h3>
                        <small style="text-align:right">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts found</p>
    @endif
    
@endsection
<!-- loops through all posts in posts table in database -->