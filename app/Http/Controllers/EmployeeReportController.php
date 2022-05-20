<?php

namespace App\Http\Controllers;

use App\Models\EmployeeReport;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EmployeeReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeReport  $employeeReport
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeReport $employeeReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeReport  $employeeReport
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeReport $employeeReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeReport  $employeeReport
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {
        $employeereport = new EmployeeReport();
        $employeereport->name = $request->name;
        $employeereport->email = $request->email;
        $employeereport->date = Carbon::today();
        $employeereport->checkin =Carbon::now(); ;

   
   
           $employeereport->save();
           return redirect()->route('user.checkout');
    }

    public function checkout()
    {

           return view('dashboards.users.checkout');
    }

    public function docheckout($email)
    {
        $employeereport = EmployeeReport::where('email',$email)->where('date',Carbon::today())->where('checkout',NULL)->first();
        $employeereport->checkout =Carbon::now(); 

   
   
           $employeereport->save();
           return redirect()->route('user.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeReport  $employeeReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeReport $employeeReport)
    {
        //
    }
}
