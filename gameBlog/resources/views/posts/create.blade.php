@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
            @csrf
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <!--
            Image upload
            -->
            <div class = "form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-dark'])}}
        {!! Form::close() !!}
@endsection

<!-- POST method in form, User creates a title and Body then clicks submit and sends the form data to posts table in database -->