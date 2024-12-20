<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;
    protected $table = 'retailers';

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
