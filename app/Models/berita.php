<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipe(){
        return $this->belongsTo(tipe::class,'tipe_id');
    }
}
