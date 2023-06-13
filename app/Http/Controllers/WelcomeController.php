<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\Cast\Array_;

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
        $toko = Toko::select('tokos.id AS id_toko', 'tokos.id_user', 'tokos.name AS name', 'tokos.phone', 'tokos.address', 'tokos.photo', 'users.id')->join('users', 'users.id', '=', 'tokos.id_user')->where('tokos.id', '=', auth::user()->id_toko)->get();
        $id_toko = Toko::select('tokos.id')->where('tokos.id', Auth::user()->id_toko)->value('tokos.id');
        $penjualan = Penjualan::Select('id_toko', 'total_bayar')->where('penjualans.id_toko', auth::user()->id_toko)->sum('total_bayar');
        $karyawan = DB::table('karyawans')->where('id_toko', Auth::user()->id_toko)->count();
       
        $pendapatan = $this->grafik_pendapatan();
        $pendapatan = json_encode($pendapatan);

        $pendapatanbulan = $this->datapendapatan();
        $pendapatanbulan= json_encode($pendapatanbulan);

        $pembelian = $this->grafik_pembelian();
        $pembelian = json_encode($pembelian);
        $pembelianbulan = $this->databulanpembelian();
        $pembelianbulan= json_encode($pembelianbulan);

        $grafikkaryawan = $this->datakaryawan();
        $grafikkaryawan = json_encode($grafikkaryawan);
        $grafikkaryawanbulan = $this->datakaryawanbulan();
        $grafikkaryawanbulan = json_encode($grafikkaryawanbulan);

        return view('home', compact('pengeluaran', 'toko', 'id_toko', 'penjualan', 'karyawan','pendapatan','pendapatanbulan','pembelian','pembelianbulan','grafikkaryawan','grafikkaryawanbulan'));
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

        return view('pages.hasilcari', compact('kategoris', 'barangs', 'karyawans', 'pemasoks', 'hasil', 'totalpencarian'));
    }

    public function ip_grafik_pendapatan()
    {
        $data = Penjualan::Select('id_toko',DB::raw('sum(total_bayar) as `total`'), DB::raw('MONTH(created_at) month'))->where('id_toko', auth::user()->id_toko)->groupby('month')->get();
        return $data;
    }

    public function grafik_pendapatan()
    { 
        $data = $this->ip_grafik_pendapatan();
        // return $data;
        $dataarr = array();
        if ($data){
            foreach($data as $data){
                $total = $data->total;
                array_push($dataarr,$total);
            }
        }
        return $dataarr;
    }

    public function pendapatan_bulan()
    {
        $arrbulan = array();
        $bulan = Penjualan::select('created_at','total_bayar','id_toko')->where('id_toko', auth::user()->id_toko)->orderby('created_at', 'ASC')->get();
        if (! empty ($bulan)) {
            foreach ($bulan as $data) {
                $bln = new \DateTime ($data->created_at);
                $month_no = $bln->format('m');
                $month_name = $bln->format( 'M');
                $arrbulan[$month_no] = $month_name;
            }
            // return $month_no;
        }
        return $arrbulan;
        // return $this->itung_bulan_pendapatan(5);
    }

    public function itung_bulan_pendapatan($month)
    {
        $hitung = Penjualan::whereMonth('created_at',$month)->where('id_toko', auth::user()->id_toko)->get()->count();
        return $hitung;
    }

    public function datapendapatan()
    {
        $arrbulan2 = array();
        $bulan = $this->pendapatan_bulan();
        $namabulanarr = array();
        if($bulan){
            foreach ($bulan as $nobulan => $namabulan){
                $arrbulan3 = $this->itung_bulan_pendapatan($nobulan);
                array_push($arrbulan2, $arrbulan3);
                array_push($namabulanarr, $namabulan);
            }
        }

        $bulanpendapatan = array(
            'bulan' => $namabulanarr,
            'count_bulan' => $arrbulan2,
        );
        return $namabulanarr;
    }


    public function ip_grafik_pembelian()
    {
       $data = Pembelian::Select(DB::raw('sum(totalbeli) as `total`'), DB::raw('MONTH(created_at) month'),'id_toko')->where('id_toko', auth::user()->id_toko)->groupby('month')->get();
        return $data;
    }

    public function grafik_pembelian()
    {
        $data = $this->ip_grafik_pembelian();
        $array = array();
        // dd($data->total);
        if($data){
            foreach($data as $data){
                $total = $data->total;
                array_push($array,$total);
            }
        }
        return $array;
    }

    public function pembelian_bulan()
    {
        $arrbulan = array();
        $bulan = Pembelian::select('created_at','totalbeli','id_toko')->where('id_toko', auth::user()->id_toko)->orderby('created_at', 'ASC')->get();
        if (! empty ($bulan)) {
            foreach ($bulan as $data) {
                $bln = new \DateTime ($data->created_at);
                $month_no = $bln->format('m');
                $month_name = $bln->format( 'M');
                $arrbulan[$month_no] = $month_name;
            }
            // return $month_no;
        }
        return $arrbulan;
        // return $this->itung_bulan_pendapatan(5);
    }

    public function itung_bulan_pembelian($month)
    {
        $hitung = Pembelian::whereMonth('created_at',$month)->get()->count();
        return $hitung;
    }

    public function databulanpembelian()
    {
        $arrbulan2 = array();
        $bulan = $this->pembelian_bulan();
        $namabulanarr = array();
        if($bulan){
            foreach ($bulan as $nobulan => $namabulan){
                $arrbulan3 = $this->itung_bulan_pembelian($nobulan);
                array_push($arrbulan2, $arrbulan3);
                array_push($namabulanarr, $namabulan);
            }
        }

        $bulanpendapatan = array(
            'bulan' => $namabulanarr,
            'count_bulan' => $arrbulan2,
        );
        return $namabulanarr;
    }


    // public function ip_grafik_karyawan()
    // {
    //     $data = Karyawan::Select('id_toko',DB::raw('MONTH(created_at) month'))->groupby('month')->where('id_toko', auth::user()->id_toko)->get();
    //     return $data;
    // }
    
    // public function grafik_karyawan()
    // {
    //     $data = $this->ip_grafik_karyawan();
    //     $array = array();
    //     if($data){
    //         foreach($data as $data){
    //             $total = $data->total;
    //             array_push($array,$total);
    //         }
    //     }
    //     return $array;
    // }

    public function karyawan_bulan()
    {
        $arrbulan = array();
        $bulan = Karyawan::select('created_at','id_toko')->where('id_toko', auth::user()->id_toko)->orderby('created_at', 'ASC')->get();
        if (! empty ($bulan)) {
            foreach ($bulan as $data) {
                $bln = new \DateTime ($data->created_at);
                $month_no = $bln->format('m');
                $month_name = $bln->format( 'M');
                $arrbulan[$month_no] = $month_name;
            }
            // return $month_no;
        }
        return $arrbulan;
        // return $this->itung_bulan_pendapatan(5);
    }

    public function hitung_karyawan($month)
    {
        $hitung = Karyawan::whereMonth('created_at',$month)->where('id_toko', auth::user()->id_toko)->get()->count();
        return $hitung;
    }

    public function datakaryawan()
    {
        $arr = array();
        $karyawan = $this->karyawan_bulan();
        $namabulanarr = array();
        if($karyawan){
            foreach ($karyawan as $kar => $namabulan){
                $arrkar = $this->hitung_karyawan($kar);
                array_push($arr, $arrkar);
                array_push($namabulanarr, $namabulan);
            }
        }

        $bulanpendapatan = array(
            'x' => $namabulanarr,
            'y' => $arr,
        );
        return $arr;
    }

    public function datakaryawanbulan()
    {
        $arr = array();
        $karyawan = $this->karyawan_bulan();
        $namabulanarr = array();
        if($karyawan){
            foreach ($karyawan as $kar => $namabulan){
                $arrkar = $this->hitung_karyawan($kar);
                array_push($arr, $arrkar);
                array_push($namabulanarr, $namabulan);
            }
        }

        $bulanpendapatan = array(
            'x' => $namabulanarr,
            'y' => $arr,
        );
        return $namabulanarr;
    }
}
