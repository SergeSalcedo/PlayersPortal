@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-dark">Go back</a>
    <br>
    <br>
    <h1>{{$post->title}}</h1> 
    <hr>
    <img style="width:600px" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small style="float:right">Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <br>
    <br>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit Post</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete Post', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection