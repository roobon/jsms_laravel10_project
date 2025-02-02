<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $table = 'investments';

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
