<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\carbon;

class peminjamanController extends Controller
{
    
        public function getpeminjaman()
    {
        $dt_peminjaman=peminjaman::
        join('siswa','peminjaman.id_siswa','=','siswa.id_siswa')
       ->join('kelas','peminjaman.id_kelas','=','kelas.id_kelas')
        ->join('buku','peminjaman.id_buku','=','buku.id_buku')
        // ->select('nama_siswa','nama_kelas','judul_buku','status')
        ->get();
        return response()->json($dt_peminjaman);
    }
    public function peminjaman1(Request $req, $id)
    {
         $dt_peminjaman=peminjaman::where('id_peminjaman', $id)
         ->join('siswa','peminjaman.id_siswa','=','siswa.id_siswa')
       ->join('kelas','peminjaman.id_kelas','=','kelas.id_kelas')
        ->join('buku','peminjaman.id_buku','=','buku.id_buku')
        ->select('nama_siswa','nama_kelas','judul_buku','status')
         ->get();
         return response()->Json($dt_peminjaman);
    }
    
    public function createpeminjaman(Request $req){
        $validator = Validator::make($req->all(),[
            
            'id_siswa'      =>'required',
            'id_kelas'      =>'required',
            'id_buku'       =>'required',
            
        ]);
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }

        $tgl_pinjam = carbon::now();

        $save =peminjaman::create([
            
            'id_siswa'         =>$req->get('id_siswa'),
            'id_kelas'         =>$req->get('id_kelas'),
            'id_buku'          =>$req->get('id_buku'),
            'tglpinjam'        => $tgl_pinjam,  
            'status'           => 'dipinjam',   
        ]);
        if($save){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses menambah ']);
        }else {
            return response ()->json(['status'=>false,'messege'=>
            'GagaL Menambah ']);
        }
    }
    public function updatepeminjaman(Request $req, $id){
        $validator = Validator::make($req->all(),[
           
            'id_siswa'      =>'required',
            'id_kelas'      =>'required',
            'id_buku'       =>'required',
           
        ]); 
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $ubah=peminjaman::where('id_peminjaman',$id)->update([
            
            'id_siswa'         =>$req->get('id_siswa'),
            'id_kelas'         =>$req->get('id_kelas'),
            'id_buku'          =>$req->get('id_buku')
            
        ]);
        if($ubah){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses mengubah data ']);
        }else{
            return response ()->json(['status'=>false,'messege'=>
            'GagaL mengubah data ']);
        }
    }
    public function deletepeminjaman($id){
        $hapus=peminjaman::where('id_peminjaman',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'messege'=>'sukses menghapus ']);
        }else{
            return response()->json(['status'=>false,'messege'=>'gagal sukses menghapus ']);
        }
    }
    public function balik($id){
        $kembali = carbon::now();
        $balik=peminjaman::where('id_peminjaman','=', $id)->update([
            'status' => 'kembali',
            'tglkembali' => $kembali
        ]);
        if($balik){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses  ']);
        }else{
            return response ()->json(['status'=>false,'messege'=>
            'GagaL ']);
        }
        
    }
}
