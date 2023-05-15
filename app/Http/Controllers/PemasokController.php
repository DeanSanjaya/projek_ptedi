<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class PemasokController extends Controller
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
            $pemasok = Pemasok::orderBy('id', 'DESC')->where('pemasoks.id_toko', auth::user()->id_toko)->get();
            return view('pages.pemasok.index', compact('pemasok'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|min:3|max:255|required|unique:pemasoks',
            'phone' => 'required|numeric|min:1',
            'address' => 'required|string|min:3|max:255',
            'email' => 'email|min:3|max:255',
        ]);


        $data = $request->all();
        // dd($data);
        $status = Pemasok::create($data);
        if ($status) {
            request()->session()->flash('success', 'Pemasok successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('pemasok.index');
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
        $pemasok = Pemasok::find($id);
        if (!$pemasok) {
            request()->session()->flash('error', 'Pemasok not found');
            return redirect()->route('pemasok.index');
        }
        return view('pages.pemasok.edit', compact('pemasok'));
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
        $pemasok = Pemasok::findorFail($id);
        $status = $pemasok->delete();

        if ($status) {
            request()->session()->flash('success', 'Successfully deleted Pemasok');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('pemasok.index');
    }

    public function pemasokip($id)
    {
        $pemasok = Pemasok::findorFail($id);
        return response()->json(['name' => $pemasok->name, 'phone' => $pemasok->phone], 200);
    }
}
