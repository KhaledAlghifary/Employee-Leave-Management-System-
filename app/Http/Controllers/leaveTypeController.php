<?php

namespace App\Http\Controllers;

use App\Models\LeaveTypes;
use Illuminate\Http\Request;
use App\Http\Requests\leaveTypeRequest;

class leaveTypeController extends Controller
{
    //
    public function __construct()
    {
            $this->middleware('checkRole:admin');
    }

    public function index(){
        $leave_types=LeaveTypes::get();
        return view('leaveTypes.index',[$leave_types]);

    }

    public function show(){

    }
    public function create(){
        $title="Create Leave Type";
        $route=route('types.store');
        $method=1;
        $view= view()->make('admin.leave_types.form',['title'=>$title,'route'=>$route,'method'=>$method]);
        $html = $view->render();

        return $html;

    }

    public function store(leaveTypeRequest $request){
       
         $leave_type=LeaveTypes::create($request->all());
         if( $leave_type)
        return redirect()->back()->with('success','Leave Type is added successfully');
        else
        return redirect()->back()->with('error','Something has gone wrong!');

        

    }

    public function edit(LeaveTypes $type){
        $title="Update Leave Type";
        $route=route('types.update',$type->id);
        $method=2;
        $view= view()->make('admin.leave_types.form',['title'=>$title,'route'=>$route,'method'=>$method,'type'=>$type]);
        $html = $view->render();

        return $html;
    }
    public function update(leaveTypeRequest $request, LeaveTypes $type){
         $leave_type=$type->update($request->all());

         if( $leave_type)
         return redirect()->back()->with('success','Leave Type is Updated successfully');
         else
         return redirect()->back()->with('error','Something has gone wrong!');
        
    }

    public function destroy(Request $request, LeaveTypes $type){
        $leave_type=$type->delete();
         if( $leave_type)
         return redirect()->back()->with('success','Leave Type is deleted successfully');
         else
         return redirect()->back()->with('error','Something has gone wrong!');

    }


}
