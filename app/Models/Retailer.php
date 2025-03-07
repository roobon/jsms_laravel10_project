<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;
    protected $table = 'retailers';

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function dues()
    {
        return $this->hasMany(RetailerDues::class);
    }

    public function point()
    {
        return $this->belongsTo(Point::class);
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function delman()
    {
        return $this->belongsTo(Employee::class, 'delman_id');
    }
}
