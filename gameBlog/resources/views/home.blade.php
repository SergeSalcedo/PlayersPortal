@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header" style="background-color:#87CEEB">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                    <div>
                        <a class="btn btn-dark float-right" href="/posts/create" style="text-decoration:none">Create a Post</a>
                        <h3>Here are your posts:</h3>
                        <br>
                        @if(count($posts)>0)
                            <table class="table table-dark" style="background-color:#87CEEB">
                                <tr>
                                <thead>
                                    <th>Post Title:</th>  
                                </thead>
                                <br>
                                    @foreach($posts as $post)
                                        
                                        <tbody>
                                            <td class="pt-3">{{$post->title}}</td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning float-right">Edit</a></td>
                                            <td>
                                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tbody>
                                        
                                    @endforeach
                                </tr>
                            </table>
                        @else
                            <p>No posts to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
