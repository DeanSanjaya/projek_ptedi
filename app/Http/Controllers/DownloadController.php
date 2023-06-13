<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Karyawan;
use App\Models\Barang;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use PDF;


class DownloadController extends Controller
{
    public function all_report_pdf()
    {
        $pembelian = DB::table('pembelians')->select('pembelians.id AS id', 'pembelians.id_toko', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'pembelians.berat_volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'pembelians.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->where('pembelians.id_toko', auth::user()->id_toko)->orderBy('pembelians.id', 'ASC')->get();
        $totalbeli = DB::table('pembelians')->select('totalbeli', 'id_toko')->where('pembelians.id_toko', auth::user()->id_toko)->sum('totalbeli');
        $penjualan = Penjualan::Select('penjualans.created_at AS date', 'penjualans.id', 'penjualans.id_toko', 'penjualans.jumlah_item', 'penjualans.total_bayar', 'penjualans.nominal', 'penjualans.kembalian', 'penjualans.created_by', 'item_penjualans.id_penjualan', 'item_penjualans.nama_barang', 'item_penjualans.jumlah_barang', 'item_penjualans.harga', 'item_penjualans.subtotal')->join('item_penjualans', 'item_penjualans.id_penjualan', '=', 'penjualans.id')->where('penjualans.id_toko', auth::user()->id_toko)->get();
        // $penjualan = Penjualan::Select('penjualans.created_at AS date', 'penjualans.id', 'penjualans.id_toko', 'penjualans.jumlah_item', 'penjualans.total_bayar', 'penjualans.nominal', 'penjualans.kembalian', 'penjualans.created_by')->where('penjualans.id_toko', auth::user()->id_toko)->get();
        // $itempenjualan = DB::table('item_penjualans')->select('item_penjualans.id','penjualans.id_toko','item_penjualans.id_penjualan','penjualans.id','item_penjualans.nama_barang','item_penjualans.jumlah_barang','item_penjualans.harga','item_penjualans.subtotal')->join('penjualans', 'item_penjualans.id_penjualan', '=', 'penjualans.id')->where('penjualans.id_toko', auth::user()->id_toko)->get();;
        // dd($itempenjualan);
        $totaljual = DB::table('penjualans')->select('total_bayar', 'id_toko')->where('penjualans.id_toko', auth::user()->id_toko)->sum('total_bayar');
        $karyawan = Karyawan::where('id_toko', Auth::user()->id_toko)->get();
        $toko = Toko::where('id',Auth::user()->id_toko)->get();
        // dd($toko);
        $pdf = PDF::loadView('download/all_report_pdf', ['pembelian' => $pembelian,'penjualan'=> $penjualan,'karyawan'=>$karyawan,'toko'=>$toko,'totalbeli'=>$totalbeli,'totaljual'=>$totaljual]);
        return $pdf->stream();
        // return $itempenjualan;
    }
}
