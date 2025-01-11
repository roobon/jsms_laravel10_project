<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function business()
    {
        return $this->hasMany(Business::class);
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
