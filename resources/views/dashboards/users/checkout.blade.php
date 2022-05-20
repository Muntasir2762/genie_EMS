@extends('dashboards.users.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="card">
  <div class="card-header">Date: {{ now()->day }}-{{ now()->month }}-{{ now()->year }} </div>
  <div class="card-body">
      <form action=" {{route('user.docheckout',Auth::user()->email)}} " method="POST" enctype="multipart/form-data">
        @csrf
        <input type="submit" value="Check Out" class="btn btn-success"></br>
    </form>
  
  </div>
</div>

@endsection