<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPenjualan extends Model
{
    protected $fillable=['id','id_penjualan','id_barang','nama_barang','jumlah_barang','harga','subtotal'];
}
