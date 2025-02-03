<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'businesses';
    protected $fillable = [
        'launch_date',
        'security_money',
        'point_id',
        'company_id',
        'status'
    ];

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function investment()
    {
        return $this->hasMany(Investment::class);
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
