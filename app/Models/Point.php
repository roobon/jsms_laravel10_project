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

    public function sales()
    {
        return $this->hasMany(OutgoingSale::class);
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }
}
