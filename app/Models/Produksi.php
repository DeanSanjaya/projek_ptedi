<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $fillable=['id','bahan','row','id_barang','jumlah','jumlah_deskripsi','created_by','id_toko'];
}
