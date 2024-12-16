<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
