<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable=['id','id_pemasok','id_kat','id_brng','jumlah','hargabeli','totalbeli','deskripsijumlah','berat_volume','desk_b_v','created_by','id_toko'];
}
