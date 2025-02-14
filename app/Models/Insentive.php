<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insentive extends Model
{
    use HasFactory;
    protected $table = 'insentives';

    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }
}
