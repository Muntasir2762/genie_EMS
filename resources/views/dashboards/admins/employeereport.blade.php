@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Employee Report</div>
                    <div class="card-body">
                    
                    <form action=" {{route('admin.employeereport')}} " method="GET" enctype="multipart/form-data">
                      @csrf

                     <input type="text" name="date" id="date" placeholder="ex:2022-05-20" class="form-control"></br>
                     <input type="submit" value="See Report" class="btn btn-success"></br>
                    </form>

                    @foreach ($employeereport->slice(0,1) as $report)
                      Date:{{$report->date}} <br>
                    @endforeach 
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employeereport as $report)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ $report->checkin }}</td>
                                        <td>{{ $report->checkout }}</td>
                                        <td>
                                            <a href="{{route('admin.employeedetails',$report->email)}}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
