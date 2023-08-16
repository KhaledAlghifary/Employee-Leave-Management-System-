<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LeaveTypes;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\leaveApplyRequest;

class ManageController extends Controller
{
    //

    public function __construct()
    {
            $this->middleware('checkRole:admin');
    }

    public function index(){
        return view('admin.admin_dashboard');
    }

    public function manage(Request $request){
        $leaveTypes=LeaveTypes::orderBy('id', 'desc')->paginate(5);
       
        return view('admin.manage',compact('leaveTypes'));
    }

    public function getEmployees(){
        $employees=User::where('type','employee');
        return view('admin.employees',compact('employees'));
    }

    public function leave(){
        $requests=LeaveRequest::with('employee','leaveType')->paginate(5);
        return view('admin.leave',compact('requests'));
    }
   
    public function manageLeaveModal($status,$user_id,$leave){
        $route=route('admin.manageLeave',$leave);
       
        $view= view()->make('admin.leaveManageModal',compact('status','user_id','route'));
        $html = $view->render();

        return $html;

    }
    public function manageLeave(Request $request,LeaveRequest $leave){
        $user=User::findOrFail($request->user_id);
        if($user){

            if($request->status == 1){
                  return DB::transaction(function() use($request,$leave,$user){
                    $leave->status='Approved';
                    $date1 = Carbon::parse($leave->start_date);
                    $date2 = Carbon::parse($leave->end_date);
                    $interval = $date1->diffInDays($date2);;
                    if($interval <= $user->remaining_days)
                        $user->remaining_days-=$interval;
                    else
                    return redirect()->route('admin.leave')->with('error',"User doesn't have much remaing days");
                    if(isset($request->admin_comments)){
                        $leave->admin_comments=$request->admin_comments;
                    }
                    $leave->save();
                    $user->save();

                    return redirect()->route('admin.leave')->with('success','Leave  has been added Managed');

                    
                });
            }
            else{
                $leave->status='Rejected';
                if(isset($request->admin_comments)){
                    $leave->admin_comments=$request->admin_comments;
                }
                $leave->save();
                return redirect()->route('admin.leave')->with('success','Leave  has been added Managed');


            }



        }
       

    }
}
