<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stokbarang extends Model
{
    protected $fillable=['id','id_kat','id_brng','jumlah','hargajual'];
}
