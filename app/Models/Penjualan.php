<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable=['id','id_toko','jumlah_item','total_bayar','nominal','kembalian','created_by','created_at'];
}
