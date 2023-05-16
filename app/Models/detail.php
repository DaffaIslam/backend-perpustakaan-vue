<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $table = "detail";
    protected $primaryKey = "id_detail";
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_kelas','id_buku','tglpinjam','tglkembali'];
}
