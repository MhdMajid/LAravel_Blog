@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('posts')}}" class="btn btn-light">Posts</a>

    @if (count($errors)>0)
        <ul>
            @foreach ($errors as $item)
                <li>
                    <div class="alert alert-primary" role="alert">
                        <strong>{{$item}}</strong>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    <table class="table">
        <tbody>
            <tr>
                
                <td>
                    <div class="jumbotron">
                        <h1 class="display-3">Make you'r Post !!</h1>
                        <p class="lead">Create New Post</p>
                        <hr class="my-2">
                        <p>More info</p>
                       
                </td>
            </tr>
            <tr>
                <td>
                 <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
               
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        <hr>
                        @foreach ($tags as $item)
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" id="{{$item->name}}" value="{{$item->id}}">
                                <label for="{{$item->name}}">{{$item->name}}</label>
                                
                            </div>
                            @endforeach
                        <hr>
                        <label for="">Content</label>
                        <textarea type="text" name="content" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        
                        </textarea>
                            <hr>
                        <label for="">Photo</label>
                        <input type="file" name="photo" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        <hr>
                        <p class="lead">
                            <button class="btn btn-primary btn-lg" type="submit" ">Create</button>
                        </p>
                      </div>
                 </form>
                </td>
            </tr>
           
        </tbody>
    </table>
</div>

</div>
@endsection
