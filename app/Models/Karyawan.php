<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [

        'id','name','email','phone','address','id_toko'
    ];
}
