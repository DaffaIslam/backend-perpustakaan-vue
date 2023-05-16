<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = "id_peminjaman";
    public $timestamps = null;
    protected $fillable = ['id_siswa','id_kelas','id_buku','status','tglpinjam','tglkembali'];

}