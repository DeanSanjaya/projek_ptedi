<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $fillable=['id','name','email','phone','address','created_by','id_toko'];
}
