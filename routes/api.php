<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();    
});

Route::post('/register',[UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);
Route::group(['middleware' => ['jwt.verify']], function ()
{
   
});

route::get('/getsiswa',[SiswaController::class,'getsiswa']);
route::get('/siswalol/{id}',[SiswaController::class,'siswalol']);
route::post('/createsiswa',[SiswaController::class,'createsiswa']);
route::put('/updatesiswa/{id}',[SiswaController::class,'updatesiswa']);
route::delete('/deletesiswa/{id}',[SiswaController::class,'deletesiswa']);


route::get('/getkelas',[kelasController::class,'getkelas']);
route::post('/createkelas',[kelasController::class,'createkelas']);
route::put('/updatekelas/{id}',[kelasController::class,'updatekelas']);
route::delete('/deletekelas/{id}',[kelasController::class,'deletekelas']);

route::get('/getbuku',[bukuController::class,'getbuku']);
route::get('/anybuku/{id}',[bukuController::class,'anybuku']);
route::post('/createbuku',[bukuController::class,'createbuku']);
route::put('/updatebuku/{id}',[bukuController::class,'updatebuku']);
route::delete('/deletebuku/{id}',[bukuController::class,'deletebuku']);

route::get('/getpeminjaman',[peminjamanController::class,'getpeminjaman']);
route::post('/createpeminjaman',[peminjamanController::class,'createpeminjaman']);
route::put('/updatepeminjaman/{id}',[peminjamanController::class,'updatepeminjaman']);
route::delete('/deletepeminjaman/{id}',[peminjamanController::class,'deletepeminjaman']);
route::put('/balik/{id}',[peminjamanController::class,'balik']);
route::get('/peminjaman1/{id}',[peminjamanController::class,'peminjaman1']);

route::get('/getdetail',[detailController::class,'getdetail']);
route::get('/getdetil/{id}',[detailController::class,'getdetil']);
route::post('/createdetail',[detailController::class,'createdetail']);





