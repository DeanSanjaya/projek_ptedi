<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Toko;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('first');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function loginsubmit(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $data = auth()->user()->role;
            // dd($data);
            if ($data == 'admin') {
                request()->session()->flash('success', 'Successfully login');
                return redirect()->route('admin');
            } else {
                request()->session()->flash('success', 'Successfully login');
                return redirect()->route('main');
            }

            // request()->session()->flash('success', 'Successfully login');
            // return redirect()->route('admin');
            // dd($credentials);
            // dd($data);
        } else {
            request()->session()->flash('error', 'Invalid email and password please try again!');
            return redirect()->back();
            // dd($credentials);
        }
    }

    public function register()
    {
        return view('pages.register');
    }
    public function registersubmit(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'string|required|min:2',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        // dd($data);
        $check = $this->createregis($data);
        // Session::put('user', $data['email']);
        if ($check) {
            request()->session()->flash('success', 'Successfully registered');
            return redirect()->route('login');
        } else {
            request()->session()->flash('error', 'Please try again!');
            return back();
        }
    }

    public function createregis(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'status' => 'active'
        ]);
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successfully');
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $pengeluaran = DB::table('pembelians')->select('totalbeli', 'id_toko')->where('pembelians.id_toko', auth::user()->id_toko)->sum('totalbeli');
        $stok = DB::table('barangs')->select('stok')->value('stok');
        $harga = DB::table('barangs')->select('harga_jual')->value('harga_jual');
        // dd($stok);
        $toko = Toko::select('tokos.id AS id_toko', 'tokos.id_user', 'tokos.name AS name', 'tokos.phone', 'tokos.address', 'tokos.photo', 'users.id')->join('users', 'users.id', '=', 'tokos.id_user')->where('tokos.id', '=', auth::user()->id_toko)->get();
        $id_toko = Toko::select('tokos.id')->where('tokos.id', Auth::user()->id_toko)->value('tokos.id');
        // dd(Auth::user()->id_toko);
        $penjualan = Penjualan::Select('id_toko', 'total_bayar')->where('penjualans.id_toko', auth::user()->id_toko)->sum('total_bayar');
        $karyawan = DB::table('karyawans')->where('id_toko', Auth::user()->id_toko)->count();
        return view('home', compact('pengeluaran', 'toko', 'id_toko', 'penjualan', 'karyawan'));
    }

    public function manajemen()
    {
        return view('manajemen');
    }




    public function cari(Request $request)
    {
        $hasil = $request->cari;
        // return view('pages.pembelian');
        $kategoris = DB::table('kategoris')->where('name', 'like', "%" . $request->cari . "%")->get();
        $barangs = DB::table('barangs')->where('name', 'like', "%" . $request->cari . "%")->get();
        // dd($barangs);
        $karyawans = DB::table('karyawans')->where('name', 'like', "%" . $request->cari . "%")->get();
        $pemasoks = DB::table('pemasoks')->where('name', 'like', "%" . $request->cari . "%")->get();
        // $produksis = DB::table('produksis')->where('name', 'like', "%" . $request->cari . "%")->get();
      
        $totalpencarian = count($kategoris) + count($barangs) + count($karyawans) + count($pemasoks);
      
        return view('pages.hasilcari', compact('kategoris', 'barangs', 'karyawans', 'pemasoks','hasil','totalpencarian'));
    }

    // public function pemasok()
    // {
    //     return view('pages.pemasok');
    // }
}
