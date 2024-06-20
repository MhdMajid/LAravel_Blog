@extends('layouts.app')
@section('content')

<div class="container">
   
    <a href="{{route('posts')}}" class="btn btn-light">All Posts</a>
               
    
   
        <div class="card" style="background-color:rgb(138, 233, 236); border-color:darkblue;">
            <img class="card-img-top"  src="{{URL::asset($post->data['photo'])}}"   alt="{{URL::asset($post->data['photo'])}}">
            <div class="card-body">
            <h4 class="card-title">{{$post->data['user_create']}}</h4>
            <h3 class="card-title">{{$post->data['body']}}</h3>
            <p class="card-text">{{$post->data['content']}}</p>
            <p class="card-text">Created At:{{$post->created_at->diffForhumans()}}</p>
          </div>
        </div>
   

            
</div>
    
@endsection