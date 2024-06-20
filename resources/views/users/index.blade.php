@extends('layouts.app')
@section('content')

<div class="container ">
    <a class="btn btn-info" href="{{route('user.create')}}" >Create</a>
    <hr>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mail</th>
                <th>State</th>
                <th>Roule</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td scope="row">{{$item->id}}</td>
                <td >{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>@if ($item->state == 1)
                    Activate
                    @else
                    Not Active
                @endif
           
            </td>
                <td>{{$item->role}}</td>


                
                <td>
                    <a class="btn btn-primary btn-sm " href="{{route('user.destroy',$item->id)}}" role="button">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
@endsection