@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('tags')}}" class="btn btn-light">tags</a>

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
                        <p class="lead">Create New tag</p>
                        <hr class="my-2">
                        <p>More info</p>
                       
                </td>
            </tr>
            <tr>
                <td>
                 <form action="{{route('tag.store')}}" method="POST" >
                    @csrf
                    @method('POST')
               
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
