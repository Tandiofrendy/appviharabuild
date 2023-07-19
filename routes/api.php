<?php

use App\Http\Controllers\API\DataUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\UserinforController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\DivisiController;
use App\Http\Controllers\API\JadwalKegiatanController;
use App\Http\Controllers\API\RoleAdminController;
use App\Http\Controllers\API\TempjadwalController;
use App\Http\Controllers\API\ViharaController;
use App\Http\Controllers\API\absensiController;
use App\Http\Controllers\API\UseradminController;
use App\Http\Controllers\API\BookdiksaController;
use App\Http\Controllers\API\ReservdiksaController;
use App\Http\Controllers\API\kartudiksaController;
use App\Models\jadwalkegiatan;

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

Route::prefix('kategori')->group(function(){
    Route::get('viewdata',[KategoriController::class,'index'])->name('kategori/viewdata');
    Route::post('simpan',[KategoriController::class,'store'])->name('kategori/simpan');
    Route::delete('delete/{kodekategori}',[KategoriController::class,'delete'])->name('kategori/delete');
    Route::post('edit/{kodekategori}',[KategoriController::class,'edit'])->name('kategori/edit');
    Route::put('update/{kodekategori}',[KategoriController::class,'update'])->name('kategori/update');
});

Route::prefix('Userinformation')->group(function(){
    Route::get('tampil',[UserinforController::class,'index'])->name('Userinformation/tampil');
    Route::post('simpan',[UserinforController::class,'storeinfo'])->name('Userinformation/simpan');
    Route::post('cekdata/{email}',[UserinforController::class,'cekdatas'])->name('Userinformation/cekdata');
    Route::put('update',[UserinforController::class,'updateinfo'])->name('Userinformation/updateinfo');
    Route::delete('delete/{id}',[UserinforController::class,'destroyinfo'])->name('Userinformation/deleteinfo');
});

Route::prefix('Register')->group(function(){
    Route::get('view',[RegisterController::class,'index'])->name('Register/view');
    Route::post('simpan',[RegisterController::class,'store'])->name('Register/simpan');
    Route::post('getcode',[RegisterController::class,'getcodes'])->name('Register/getcode');
    Route::delete('delete/{email}',[RegisterController::class,'destroy'])->name('Register/delete');
    Route::put('verifcode/{email}',[RegisterController::class,'update'])->name('verifcode/update');
});

Route::prefix('Datauser')->group(function(){
    Route::get('View',[DataUserController::class,'getAlldata'])->name('Datauser/view');
});

Route::prefix('Divisi')->group(function(){
    Route::get('View',[DivisiController::class,'view'])->name('Divisi/View');
    Route::post('simpan',[DivisiController::class,'simpan'])->name('Divisi/simpan');
    Route::post('edit/{kodedivisi}',[DivisiController::class,'edit'])->name('Divisi/edit');
    Route::put('update',[DivisiController::class,'update'])->name('Divisi/update');
    Route::delete('delete/{kodedivisi}',[DivisiController::class,'delete'])->name('Divisi/delete');
    Route::post('cekedit/{kodedivisi}',[DivisiController::class,'cekedts'])->name('Divisi/cekedit');
});

Route::prefix('Vihara')->group(function(){
    Route::get('View',[ViharaController::class,'view'])->name('Vihara/View');
    Route::post('simpan',[ViharaController::class,'simpan'])->name('Vihara/simpan');
    Route::post('edit/{kodevihara}',[ViharaController::class,'edit'])->name('Vihara/edit');
    Route::put('update',[ViharaController::class,'update'])->name('Vihara/update');
    Route::delete('delete/{kodevihara}',[ViharaController::class,'delete'])->name('Vihara/delete');
    Route::post('cekedit/{kodevihara}',[ViharaController::class,'cekedits'])->name('Vihara/cekedit');
});

Route::prefix('Roleadmin')->group(function(){
    Route::get('View',[RoleAdminController::class,'view'])->name('Roleadmin/View');
    Route::post('simpan',[RoleAdminController::class,'save'])->name('Roleadmin/simpan');
    Route::post('edit/{id}',[RoleAdminController::class,'edit'])->name('Roleadmin/edit');
    Route::put('update/{id}',[RoleAdminController::class,'update'])->name('Roleadmin/update');
    Route::delete('delete/{id}',[RoleAdminController::class,'delete'])->name('Roleadmin/delete');
});

Route::prefix('Jadwal')->group(function(){
    Route::get('View',[TempjadwalController::class,'view'])->name('Jadwal/View');
    Route::post('simpan',[TempjadwalController::class,'save'])->name('Jadwal/simpan');
    Route::post('edit/{id}',[TempjadwalController::class,'edit'])->name('Jadwal/edit');
    Route::get('Viewall',[TempjadwalController::class,'viewall'])->name('Jadwal/Viewall');
    Route::put('update/{id}',[TempjadwalController::class,'update'])->name('Jadwal/update');
    Route::delete('delete/{id}',[TempjadwalController::class,'delete'])->name('Jadwal/delete');
    Route::get('Viewjadwal',[TempjadwalController::class,'jadwaltunggu'])->name('Jadwal/Viewjadwal');
    Route::post('Searchjadwal/{kode_kegiatan}',[TempjadwalController::class,'sjadwaltunggu'])->name('Jadwal/Searchjadwal');
    Route::post('updatedes/{id}',[TempjadwalController::class,'updatedesk'])->name('Jadwal/updatedes');
    Route::post('Posting/{id}',[TempjadwalController::class,'posting'])->name('Jadwal/Posting');
    Route::post('Upposting',[TempjadwalController::class,'saveposting'])->name('Jadwal/Upposting');
    Route::post('Getdatapos/{id}',[TempjadwalController::class,'getdataposting'])->name('Jadwal/Getdatapos');
});

Route::prefix('Jadwalkegiatan')->group(function(){
    Route::get('View',[JadwalKegiatanController::class,'view'])->name('Jadwalkegiatan/View');
    Route::post('simpan',[JadwalKegiatanController::class,'save'])->name('Jadwalkegiatan/save');
    Route::post('Count/{kode_kegiatan}',[JadwalKegiatanController::class,'cekkode'])->name('Jadwalkegiatan/Count');
    Route::post('Editstat/{kode_kegiatan}',[JadwalKegiatanController::class,'editstatus'])->name('Jadwalkegiatan/Editstat');
    Route::get('Viewpost',[JadwalKegiatanController::class,'viewpstjadwal'])->name('Jadwalkegiatan/Viewpost');
    Route::get('Viewalljadwal',[JadwalKegiatanController::class,'klarifikasijadwal'])->name('Jadwalkegiatan/Viewalljadwal');
    Route::get('Cekdata',[JadwalKegiatanController::class,'cekdataumat'])->name('Jadwalkegiatan/Cekdata');
    Route::get('Cektotal',[JadwalKegiatanController::class,'cekberapadiksa'])->name('Jadwalkegiatan/Cektotal');
    Route::post('Ambiljadwal',[JadwalKegiatanController::class,'jadwalviewall'])->name('Jadwalkegiatan/Ambiljadwal');
    Route::post('jadwalbetween',[JadwalKegiatanController::class,'jadwalviewbetween'])->name('Jadwalkegiatan/jadwalbetween');

});

Route::prefix('Absensi')->group(function(){
    Route::post('Cekkode',[absensiController::class,'cekkodeqr'])->name('Absensi/Cekkode');
});

Route::prefix('Useradmin')->group(function(){
    Route::post('Simpan',[UseradminController::class,'store'])->name('Useradmin/Simpan');
    Route::post('view',[UseradminController::class,'views'])->name('Useradmin/view');
    Route::delete('delete/{id}',[UseradminController::class,'destroy'])->name('Useradmin/delete');
});


Route::prefix('Bookdiksa')->group(function(){
    Route::post('simpan',[BookdiksaController::class,'store'])->name('Bookdiksa/simpan');
    Route::post('cektotaldiksa',[BookdiksaController::class,'checkcbt'])->name('Bookdiksa/cektotaldiksa');
    Route::post('view',[BookdiksaController::class,'reportdiksa'])->name('Bookdiksa/view');
    Route::post('viewdaftar',[BookdiksaController::class,'daftarudiksa'])->name('Bookdiksa/viewdaftar');
    Route::post('filterdiksa',[BookdiksaController::class,'filterdiksa'])->name('Bookdiksa/filterdiksa');
    Route::post('filterdatediksa',[BookdiksaController::class,'filterbydate'])->name('Bookdiksa/filterdatediksa');
    Route::post('exportfilterdiksa',[BookdiksaController::class,'exfilterdiksa'])->name('Bookdiksa/exportfilterdiksa');
    Route::post('exportfilterdiksadate',[BookdiksaController::class,'exfilterdiksadate'])->name('Bookdiksa/exportfilterdiksadate');
    Route::post('cektempdata',[BookdiksaController::class,'checktemp'])->name('Bookdiksa/cektempdata');
    Route::post('checkiddiksa',[BookdiksaController::class,'checkid'])->name('Bookdiksa/checkiddiksa');
    Route::post('getdatakode',[BookdiksaController::class,'getkartudiksa'])->name('Bookdiksa/getdatakode');
});

Route::prefix('Kartudiksa')->group(function(){
    Route::post('save',[kartudiksaController::class,'saves'])->name('Kartudiksa/save');
    Route::put('cari/{id}',[kartudiksaController::class,'caridata'])->name('Kartudiksa/cari');
    Route::post('Updatekartu/{id}',[kartudiksaController::class,'update'])->name('Kartudiksa/Updatekartu');
});

Route::prefix('Reservasi')->group(function(){
    Route::post('simpan',[ReservdiksaController::class,'store'])->name('Reservasi/simpan');
    Route::post('Checkkartu',[ReservdiksaController::class,'cekkartu'])->name('Reservasi/Checkkartu');
   
});