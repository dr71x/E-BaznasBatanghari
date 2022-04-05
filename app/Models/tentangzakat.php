<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentangzakat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipe(){
        return $this->belongsTo(detail::class,'tipe_id');
    }
}
