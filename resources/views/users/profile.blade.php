@extends('layouts.app')
@section('content')
@php
    $genderArray = ['Male', 'Female'];
    $provinceArray = ['damascus', 'aleepo','homs', 'edlib', 'latakia', ];
@endphp
<div class="container"style="padding-top:3%">
  @if (count($errors)>0)
  @foreach ($errors->all() as $item)
  <div class="alert alert-danger" role="alert">
      {{$item}}
    </div>
  @endforeach

  @endif

<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="exampleormControlInput1">Name</label>
      <input type="text" value="{{$user->name}}" name="name" class="form-control"  id="exampleormControlInput1">
    </div><hr>

    <div class="form-group">
      <label for="exampleFormControlInut1">Province</label>
      <select class="form-control" name="province" id="exampleFormControlSelect1">
        @foreach ($provinceArray as $item)
        <option value="{{$item}}" {{($user->profile->province == $item) ? 'selected':''}}>{{$item}}</option>
        @endforeach
    </select>
    </div>
    <hr>

    <div class="form-group">
      <label for="exampleFormControlInput1">FaceBook</label>
      <input type="text" value="{{$user->profile->facebook}}" class="form-control"  id="exampleFormControlInput1"name="facebook">
    </div>
    <hr>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Gender</label>
      <select class="form-control" name="gender" id="exampleFormControlSelect1">
        @foreach ($genderArray as $item)
            
        <option value="{{$item}}" {{($user->profile->gender == $item) ? 'selected':''}}>{{$item}}</option>
        @endforeach
       

    </select>
    </div>
    <hr>

    <div class="form-group">
      <label for="exampleFormControlTextarea1"  >Bio</label>
      <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">{!!$user->profile->bio!!}</textarea>
    </div>
    <hr>
    <div class="form-group">
        <label for="exampleFormControlInput8">Password</label>
        <input type="password"   class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput5">Confirm Password</label>
        <input type="password"   class="form-control" name="c_password">
    </div> <hr>
    
    <div class="form-group">
      <button class="btn btn-success" type="submit" > Update </button>
    </div>
    
  </form>
</div>
@endsection