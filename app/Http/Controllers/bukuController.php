<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class bukuController extends Controller
{
    public function anybuku($id)
    {
         $data_buku=buku::where('id_buku', $id)->get();
         return response()->Json($data_buku);
}
    public function getbuku()
    {
        $data_buku=buku::get();
        return response()->Json($data_buku);
    }
    public function createbuku(Request $req){
        $validator = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'pengarang'=>'required',
            
        ]);
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $save = buku::create([
            'judul_buku'    =>$req->get('judul_buku'),
            'pengarang'     =>$req->get('pengarang'),
            
        ]);
        if($save){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses menambah ']);
        }else {
            return response ()->json(['status'=>false,'messege'=>
            'GagaL Menambah ']);
        }
    }
    public function updatebuku(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'pengarang'=>'required',
           
        ]); 
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $ubah=buku::where('id_buku',$id)->update([
            'judul_buku'    =>$req->get('judul_buku'),
            'pengarang'     =>$req->get('pengarang'),
            
        ]);
        if($ubah){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses mengubah data ']);
        }else{
            return response ()->json(['status'=>false,'messege'=>
            'GagaL mengubah data ']);
        }
    }
    public function deletebuku($id){
        $hapus=buku::where('id_buku',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'messege'=>'sukses menghapus ']);
        }else{
            return response()->json(['status'=>false,'messege'=>'gagal sukses menghapus ']);
        }
    }
}
