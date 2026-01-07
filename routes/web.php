<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JenisPerjalananController;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\MonitoringSPPDController;
use App\Http\Controllers\NotaDinasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RiilAnggaranController;
use App\Http\Controllers\RincianBiayaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SPPDController;
use App\Http\Controllers\SPTController;
use App\Http\Controllers\StandarUangHarianController;
use App\Http\Controllers\SubBidangController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\TingkatPerjalananDinasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('users', UserController::class);

    Route::middleware('level:3')->group(function() {
        Route::get('sistem/pengaturan-sistem', [KonfigurasiController::class, 'index'])->name('config.index');
        Route::get('sistem/format-nomor', [KonfigurasiController::class, 'formatindex'])->name('format.index');
        Route::get('sistem/kop-surat', [KonfigurasiController::class, 'kopindex'])->name('kop.surat.index');
    
        Route::post('sistem/konfigurasi', [KonfigurasiController::class, 'store'])->name('config.store');
        Route::post('sistem/preferensi', [KonfigurasiController::class, 'storePreferensi'])->name('preferensi.store');
        Route::post('sistem/kop-surat', [KonfigurasiController::class, 'storeKopSurat'])->name('kop-surat.store');
    });

    Route::resource('spt', SPTController::class);
    Route::get('spt-cetak/{spt}', [SPTController::class, 'print'])->name('spt.print');
    Route::resource('sppd', SPPDController::class);
    Route::get('sppd-cetak/{sppd}', [SPPDController::class, 'print'])->name('sppd.print');
    Route::resource('rincian-biaya', RincianBiayaController::class);
    Route::get('rincian-biaya-cetak/{rincian_biaya}', [RincianBiayaController::class, 'print'])->name('rincian-biaya.print');

    Route::resource('realisasi-anggaran', RiilAnggaranController::class);
    Route::resource('monitoring-sppd', MonitoringSPPDController::class);

    Route::resource('standar-uang-harian', StandarUangHarianController::class)->names('suh')->parameters(['standar-uang-harian' => 'suh']);
    Route::resource('anggaran-tahunan', AnggaranController::class)->names('anggaran')->parameters(['anggaran-tahunan' => 'anggaran']);
    Route::resource('referensi/program', ProgramController::class);
    Route::resource('referensi/kegiatan', KegiatanController::class);
    Route::resource('referensi/sub-kegiatan', SubKegiatanController::class);
    Route::get('referensi/get-kegiatan-by-program', [KegiatanController::class, 'getKegiatanByProgram'])->name('get.kegiatan.by.program');
    Route::get('referensi/get-sub-kegiatan-by-kegiatan', [SubKegiatanController::class, 'getSubKegiatanByKegiatan'])->name('get.sub-kegiatan.by.kegiatan');
    Route::get('referensi/get-kdprog-kdgiata-by-sub-kegiatan', [SubKegiatanController::class, 'getKdprogKdgiataBySubKegiatan'])->name('get.kdprog-kdgiat.by.sub-kegiatan');
    Route::get('referensi/get-anggaran-by-sub-kegiatan', [SubKegiatanController::class, 'getAnggaraBySubKegiatan'])->name('get.anggaran.by.sub-kegiatan');
    Route::get('referensi/get-sub-kegiatan-by-sub-bidang', [SubKegiatanController::class, 'getSubKegiatanBySubBidang'])->name('get.sub-kegiatan.by.sub-bidang');

    Route::resource('referensi/jenis-perjalanan', JenisPerjalananController::class);
    
    Route::resource('referensi/bidang', BidangController::class);
    Route::resource('referensi/sub-bidang', SubBidangController::class);
    Route::get('referensi/get-bidang-by-sub-bidang', [SubBidangController::class, 'getBidangBySubBidang'])->name('get.bidang.by.sub-bidang');
    Route::get('referensi/get-sub-bidang-by-bidang', [SubBidangController::class, 'getSubBidangByBidang'])->name('get.sub-bidang.by.bidang');

    Route::resource('pegawai', PegawaiController::class);
    Route::resource('master/golongan', GolonganController::class);
    Route::get('master/get-golongan-by-jenis-pegawai', [GolonganController::class, 'getGolonganByJenisPegawai'])->name('get.golongan.by.jenis-pegawai');
    Route::resource('master/tingkat-perjalanan-dinas', TingkatPerjalananDinasController::class)->parameters(['tingkat-perjalanan-dinas' => 'tingkat_perjalanan_dinas']);
    Route::resource('master/desa', DesaController::class);
    Route::resource('master/kecamatan', KecamatanController::class);
    Route::get('master/kecamatan-by-kabupaten-kota', [KecamatanController::class, 'getKecamatanByKabupatenKota'])->name('get.kecamatan-by-kabupaten-kota');
    Route::resource('master/kabupaten-kota', KabupatenKotaController::class)->parameters(['kabupaten-kota' => 'kabupaten_kota']);
    Route::get('master/kabupaten-kota-by-provinsi', [KabupatenKotaController::class, 'getKabupatenKotaByProvinsi'])->name('get.kabupaten-kota-by-provinsi');
    Route::resource('master/provinsi', ProvinsiController::class);
    Route::get('master/wilayah-by-jenis-sppd',[ProvinsiController::class, 'getWilayahByJenisSPPD'])->name('get.wilayah.by.jenis-sppd');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
