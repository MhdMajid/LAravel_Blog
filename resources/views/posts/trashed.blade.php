@extends('layouts.app')
@section('content')

<div class="container">
    @if (count($errors)>0)
    @foreach ($errors as $item)
        <div class="alert alert-primary" role="alert">
            <strong>{{$item}}</strong>
        </div>
    @endforeach
    @endif
    <a href="{{route('posts')}}" class="btn btn-light">Home</a>
        @if (count($post)>0)
        <table class="table">
            <tr >
                <thead class="thead-light">
                    <th>#</th>
                    <th>User_id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $item)
                <tr>
                    <td scope="row"> #</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td><img class="img-tumbnail" src="{{URL::asset($item->photo)}}" width="100px" height="100px" alt="{{$item->photo}}"></td>
                    <td>
                        <a class="btn btn-dark" href="{{route('post.restore',$item->id)}}">Restore</a>
                        <a class="btn btn-dark" href="{{route('post.hdelete',$item->id)}}">Delelte</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    
            
        @else
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">no post to show</h4>
              
              <p class="mb-0"></p>
            </div>
        @endif
</div>
    
@endsection