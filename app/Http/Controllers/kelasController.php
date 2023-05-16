<?php

namespace App\Http\Controllers;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class kelasController extends Controller
{
    public function getkelas()
    {
        $data_kelas=kelas::get();
        return response()->Json($data_kelas);
    }
    public function createkelas(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_kelas'=>'required',
            
        ]);
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $save = kelas::create([
            'nama_kelas'    =>$req->get('nama_kelas'),
            
        ]);
        if($save){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses menambah ']);
        }else {
            return response ()->json(['status'=>false,'messege'=>
            'GagaL Menambah ']);
        }
    }
    public function updatekelas(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_kelas'    =>'required',
           
        ]); 
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $ubah=kelas::where('id_kelas',$id)->update([
            'nama_kelas'    =>$req->get('nama_kelas'),
            
        ]);
        if($ubah){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses mengubah data ']);
        }else{
            return response ()->json(['status'=>false,'messege'=>
            'GagaL mengubah data ']);
        }
    }
    public function deletekelas($id){
        $hapus=kelas::where('id_kelas',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'messege'=>'sukses menghapus ']);
        }else{
            return response()->json(['status'=>false,'messege'=>'gagal sukses menghapus ']);
        }
    }
}
