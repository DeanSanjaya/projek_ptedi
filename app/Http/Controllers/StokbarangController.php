<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pemasok;
use App\Models\Kategori;
use App\Models\Stokbarang;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;
use JavaScript;
use Laracasts\Utilities\JavaScript\Transformers\Transformer;
use Illuminate\Support\Facades\Auth;

class StokbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::orderBy('name', 'ASC')->where('id_toko', auth::user()->id_toko)->get();
        $kategoris = Kategori::orderBy('id', 'ASC')->where('id_toko', auth::user()->id_toko)->get();
        // $barangs = Barang::orderBy('name', 'ASC')->get();
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'kategoris.id AS id_kat', 'barangs.berat_volume AS volume', 'barangs.id_toko', 'barangs.jumlah_kecil_deskripsi AS desk_b_v')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->where('barangs.id_toko', auth::user()->id_toko)->orderBy('barangs.id', 'ASC')->get();
        // $stock = DB::table('barangs')->select('barangs.id AS id','barangs.name AS barangname','kategoris.name AS kategoriname','kategoris.id AS id_kat','barangs.volume','barangs.keterangan','stokbarangs.id AS id_stok', 'stokbarangs.jumlah', 'stokbarangs.hargajual')->join('kategoris','barangs.id_kat','=','kategoris.id')->join('stokbarangs','stokbarangs.id_brng','=','barangs.id')->orderBy('barangs.id', 'ASC')->get();
        // $stocks = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.harga_jual', 'barangs.berat_volume AS volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.berat_volume', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli')->join('pembelians', 'barangs.id', '=', 'pembelians.id_brng')->orderBy('barangs.id', 'ASC')->get();
        $stocks = DB::table("barangs")->select('name', 'stok', 'stok_deskripsi', 'harga_jual', 'berat_volume')->where('stok', '>', 0)->where('harga_jual', '>', 0)->where('barangs.id_toko', auth::user()->id_toko)->get();
        // $pembelians = DB::table('pembelians')->select('pembelians.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'pembelians.berat_volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'pembelians.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->orderBy('pembelians.id', 'ASC')->get();
        // $gudangs = DB::table('barangs')->select('barangs.id AS id','pembelians.id AS id_pem', 'pemasoks.id AS id_pemasok', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'barangs.jumlah_besar', 'barangs.jumlah_besar_deskripsi', 'barangs.jumlah_kecil', 'barangs.jumlah_kecil_deskripsi','pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->orderBy('barangs.id', 'ASC')->get();
        $gudangs = DB::table('barangs')->select('barangs.id AS id', 'kategoris.id AS id_kat', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'barangs.jumlah_besar', 'barangs.jumlah_besar_deskripsi', 'barangs.jumlah_kecil', 'barangs.jumlah_kecil_deskripsi')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->where('jumlah_besar', '>', 0)->where('barangs.id_toko', auth::user()->id_toko)->get();
        if (auth::user()->id_toko == null) {
            request()->session()->flash('error', 'complete your store profile first!');
            return redirect()->route('toko.index');
        } else {
            return view('pages.stokbarang.index', compact('pemasok', 'kategoris', 'barangs', 'gudangs', 'stocks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.berat_volume AS volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.berat_volume', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'barangs.harga_jual')->join('pembelians', 'barangs.id', '=', 'pembelians.id_brng')->where('barangs.id_toko', auth::user()->id_toko)->orderBy('barangs.id', 'ASC')->get();
        // $barangs = DB::table("barangs")->select('name','stok','stok_deskripsi','harga_jual')->where('stok','>',0)->where('harga_jual','>',0)->get();
        return view('pages.stokbarang.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stoklama = Barang::where('id', $request->merk)->select('stok')->value('stok');
        $jumlah_besar = Barang::where('id', $request->merk)->select('jumlah_besar')->value('jumlah_besar');
        $user = Auth::user();
        $stok = Barang::where('id', $request->merk)->update([
            'stok' => $stoklama + $request->stok,
            'stok_deskripsi' => $request->desk_b_v,
            'harga_jual' => $request->hargajual,
            'jumlah_besar' => $jumlah_besar - $request->jualwadah,
            'updated_by'    => $user->name,
        ]);

        if ($stok) {
            request()->session()->flash('success', 'successfully added Stock Penjualan');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('barang.index');
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

    public function search_kategori()
    {

        $data = Kategori::Select('name')->orderBy('name', 'ASC')->get();
        return response()->json($data);
    }


    public function kategori_ip($id)
    {
        // $kategoris = Barang::findorFail($id);
        $kategori =  Barang::where('id_kat', '=', $id)->where('barangs.id_toko', auth::user()->id_toko)->get()->toArray();
        return response()->json($kategori);
    }

    public function kategori_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|min:3|max:255|required',
        ]);

        $namabaru = $request->name;
        $namalama = DB::table('kategoris')->where('name', 'like', "%" . $namabaru . "%")->get();

        if (count($namalama) > 0) {
            request()->session()->flash('error', 'Name is Exist');
            return redirect()->route('barang.index');
        } else {
            $status = Kategori::create([
                'name' => $request->name,
                'id_toko' => auth::user()->id_toko,
                'created_by' => auth::user()->name,
            ]);
            if ($status) {
                request()->session()->flash('success', 'Kategori successfully added');
            } else {
                request()->session()->flash('error', 'Error occurred, Please try again!');
            }
            return redirect()->route('barang.index');
        }
    }

    public function merkbarang_store(Request $request)
    {
        // $this->validate($request, [
        //     'id_kat' => 'required',
        //     'name' => 'string|min:3|max:255|required',
        //     'volume' => 'numeric|min:1|required',
        // ]);
        $user = Auth::user();

        $status = Barang::create([
            'id_kat' => $request->id_kat,
            'id_toko' => $user->id_toko,
            'name' => $request->name,
            'updated_by' => $user->name,
        ]);

        if ($status) {
            request()->session()->flash('success', 'Merk Barang successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('barang.index');
    }

    public function merkbarang_edit(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'string|min:3|max:255|required',
        //     'volume' => 'min:3|max:255|required',
        // ]);

        $id = $request->id;
        $id_kat = $request->id_kat;
        // dd($id_kat);
        if ($id_kat == null) {
            $id_kat = $request->kategoriold;
        }
        $status = Barang::where('id', $id)->update([
            'id_kat' => $id_kat,
            'name' => $request->name,
            // 'berat_volume' => $request->volume,
        ]);
        if ($status) {
            request()->session()->flash('success', 'Merk Barang successfully edited');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('barang.index');
    }

    public function kategori_edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|min:3|max:255|required',
        ]);

        $id = $request->id;
        $namabaru = $request->name;
        $status = Kategori::where('id', $id)->update([
            'name' => $namabaru,
        ]);
        if ($status) {
            request()->session()->flash('success', 'Kategori successfully edited');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('barang.index');
        // }
    }

    public function kategori_destroy($id)
    {
        $kategori = Kategori::findorFail($id);
        $status = $kategori->delete();

        if ($status) {
            request()->session()->flash('success', 'Successfully deleted Kategori');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('barang.index');
    }

    public function merkbarang_destroy($id)
    {
        $merk = Barang::findorFail($id);
        $status = $merk->delete();

        if ($status) {
            request()->session()->flash('success', 'Successfully deleted Barang');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('barang.index');
    }
}
