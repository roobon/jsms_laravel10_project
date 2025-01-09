<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessLaunching extends Model
{
    use HasFactory;
    protected $table = 'business_launching';
    protected $fillable = [
        'launching_date',
        'security_money',
        'point_id',
        'company_id',
        'employee_id'
    ];
}
