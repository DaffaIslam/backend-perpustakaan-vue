<?php

namespace App\Http\Controllers;
use App\Models\detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class detailController extends Controller{
    public function getdetail()
    {
        $dt_detail=detail::
        join('siswa','detail.id_siswa','=','siswa.id_siswa')
       ->join('kelas','detail.id_kelas','=','kelas.id_kelas')
        ->join('buku','detail.id_buku','=','buku.id_buku')
        ->join('peminjaman','detail.')
        ->select('nama_siswa','nama_kelas','judul_buku')
        ->get();
        return response()->json($dt_detail);
    }
    
    public function getdetil(Request $req, $id)
    {
        $dt_detail=detail::
        join('siswa','detail.id_siswa','=','siswa.id_siswa')
       ->join('kelas','detail.id_kelas','=','kelas.id_kelas')
        ->join('buku','detail.id_buku','=','buku.id_buku')
        ->select('nama_siswa','nama_kelas','judul_buku')
        ->where ('id_detail', $id) ->get();
        return response()->json($dt_detail);
    }

}