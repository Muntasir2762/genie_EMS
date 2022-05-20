<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeReport extends Model
{
    protected $table = 'employee_report';
    protected $fillable = [
        'name', 'email', 'date', 'checkin', 'checkout'
    ];
}
