<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index(){

        $karyawan = Karyawan::select('id','name','email','phone','address')->get();
        return view('pages.karyawan.index')->with('karyawan',$karyawan);
    }

    public function create(){

        return view('pages.karyawan.create');
    }

    public function store(Request $request){
        $data = $request->except('_method','_token','submit');
  
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3|max:255',
           'email' => 'email|min:3|max:255',
           'phone' => 'required|numeric|min:1',
           'address' => 'required|string|min:3|max:255',

        ]);

        if ($validator->fails()) {

            return redirec()->Back()->withInput()->withErrors($validator);
        }

        if($record = Karyawan::firstOrCreate($data)){
            Session::flash('message', 'Karyawan Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('karyawan.index');
         }else{
            Session::flash('message', 'Error occurred, Please try again!');
            Session::flash('alert-class', 'alert-danger');
         }
   
         return redirect()->route('karyawan.index');
      }

      public function edit($id){

        $karyawan = Karyawan::find($id);

      return view('pages.karyawan.edit')->with('karyawan',$karyawan);
      }

      public function update(Request $request,$id){
        $data = $request->except('_method','_token','submit');

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:255',
            'email' => 'email|min:3|max:255',
            'phone' => 'required|numeric|min:1',
            'address' => 'required|string|min:3|max:255',
        ]);

        if($validator->fails()){
            return redirect()->Back->withInput()->witErrors($validator);
        }
        $karyawan = Karyawan::find($id);

        if($karyawan->update($data)){
  
           Session::flash('message', 'Update successfully!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('karyawan.index');
        }else{
           Session::flash('message', 'Data not updated!');
           Session::flash('alert-class', 'alert-danger');
        }
  
        return Back()->withInput();
    }

    public function destroy($id){
        Karyawan::destroy($id);
  
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('karyawan.index');
     }
         

}
