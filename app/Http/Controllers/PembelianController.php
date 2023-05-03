<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasoks = Pemasok::orderBy('id', 'DESC')->get();
        $kategoris = Kategori::orderBy('id', 'ASC')->get();
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'kategoris.id AS id_kat', 'barangs.berat_volume', 'barangs.keterangan')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->orderBy('barangs.id', 'ASC')->get();
        $pembelians = DB::table('pembelians')->select('pembelians.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'pembelians.berat_volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'pembelians.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->orderBy('pembelians.id', 'ASC')->get();
        return view('pages.pembelian', compact('pemasoks', 'barangs', 'kategoris', 'pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'string|min:3|max:255|required|unique:pemasoks',
        //     'phone' => 'required|numeric|min:1',
        //     'address' => 'required|string|min:3|max:255',
        //     'email' => 'email|min:3|max:255',
        // ]);


        $status = Pembelian::create([
            'id_pemasok'    => $request->id_pemasok,
            'id_kat'        => $request->kategori,
            'id_brng'       => $request->merk,
            'jumlah'        => $request->jumlah,
            'deskripsijumlah' => $request->wadah,
            'berat_volume'  => $request->berat,
            'desk_b_v'      => $request->satuanberat,
            'hargabeli'     => $request->harga,
            'totalbeli'     => $request->total,
        ]);

        $stoklama = Barang::where('id', $request->merk)->select('Jumlah_besar')->value('Jumlah_besar');
        // dd($stoklama);
        $stok = Barang::where('id', $request->merk)->update([
            'jumlah_besar'           => $request->jumlah + $stoklama,
            'jumlah_besar_deskripsi' => $request->wadah,
            'jumlah_kecil'           => $request->berat,
            'jumlah_kecil_deskripsi' => $request->satuanberat,
        ]);

        // dd($status);

        if ($status && $stok) {
            request()->session()->flash('success', 'successfully added Pembelian');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id_barang = Pembelian::where('id', $id)->select('id_brng')->value('id_brng');
        // dd($id_barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id_barang = Pembelian::where('id', $id)->select('id_brng')->value('id_brng');

        $jmlhb = Barang::where('id', $id_barang)->select('jumlah_besar')->value('jumlah_besar');
        // $jmlhbd = Pembelian::where('id', $id)->select('jumlah_besar_deskripsi')->value('jumlah_besar_deskripsi');
        // $jmlhk = Pembelian::where('id', $id)->select('jumlah_kecil')->value('jumlah_kecil');
        // $jmlhkd = Pembelian::where('id', $id)->select('jumlah_kecil_deskripsi')->value('jumlah_kecil_deskripsi');
        $stok = Barang::where('id', $id_barang)->update([
            'jumlah_besar'           => $jmlhb - $request->jumlah_besar,
            // 'jumlah_besar_deskripsi' => null,
            // 'jumlah_kecil'           => $request->berat,
            // 'jumlah_kecil_deskripsi' => $request->satuanberat,
        ]);

        // dd($id_barang);

        $pembelian = Pembelian::findorFail($id);
        $status = $pembelian->delete();

        if ($status) {
            request()->session()->flash('success', 'Successfully deleted Pembelian');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('barang.index');
    }
}
