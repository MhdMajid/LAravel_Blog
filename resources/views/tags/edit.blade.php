@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('tags')}}" class="btn btn-light">Tags</a>

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
                        <h1 class="display-3">Make you'r tag !!</h1>
                        <p class="lead">edit your  tag</p>
                        <hr class="my-2">
                        <p>More info</p>
                       
                </td>
            </tr>
            <tr>
                <td>
                 <form action="{{route('tag.update',$tag->id)}}" method="POST" >
                    @csrf
                    @method('POST')
               
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{$tag->name}}"  name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        <hr>
                        <p class="lead">
                            <button class="btn btn-primary btn-lg" type="submit" ">edit</button>
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
