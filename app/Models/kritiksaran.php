<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kritiksaran extends Model
{
    use HasFactory;
    protected $table = 'kritiksaran';
    protected $fillable = ['id','nama','email','tentang','telepon','pesan'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
