<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveTypes;
use App\Models\User;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    //

    public function index(){
        $leaveTypes=LeaveTypes::get();

        return view('admin.manage',compact('leaveTypes'));
    }

    public function getEmployees(){
        $employees=User::where('type','employee');
        return view('admin.employees',compact('employees'));
    }

    public function leave(){
        $requests=LeaveRequest::with('employee','leaveType');
        return view('admin.leave',compact('requests'));
    }
    public function leaveApply(){

        $leaveTypes=LeaveTypes::get();
        if($leaveTypes->isNotEmpty()){
            return view('employee.leaveApply',compact('leaveTypes'));

        }
        return redirect()->back()->with('info','Leave Applying is not ready');

        
    }

    public function storeLeave(Request $request){
        dd($request);
        $data = array_merge($request->all(), [
            'user_id'=>auth()->user()->id,
             'status'=>"Pending"
        ]);
        $leaveRequest=LeaveRequest::create($data);
    }
}
