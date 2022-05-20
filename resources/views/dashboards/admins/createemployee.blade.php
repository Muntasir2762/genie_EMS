@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="card">
  <div class="card-header">Create New Employee</div>
  <div class="card-body">
      
      <form action=" {{route('admin.storeemployee')}} " method="POST" enctype="multipart/form-data">
        @csrf
        <label>User Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        <label>Password</label></br>
        <input type="password" name="password" id="password" class="form-control"></br>
        <input type="submit" value="Add New" class="btn btn-success"></br>
    </form>
  
  </div>
</div>

@endsection