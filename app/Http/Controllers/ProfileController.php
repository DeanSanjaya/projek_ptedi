<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    public function email()
    {
        return view('pages.profile.email');
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
        //     'name' => 'string|min:3|max:255|required',
        //     'phone' => 'required|numeric|min:1',
        //     'address' => 'required|string|min:3|max:255',
        //     // 'filephoto' => 'image|mimes:jpeg,jpg,png|max:2048',
        // ]);
        $users = Auth::user();
        $id = $users->id;
        $user = User::find($id);
        // $image = $request->file('image')->store('profile');
        // dd( $image);

        if ($request->image == null) {
            $image = $users->photo;
        } else {
            $image = $request->file('image')->store('profile');
            $gambar_path = $users->photo;
            if (Storage::exists($gambar_path)) {
                Storage::delete($gambar_path);
            }
        }

        $status = $user->update([
            'name' => $request->name,
            'phone' => $request->telp,
            'address' => $request->address,
            'photo' => $image,
        ]);
        if ($status) {
            request()->session()->flash('success', 'Profile successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('profile.index');
    }

    public function email_store(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:6',
            'confirmpassword' => 'required_with:password|same:password|min:6'
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $status = $user->update([
            'password' => Hash::make($request->password),
            'confirmpassword' => $request->confirmpassword,

        ]);
        if ($status) {
            request()->session()->flash('success', 'Profile successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('profile.index');
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
