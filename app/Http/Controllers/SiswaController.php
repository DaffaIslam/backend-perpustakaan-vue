<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function getsiswa()
    {
        $data_siswa=Siswa::join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
        ->get();
        return response()->Json($data_siswa);
    }

    public function siswalol($id)
    {
         $data_siswa=Siswa::where('id_siswa', $id)->get();
         return response()->Json($data_siswa);
}

    public function createsiswa(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_siswa'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'alamat'=>'required',
            'id_kelas'=>'required'
        ]);
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $save = siswa::create([
            'nama_siswa'    =>$req->get('nama_siswa'),
            'tanggal_lahir' =>$req->get('tanggal_lahir'),
            'gender'        =>$req->get('gender'),
            'alamat'        =>$req->get('alamat'),
            'id_kelas'      =>$req->get('id_kelas')
        ]);
        if($save){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses menambah siswa']);
        }else {
            return response ()->json(['status'=>false,'messege'=>
            'GagaL Menambah SIswa']);
        }
    }
    public function updatesiswa(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_siswa'    =>'required',
            'tanggal_lahir' =>'required',
            'gender'        =>'required',
            'alamat'        =>'required',
            'id_kelas'      =>'required'
        ]); 
        if ($validator->fails()){
            return response()->Json($validator->errors()->toJson());
        }
        $ubah=siswa::where('id_siswa',$id)->update([
            'nama_siswa'    =>$req->get('nama_siswa'),
            'tanggal_lahir' =>$req->get('tanggal_lahir'),
            'gender'        =>$req->get('gender'),
            'alamat'        =>$req->get('alamat'),
            'id_kelas'      =>$req->get('id_kelas')
        ]);
        if($ubah){
            return response ()->json(['status'=>true, 'messege'=>  
            'sukses mengubah data siswa']);
        }else{
            return response ()->json(['status'=>false,'messege'=>
            'GagaL mengubah data SIswa']);
        }
    }
    public function deletesiswa($id){
        $hapus=siswa::where('id_siswa',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'messege'=>'sukses menghapus siswa']);
        }else{
            return response()->json(['status'=>false,'messege'=>'gagal sukses menghapus siswa']);
        }
    }
}
