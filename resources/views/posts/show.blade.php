@extends('layouts.app')
@section('content')

<div class="container">
    @if (count($errors)>0)
    @foreach ($errors as $post)
        <div class="alert alert-primary" role="alert">
            <strong>{{$post}}</strong>
        </div>
    @endforeach
    @endif
    <a href="{{route('post.create')}}" class="btn btn-light">Create</a>
               
               
    <article class="col-12 col-md-6 tm-post">
        <hr class="tm-hr-primary">
        <a href="post.html" class="effect-lily tm-post-link tm-pt-60">
            <div class="tm-post-link-inner">
                <img src="{{asset($post->photo)}}" alt="Image" class="img-fluid">                            
            </div>
            <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->title}}</h2>
        </a>                    
        <p class="tm-pt-30">
            {{$post->content}}
        </p>
        <div class="d-flex justify-content-between tm-pt-45">
            <span class="tm-color-primary">{{$post->title}}</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
           
            <span>Created At: {{$post->created_at->diffForhumans()}}</span>
            <span>Updated At: {{$post->updated_at->diffForhumans()}}</span>
        </div>
        <div class="d-flex justify-content-between">
           
            <span><h3>{{$post->user->name}}</h3></span>
        </div>
    </article>




            
</div>
    
@endsection