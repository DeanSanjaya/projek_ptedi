<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\ItemPenjualan;

class KasirController extends Controller
{
    public function index()
    {
        return view('pages.kasir.index');
    }

    public function search_barang($nama)
    {
        $id_toko = Auth::user()->id_toko;

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

        $data = Barang::Select('id', 'name', 'harga_jual')->where('name', 'like', "%" . $nama . "%")->where('id_toko', $id_toko)->where('harga_jual', '>', 0)->orderBy('name', 'ASC')->get();
        return response()->json($data);
    }

    public function detail_barang($id)
    {
        $id_toko = Auth::user()->id_toko;
        $data = Barang::Select('id', 'name', 'harga_jual')->where('id', $id)->where('id_toko', $id_toko)->where('harga_jual', '>', 0)->orderBy('name', 'ASC')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        $user = Auth::user();
        $count = count($request->item);
        $status = Penjualan::create([
            'id_toko'       => $user->id_toko,
            'jumlah_item'   => $count,
            'total_bayar'   => $request->total,
            'nominal'       => $request->nominal,
            'kembalian'     => $request->kembalian,
            'created_by'    => $user->name,

        ]);


        for ($i = 0; $i < $count; $i++) {
            ItemPenjualan::create([
                'id_penjualan'  => $status->id,
                'id_barang'     => $request->id_barang[$i],
                'nama_barang'   => $request->nama_item[$i],
                'jumlah_barang' => $request->item[$i],
                'harga'         => $request->harga[$i],
                'subtotal'      => $request->subtotall[$i],
            ]);
        }

        if ($status) {
            request()->session()->flash('success', 'Successfully added Penjualan');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('kasir');
    }


    public function riwayat()
    {
        // $data = Barang::Select('id','name','harga_jual')->where('name', 'like', "%" . $nama . "%")->where('id_toko',$id_toko)->where('harga_jual','>',0)->orderBy('name', 'ASC')->get();
        $penjualans = Penjualan::Select('penjualans.created_at AS date', 'penjualans.id', 'penjualans.id_toko', 'penjualans.jumlah_item', 'penjualans.total_bayar', 'penjualans.nominal', 'penjualans.kembalian', 'penjualans.created_by', 'item_penjualans.id_penjualan', 'item_penjualans.nama_barang', 'item_penjualans.jumlah_barang', 'item_penjualans.harga', 'item_penjualans.subtotal')->join('item_penjualans', 'item_penjualans.id_penjualan', '=', 'penjualans.id')->where('penjualans.id_toko', auth::user()->id_toko)->get();
        // dd($penjualan);
        return view('pages.kasir.riwayat',compact('penjualans'));
    }
}
