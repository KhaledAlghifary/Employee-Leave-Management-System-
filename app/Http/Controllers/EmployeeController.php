<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveTypes;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Http\Requests\leaveApplyRequest;

class EmployeeController extends Controller
{

    public function __construct()
    {
            $this->middleware('checkRole:employee');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //\
        $user_leave_requests=auth()->user()->leaveRequests()->where('start_date','>=',now())->orderBy('start_date','desc')->get();
        $remaining_days=auth()->user()->remaining_days;
        $taken_days=auth()->user()->approvedLeaveDuration();
        return view('employee.employee_dashboard',compact('user_leave_requests','remaining_days','taken_days'));
    }


    public function leaveApply(){

        $leaveTypes=LeaveTypes::get();
        if($leaveTypes->isNotEmpty()){
            return view('employee.leaveApply',compact('leaveTypes'));

        }
        return redirect()->back()->with('info','Leave Applying is not ready');

        
    }

    public function storeLeave(leaveApplyRequest $request){
        $data = array_merge($request->all(), [
            'user_id'=>auth()->user()->id,
             'status'=>"Pending"
        ]);
        $leaveRequest=LeaveRequest::create($data);

        if( $leaveRequest)
        $html= 'Leave Request is added successfully';
        else
        $html= 'Something has gone wrong!';

        
        return $html;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }



}
