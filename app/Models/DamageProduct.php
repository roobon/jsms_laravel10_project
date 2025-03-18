<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageProduct extends Model
{
    use HasFactory;
    protected $table = 'damage_products';

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
