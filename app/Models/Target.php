<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = 'targets';

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
