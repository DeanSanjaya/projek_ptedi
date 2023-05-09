<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable=['id','id_kat','name','berat_volume','stok','stok_deskripsi','jumlah_besar','jumlah_besar_deskripsi','jumlah_kecil','jumlah_kecil_deskripsi','harga_jual','updated_by'];
}
