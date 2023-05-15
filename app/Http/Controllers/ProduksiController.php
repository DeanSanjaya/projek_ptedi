<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Produksi;
use Illuminate\Support\Facades\Auth;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth::user()->id_toko == null) {
            request()->session()->flash('error', 'complete your store profile first!');
            return redirect()->route('toko.index');
        } else {
            $produksis = DB::table('barangs')->select('produksis.id_toko AS id_toko', 'barangs.name AS name', 'barangs.stok', 'barangs.stok_deskripsi', 'barangs.harga_jual', 'produksis.bahan', 'produksis.jumlah', 'produksis.row', 'produksis.created_by')->join('produksis', 'barangs.id', '=', 'produksis.id_barang')->where('produksis.id_toko', auth::user()->id_toko)->get();
            return view('pages.produksi.index', compact('produksis'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.berat_volume AS volume')->where('barangs.id_toko', auth::user()->id_toko)->orderBy('barangs.id', 'ASC')->get();
        $bahans = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.berat_volume AS volume', 'barangs.stok', 'barangs.stok_deskripsi', 'barangs.jumlah_besar', 'barangs.jumlah_besar_deskripsi', 'barangs.jumlah_kecil', 'barangs.jumlah_kecil_deskripsi')->where('jumlah_besar', '>', 0)->where('barangs.id_toko', auth::user()->id_toko)->orderBy('barangs.id', 'ASC')->get();

        return view('pages.produksi.create', compact('barangs', 'bahans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $count = count($request->bahan);
        // dd($request->bahan[1]);
        $user = Auth::user();

        $stoklama = Barang::where('id', $request->merk)->select('stok')->value('stok');
        $barang = Barang::where('id', $request->merk)->update([
            'stok' => $stoklama + $request->stok,
            'stok_deskripsi' => $request->stok_deskripsi,
            'harga_jual' => $request->hargajual,
        ]);

        for ($i = 0; $i < $count; $i++) {
            Produksi::create([
                'id_barang' => $request->merk,
                'id_toko'   => auth::user()->id_toko,
                'row'       => count($request->bahan),
                'bahan'     => $request->bahan[$i],
                'jumlah'    => $request->jumlah[$i],
                // 'jumlah_deskripsi'  => $request->jumlah_deskripsi[$i],
                'created_by' => $user->name,
                // dd($i++)
            ]);
        }

        if ($barang) {
            request()->session()->flash('success', 'successfully added Produksi');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('produksi.index');
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
        //
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
    public function destroy($id)
    {
        //
    }
}
