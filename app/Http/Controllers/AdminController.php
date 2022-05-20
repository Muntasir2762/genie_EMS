<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\EmployeeReport;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $users= User::all();

        return view('dashboards.admins.index',compact('users'));
       }

   public function createemployee(){

        return view('dashboards.admins.createemployee');
       }

       public function storeemployee(Request $request)
       {
        $request->validate(['name' => 'required|max: 255',],['name.required'=> 'Please Insert the Employee User Name']);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = \Hash::make($request->password);
   
   
           $user->save();
           return redirect()->route('admin.dashboard');
       }

       public function employeereport($date){

        $employeereport=EmployeeReport::orderBy('date','asc')->where('date',$date)->get();

        return view('dashboards.admins.employeereport',compact('employeereport'));
       }

       
}
