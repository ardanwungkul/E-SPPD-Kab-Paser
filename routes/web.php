<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JenisPerjalananController;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\NotaDinasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SPPDController;
use App\Http\Controllers\SPTController;
use App\Http\Controllers\SubBagianController;
use App\Http\Controllers\SubBidangController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\TingkatPerjalananDinasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('role', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('sistem/konfigurasi', [KonfigurasiController::class, 'index'])->name('config.index');
    Route::post('sistem/konfigurasi', [KonfigurasiController::class, 'store'])->name('config.store');
    Route::post('sistem/preferensi', [KonfigurasiController::class, 'storePreferensi'])->name('preferensi.store');

    Route::resource('nota-dinas', NotaDinasController::class)->parameters(['nota-dinas' => 'nota_dinas']);
    Route::get('nota-dinas/{nota_dinas}/disposisi', [NotaDinasController::class, 'disposisiCreate'])->name('nota-dinas.disposisi.create');
    Route::post('nota-dinas/{nota_dinas}/disposisi', [NotaDinasController::class, 'disposisiStore'])->name('nota-dinas.disposisi.store');
    Route::get('nota-dinas-cetak/{nota_dinas}', [NotaDinasController::class, 'print'])->name('nota-dinas.print');
    Route::resource('spt', SPTController::class);
    Route::get('spt-cetak/{spt}', [SPTController::class, 'print'])->name('spt.print');
    Route::resource('sppd', SPPDController::class);

    Route::resource('anggaran-tahunan', AnggaranController::class)->names('anggaran')->parameters(['anggaran' => 'anggaran']);
    Route::resource('referensi/program', ProgramController::class);
    Route::resource('referensi/kegiatan', KegiatanController::class);
    Route::resource('referensi/sub-kegiatan', SubKegiatanController::class);
    Route::get('referensi/get-kegiatan-by-program', [KegiatanController::class, 'getKegiatanByProgram'])->name('get.kegiatan.by.program');
    Route::get('referensi/get-sub-kegiatan-by-kegiatan', [SubKegiatanController::class, 'getSubKegiatanByKegiatan'])->name('get.sub-kegiatan.by.kegiatan');

    Route::resource('referensi/jenis-perjalanan', JenisPerjalananController::class);
    Route::resource('referensi/bidang', BidangController::class);
    Route::resource('referensi/sub-bidang', SubBidangController::class);
    Route::get('referensi/get-sub-bidang-by-bidang', [SubBidangController::class, 'getSubBidangByBidang'])->name('get.sub-bidang.by.bidang');

    Route::resource('pegawai', PegawaiController::class);
    Route::resource('master/golongan', GolonganController::class);
    Route::resource('master/tingkat-perjalanan-dinas', TingkatPerjalananDinasController::class)->parameters(['tingkat-perjalanan-dinas' => 'tingkat_perjalanan_dinas']);
    Route::resource('master/desa', DesaController::class);
    Route::resource('master/kecamatan', KecamatanController::class);
    Route::resource('master/kabupaten-kota', KabupatenKotaController::class)->parameters(['kabupaten-kota' => 'kabupaten_kota']);
    Route::resource('master/provinsi', ProvinsiController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
