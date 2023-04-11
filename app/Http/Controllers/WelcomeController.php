<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                return redirect()->route('dashboard');
            } else {
                request()->session()->flash('success', 'Successfully login');
                return redirect()->route('dashboard');
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
        return view('home');
    }

    public function manajemen()
    {
        return view('manajemen');
    }

<<<<<<< HEAD
    public function pembelian(){
        return view('pages.pembelian');
    }


=======
    public function pemasok()
    {
        return view('pages/pemasok');
    }
>>>>>>> be9848d8c1f69463a00759b556a3c7bfde0e78b1
}
