<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';

    public function retailer()
    {
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
