<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $table="leave_requests";

    protected $fillable = ['user_id', 'leave_type_id', 'start_date', 'end_date', 'status', 'employee_comments','admin_comments'];

    public function employee()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveTypes::class);
    }


}
