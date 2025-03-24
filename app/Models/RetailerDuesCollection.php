<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerDuesCollection extends Model
{
    use HasFactory;
    protected $table = 'retailer_dues_collecion';

    public function retailer()
    {
        
    }
}
