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

class StokbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // JavaScript::put([
        //     'foo' => 'bar',
        //     'user' => 'aan',
        //     'age' => 29
        // ]);

        $pemasok = Pemasok::orderBy('name', 'ASC')->get();
        $kategoris = Kategori::orderBy('id', 'ASC')->get();
        // $barangs = Barang::orderBy('name', 'ASC')->get();
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'kategoris.id AS id_kat', 'barangs.berat_volume AS volume', 'barangs.keterangan')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->orderBy('barangs.id', 'ASC')->get();
        // $stock = DB::table('barangs')->select('barangs.id AS id','barangs.name AS barangname','kategoris.name AS kategoriname','kategoris.id AS id_kat','barangs.volume','barangs.keterangan','stokbarangs.id AS id_stok', 'stokbarangs.jumlah', 'stokbarangs.hargajual')->join('kategoris','barangs.id_kat','=','kategoris.id')->join('stokbarangs','stokbarangs.id_brng','=','barangs.id')->orderBy('barangs.id', 'ASC')->get();
        // $stocks = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.harga_jual', 'barangs.berat_volume AS volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.berat_volume', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli')->join('pembelians', 'barangs.id', '=', 'pembelians.id_brng')->orderBy('barangs.id', 'ASC')->get();
        $stocks = DB::table("barangs")->select('name','stok','stok_deskripsi','harga_jual','berat_volume')->where('stok','>',0)->where('harga_jual','>',0)->get();
        // $pembelians = DB::table('pembelians')->select('pembelians.id AS id', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'pembelians.berat_volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'pembelians.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->orderBy('pembelians.id', 'ASC')->get();
        // $gudangs = DB::table('barangs')->select('barangs.id AS id','pembelians.id AS id_pem', 'pemasoks.id AS id_pemasok', 'barangs.name AS barangname', 'kategoris.name AS kategoriname', 'barangs.jumlah_besar', 'barangs.jumlah_besar_deskripsi', 'barangs.jumlah_kecil', 'barangs.jumlah_kecil_deskripsi','pemasoks.name AS pemasokname')->join('barangs', 'pembelians.id_brng', '=', 'barangs.id')->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->join('pemasoks', 'pemasoks.id', '=', 'pembelians.id_pemasok')->orderBy('barangs.id', 'ASC')->get();
        $gudangs = DB::table('barangs')->select('barangs.id AS id','kategoris.id AS id_kat' ,'barangs.name AS barangname','kategoris.name AS kategoriname', 'barangs.jumlah_besar', 'barangs.jumlah_besar_deskripsi', 'barangs.jumlah_kecil', 'barangs.jumlah_kecil_deskripsi' )->join('kategoris', 'barangs.id_kat', '=', 'kategoris.id')->where('jumlah_besar','>',0)->get();
        return view('pages.stokbarang.index', compact('pemasok', 'kategoris', 'barangs', 'gudangs', 'stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = DB::table('barangs')->select('barangs.id AS id', 'barangs.name', 'barangs.berat_volume AS volume', 'pembelians.jumlah', 'pembelians.deskripsijumlah', 'pembelians.berat_volume', 'pembelians.desk_b_v', 'pembelians.hargabeli', 'pembelians.totalbeli', 'barangs.harga_jual')->join('pembelians', 'barangs.id', '=', 'pembelians.id_brng')->orderBy('barangs.id', 'ASC')->get();
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
        $stok = Barang::where('id', $request->merk)->update([
            'stok' => $stoklama + $request->stok,
            'stok_deskripsi' => $request->desk_b_v,
            'harga_jual' => $request->hargajual,
            'jumlah_besar' => $jumlah_besar - $request->jualwadah,
        ]);

        // $jumlah
        // Pembelian::where('id_brng',$request->merk)->update([
        //     'jumlah' => $stoklama + $request->stok,
        //     'stok_deskripsi' => $request->desk_b_v,
        //     'harga_jual' => $request->hargajual,
        // ]);



        // dd($status);

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

        // $data = Kategori::orderBy('name', 'ASC')->get();

        // $this->validate($request, [
        //     'kate' => 'string|min:3|max:255|required',
        // ]);
        // $name = $request->kategori;
        // $kategori = DB::table('kategoris')->where('name', 'like', "%" . $request . "%")->get();
        // return response()->json(['name' => $data->name, 'id' => $data->id], 200);

        // $data = Kategori::select("name")
        //     ->where("name", "LIKE", "%{$request->query}%")
        //     ->get();

        $data = Kategori::Select('name')->orderBy('name', 'ASC')->get();
        return response()->json($data);
    }

    public function search_merk(Request $request)
    {
    }

    public function kategori_ip($id)
    {
        // $kategoris = Barang::findorFail($id);
        $kategori =  Barang::where('id_kat', '=', $id)->get()->toArray();
        return response()->json($kategori);
    }

    public function kategori_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|min:3|max:255|required',
        ]);

        $namabaru = $request->name;
        $namalama = DB::table('kategoris')->where('name', 'like', "%" . $namabaru . "%")->get();
        // dd($namalama);

        if (count($namalama) > 0) {
            request()->session()->flash('error', 'Name is Exist');
            return redirect()->route('barang.index');
        } else {
            $data = $request->all();
            $status = Kategori::create($data);
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

        $merk = $request->name;
        // $id_kat = $request->id_kat;
        // $volume = $request->volume;
        $namalama = DB::table('barangs')->where('name', 'like', "%" . $merk . "%")->get();
        // dd($merk,$id_kat, $namalama, $volume);

        if (count($namalama) > 0) {
            request()->session()->flash('error', 'Name is Exist');
            return redirect()->route('barang.index');
        } else {
            // $data = $request->all();
            $status = Barang::create([
                'id_kat' => $request->id_kat,
                'name' => $request->name,
                'berat_volume' => $request->volume,
                'keterangan' => $request->keterangan,
            ]);
            if ($status) {
                request()->session()->flash('success', 'Merk Barang successfully added');
            } else {
                request()->session()->flash('error', 'Error occurred, Please try again!');
            }
            return redirect()->route('barang.index');
        }
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

            // dd(true);
        }
        //  else{
        // dd(false);
        // }
        // dd($id_kat);
        $status = Barang::where('id', $id)->update([
            'id_kat' => $id_kat,
            'name' => $request->name,
            'berat_volume' => $request->volume,
            'keterangan' => $request->keterangan,
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
        // $namalama = DB::table('kategoris')->where('name', 'like', "%" . $namabaru . "%")->get();

        // if (count($namalama) > 0) {
        //     request()->session()->flash('error', 'Name is Exist');
        //     return redirect()->route('barang.index');
        // } else {
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
