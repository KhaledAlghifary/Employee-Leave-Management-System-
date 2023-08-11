<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveTypes extends Model
{
    use HasFactory;
    protected $table="leave_types";
    protected $fillable = ['name', 'duration'];

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
