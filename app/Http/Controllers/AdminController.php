<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Toko;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $toko = DB::table('tokos')->count();
        $user = User::where('role', 'user')->count();
        // dd($user);
        // $id_toko = Toko::select('tokos.id')->where('tokos.id_user', auth::user()->id)->value('tokos.id');
        return view('pages.admin.dashboard', compact('toko', 'user'));
    }

    public function alltoko()
    {
        $toko = DB::table('tokos')->orderBy('id', 'asc')->get();
        return view('pages.admin.alltoko', compact('toko'));
    }

    public function alluser()
    {
        $user = DB::table('users')->where('role','user')->orderBy('id', 'asc')->get();
        return view('pages.admin.alluser', compact('user'));
    }
}
