@extends('dashboards.users.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="card">
  <div class="card-header">Date: {{ now()->day }}-{{ now()->month }}-{{ now()->year }} </div>
  <div class="card-body">
      <form action=" {{route('user.checkin')}} " method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="name" name="name" value={{ Auth::user()->name }}>
        <input type="hidden" id="email" name="email" value={{ Auth::user()->email }}>

        <input type="submit" value="Check In" class="btn btn-success"></br>
    </form>
  
  </div>
</div>

@endsection