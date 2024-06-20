@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>User Create</th>
            <th>Title</th>
            <th>Content</th>
            <th>photo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($post as $item)
                
           
            <tr>
                <td scope="row">{{$item->data['user_create']}}</td>
                <td>{{$item->data['body']}}</td>
                <td>{{$item->data['content']}}</td>
                <td>
                    <img src="{{asset($item->data['photo'])}}" width="300"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
@endsection