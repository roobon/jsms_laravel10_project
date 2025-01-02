<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
