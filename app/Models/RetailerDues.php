<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerDues extends Model
{
    use HasFactory;
    protected $table = 'retailer_dues';

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
}
