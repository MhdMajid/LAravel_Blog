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
    <a href="{{route('tag.create')}}" class="btn btn-light">Create</a>
    <a href="{{route('posts')}}" class="btn btn-light">Home</a>
        <table class="table">
            <tr >
                <thead class="thead-light">
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag as $item)
                <tr>
                    <td scope="row"> #</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a class="btn btn-dark" href="{{route('tag.edit',$item->id)}}">Edit</a>
                        <a class="btn btn-dark" href="{{route('tag.destroy',$item->id)}}">Delelte</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    
            
</div>
    
@endsection