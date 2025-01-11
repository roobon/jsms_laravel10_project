<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'points';

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function business()
    {
        return $this->hasMany(Business::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
