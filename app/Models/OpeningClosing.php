<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningClosing extends Model
{
    use HasFactory;
    protected $table = 'opening_closing';

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
