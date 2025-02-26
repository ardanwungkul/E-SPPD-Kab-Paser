<?php

namespace Database\Seeders;

use App\Models\Anggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\JenisPegawai;
use App\Models\JenisPerjalanan;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\SubBidang;
use App\Models\SubKegiatan;
use App\Models\TingkatPerjalananDinas;
use Illuminate\Database\Seeder;

class RefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $bidang = [
        //     ['tahun' => '2025', 'id' => 1, 'uraian' => 'BAGIAN UMUM'],
        //     ['tahun' => '2025', 'id' => 2, 'uraian' => 'BAGIAN PROTOKOL DAN KOMUNIKASI PIMPINAN'],
        //     ['tahun' => '2025', 'id' => 3, 'uraian' => 'BAGIAN KESEJAHTERAAN RAKYAT'],
        //     ['tahun' => '2025', 'id' => 4, 'uraian' => 'BAGIAN PEREKONOMIAN DAN SUMBER DAYA ALAM'],
        //     ['tahun' => '2025', 'id' => 5, 'uraian' => 'BAGIAN HUKUM'],
        //     ['tahun' => '2025', 'id' => 6, 'uraian' => 'BAGIAN PEMERINTAHAN'],
        //     ['tahun' => '2025', 'id' => 7, 'uraian' => 'BAGIAN ORGANISASI'],
        //     ['tahun' => '2025', 'id' => 8, 'uraian' => 'BAGIAN ADMINISTRASI PEMBANGUNAN'],
        //     ['tahun' => '2025', 'id' => 9, 'uraian' => 'BAGIAN PENGADAAN BARANG DAN JASA']
        // ];
        $bidang = [
            ['id' => 1, 'tahun' => '2025', 'uraian' => 'SEKRETARIAT BKAD', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:32:18', 'updated_at' => '2025-02-19 02:32:18'],
            ['id' => 2, 'tahun' => '2025', 'uraian' => 'BIDANG ANGGARAN', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:32:23', 'updated_at' => '2025-02-19 02:32:23'],
            ['id' => 3, 'tahun' => '2025', 'uraian' => 'BIDANG PERBENDAHARAAN', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:32:28', 'updated_at' => '2025-02-19 02:32:28'],
            ['id' => 5, 'tahun' => '2025', 'uraian' => 'BIDANG AKUNTANSI', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:32:35', 'updated_at' => '2025-02-19 02:32:35'],
            ['id' => 6, 'tahun' => '2025', 'uraian' => 'BIDANG ASET', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:32:42', 'updated_at' => '2025-02-19 02:32:42'],
            ['id' => 7, 'tahun' => '2025', 'uraian' => 'DARI SKPD LAIN', 'deleted_at' => NULL, 'created_at' => '2025-02-26 04:06:02', 'updated_at' => '2025-02-26 04:06:02']
        ];


        // $sub_bidang = [
        //     ['tahun' => '2025', 'bidang_id' => 1, 'uraian' => 'SUB. BAGIAN UMUM'],
        //     ['tahun' => '2025', 'bidang_id' => 1, 'uraian' => 'SUB. BAGIAN KEUANGAN'],
        //     ['tahun' => '2025', 'bidang_id' => 2, 'uraian' => 'SUB. BAGIAN PROTOKOL'],
        //     ['tahun' => '2025', 'bidang_id' => 2, 'uraian' => 'SUB. BAGIAN KOMUNIKASI PIMPINAN'],
        //     ['tahun' => '2025', 'bidang_id' => 3, 'uraian' => 'SUB. BAGIAN KESEJAHTERAAN RAKYAT'],
        //     ['tahun' => '2025', 'bidang_id' => 4, 'uraian' => 'SUB. BAGIAN PEREKONOMIAN'],
        //     ['tahun' => '2025', 'bidang_id' => 4, 'uraian' => 'SUB. BAGIAN SUMBER DAYA ALAM'],
        //     ['tahun' => '2025', 'bidang_id' => 5, 'uraian' => 'SUB. BAGIAN HUKUM'],
        //     ['tahun' => '2025', 'bidang_id' => 6, 'uraian' => 'SUB. BAGIAN PEMERINTAHAN'],
        //     ['tahun' => '2025', 'bidang_id' => 7, 'uraian' => 'SUB. BAGIAN ORGANISASI'],
        //     ['tahun' => '2025', 'bidang_id' => 8, 'uraian' => 'SUB. BAGIAN ADMINISTRASI PEMBANGUNAN'],
        //     ['tahun' => '2025', 'bidang_id' => 9, 'uraian' => 'SUB. BAGIAN PENGADAAN BARANG DAN JASA']
        // ];
        $sub_bidang = [
            ['id' => 1, 'bidang_id' => 1, 'tahun' => '2025', 'uraian' => 'SEKRETARIAT BKAD', 'deleted_at' => NULL, 'created_at' => '2025-02-19 02:34:21', 'updated_at' => '2025-02-19 02:36:10'],
            ['id' => 2, 'bidang_id' => 2, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG PENGELOLAAN ANGGARAN SATUAN KERJA PENGELOLA KEUANGAN DAERAH', 'deleted_at' => NULL, 'created_at' => '2025-02-20 01:45:46', 'updated_at' => '2025-02-20 01:45:46'],
            ['id' => 3, 'bidang_id' => 2, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG PERENCANAAN & PENYUSUNAN ANGGARAN', 'deleted_at' => NULL, 'created_at' => '2025-02-20 01:48:12', 'updated_at' => '2025-02-20 01:48:12'],
            ['id' => 4, 'bidang_id' => 3, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG ADMINISTRASI PERBENDAHARAAN', 'deleted_at' => NULL, 'created_at' => '2025-02-20 13:45:04', 'updated_at' => '2025-02-20 13:45:04'],
            ['id' => 5, 'bidang_id' => 3, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG BELANJA', 'deleted_at' => NULL, 'created_at' => '2025-02-20 13:45:33', 'updated_at' => '2025-02-20 13:45:33'],
            ['id' => 6, 'bidang_id' => 5, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG AKUNTANSI BELANJA', 'deleted_at' => NULL, 'created_at' => '2025-02-21 01:19:44', 'updated_at' => '2025-02-21 01:19:44'],
            ['id' => 7, 'bidang_id' => 5, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG AKUNTANSI PENDAPATAN', 'deleted_at' => NULL, 'created_at' => '2025-02-21 01:20:08', 'updated_at' => '2025-02-21 01:20:08'],
            ['id' => 8, 'bidang_id' => 6, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG PEMANFAATAN DAN PENGHAPUSAN', 'deleted_at' => NULL, 'created_at' => '2025-02-21 03:25:12', 'updated_at' => '2025-02-21 03:25:12'],
            ['id' => 9, 'bidang_id' => 6, 'tahun' => '2025', 'uraian' => 'SUB. BIDANG PERENCANAAN DAN INVENTARISASI', 'deleted_at' => NULL, 'created_at' => '2025-02-21 03:26:11', 'updated_at' => '2025-02-21 03:26:11']
        ];

        $jenis_pegawai = [
            ['id' => 1, 'uraian' => 'Kepala Daerah'],
            ['id' => 2, 'uraian' => 'Anggota DPRD'],
            ['id' => 3, 'uraian' => 'Pegawai PNS'],
            ['id' => 4, 'uraian' => 'Pegawai PPPK'],
            ['id' => 5, 'uraian' => 'Pegawai THL'],
            ['id' => 9, 'uraian' => 'Pegawai SKPD Lain']
        ];

        $jenis_sppd = [
            ['id' => 1, 'uraian' => 'Dalam Daerah', 'wilayah' => 'Kecamatan'],
            ['id' => 2, 'uraian' => 'Luar Daerah Dalam Provinsi', 'wilayah' => 'Provinsi'],
            ['id' => 3, 'uraian' => 'Luar Daerah Luar Provinsi', 'wilayah' => 'Kabupaten']
        ];

        // $program = [
        //     ['id' => 1, 'tahun' => '2025', 'kode' => '4.01.01', 'uraian' => 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KAB/KOTA'],
        //     ['id' => 2, 'tahun' => '2025', 'kode' => '4.01.02', 'uraian' => 'PROGRAM PEMERINTAHAN DAN KESEJAHTERAAN RAKYAT'],
        //     ['id' => 3, 'tahun' => '2025', 'kode' => '4.01.03', 'uraian' => 'PROGRAM PEREKONOMIAN DAN PEMBANGUNAN']
        // ];
        $program = [
            ['id' => 1, 'kode' => '5.02.01', 'tahun' => '2025', 'uraian' => 'PROGRAM PENUNJANG URUSAN PEMERINTAH DAERAH KABUPATEN/KOTA', 'created_at' => '2025-02-19 02:38:37', 'updated_at' => '2025-02-19 02:38:37'],
            ['id' => 2, 'kode' => '5.02.02', 'tahun' => '2025', 'uraian' => 'PROGRAM PENGELOLAAN KEUANGAN DAERAH', 'created_at' => '2025-02-20 01:49:20', 'updated_at' => '2025-02-20 01:49:20'],
            ['id' => 4, 'kode' => '5.02.03', 'tahun' => '2025', 'uraian' => 'PROGRAM PENGELOLAAN BARANG MILIK DAERAH', 'created_at' => '2025-02-21 03:28:03', 'updated_at' => '2025-02-21 03:28:03']
        ];

        // $kegiatan = [
        //     ['id' => 1, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.01', 'uraian' => 'PERENCANAAN, PENGANGGARAN, DAN EVALUASI KINERJA PERANGKAT DAERAH'],
        //     ['id' => 2, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.02', 'uraian' => 'ADMINISTRASI KEUANGAN PERANGKAT DAERAH'],
        //     ['id' => 3, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.03', 'uraian' => 'ADMINISTRASI BARANG MILIK DAERAH PADA PERANGKAT DAERAH'],
        //     ['id' => 4, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.06', 'uraian' => 'ADMINISTRASI UMUM PERANGKAT DAERAH'],
        //     ['id' => 5, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.07', 'uraian' => 'PENGADAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAH DAERAH'],
        //     ['id' => 6, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.08', 'uraian' => 'PENYEDIAAN JASA PENUNJANG URUSAN PEMERINTAHAN DAERAH'],
        //     ['id' => 7, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.09', 'uraian' => 'PEMELIHARAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAHAN DAERAH'],
        //     ['id' => 8, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.13', 'uraian' => 'PENATAAN ORGANISASI'],
        //     ['id' => 9, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.14', 'uraian' => 'PELAKSANAAN  PROTOKOL DAN KOMUNIKASI PIMPINAN'],

        //     ['id' => 10, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.01', 'uraian' => 'ADMINISTRASI TATA PEMERINTAHAN'],
        //     ['id' => 11, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.02', 'uraian' => 'PELAKSANAAN KEBIJAKAN KESEJAHTERAAN RAKYAT'],
        //     ['id' => 12, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.03', 'uraian' => 'FASILITASI DAN KOORDINASI HUKUM'],

        //     ['id' => 13, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.01', 'uraian' => 'PELAKSANAAN KEBIJAKAN PEREKONOMIAN'],
        //     ['id' => 14, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.02', 'uraian' => 'PELAKSANAAN ADMINISTRASI PEMBANGUNAN'],
        //     ['id' => 15, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.03', 'uraian' => 'PENGELOLAAN PENGADAAN BARANG DAN JASA'],
        //     ['id' => 16, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.04', 'uraian' => 'PEMANTAUAN KEBIJAKAN SUMBER DAYA ALAM']
        // ];
        $kegiatan = [
            ['id' => 5, 'kode' => '2.01', 'tahun' => '2025', 'uraian' => 'PERENCANAAN, PENGANGGARAN, DAN EVALUASI KINERJA PERANGKAT DAERAH', 'program_id' => 1, 'created_at' => '2025-02-19 02:55:16', 'updated_at' => '2025-02-19 03:01:03'],
            ['id' => 6, 'kode' => '2.06', 'tahun' => '2025', 'uraian' => 'ADMINISTRASI UMUM PERANGKAT DAERAH', 'program_id' => 1, 'created_at' => '2025-02-19 14:40:48', 'updated_at' => '2025-02-19 14:42:11'],
            ['id' => 7, 'kode' => '2.01', 'tahun' => '2025', 'uraian' => 'KOORDINASI DAN PENYUSUNAN RENCANA ANGGARAN DAERAH', 'program_id' => 2, 'created_at' => '2025-02-20 01:51:34', 'updated_at' => '2025-02-20 01:51:53'],
            ['id' => 8, 'kode' => '2.02', 'tahun' => '2025', 'uraian' => 'KOORDINASI DAN PENGELOLAAN PERBENDAHARAAN DAERAH', 'program_id' => 2, 'created_at' => '2025-02-20 13:49:42', 'updated_at' => '2025-02-20 13:49:42'],
            ['id' => 9, 'kode' => '2.03', 'tahun' => '2025', 'uraian' => 'KOORDINASI DAN PELAKSANAAN AKUNTANSI DAN PELAPORAN KEUANGAN DAERAH', 'program_id' => 2, 'created_at' => '2025-02-21 01:21:56', 'updated_at' => '2025-02-21 01:21:56'],
            ['id' => 10, 'kode' => '2.01', 'tahun' => '2025', 'uraian' => 'PENGELOLAAN BARANG MILIK DAERAH', 'program_id' => 4, 'created_at' => '2025-02-21 03:29:58', 'updated_at' => '2025-02-21 03:29:58']
        ];

        // $sub_kegiatan = [
        //     ['id' => 1, 'tahun' => '2025', 'kegiatan_id' => 1, 'kode' => '0001', 'uraian' => 'Penyusunan Dokumen Perencanaan Perangkat Daerah'],

        //     ['id' => 2, 'tahun' => '2025', 'kegiatan_id' => 2, 'kode' => '0003', 'uraian' => 'Pelaksanaan Penatausahaan dan Pengujian/Verifikasi Keuangan SKPD'],

        //     ['id' => 3, 'tahun' => '2025', 'kegiatan_id' => 3, 'kode' => '0006', 'uraian' => 'Penatausahaan Barang Milik Daerah pada SKPD '],

        //     ['id' => 4, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0008', 'uraian' => 'Fasilitasi Kunjungan Tamu'],
        //     ['id' => 5, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0009', 'uraian' => 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD'],
        //     ['id' => 6, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0010', 'uraian' => 'Penatausahaan Arsip Dinamis Pada SKPD'],

        //     ['id' => 7, 'tahun' => '2025', 'kegiatan_id' => 5, 'kode' => '0009', 'uraian' => 'Pengadaan Gedung Kantor atau Bangunan Lainnya'],

        //     ['id' => 8, 'tahun' => '2025', 'kegiatan_id' => 6, 'kode' => '0001', 'uraian' => 'Penyediaan Jasa Surat Menyurat'],

        //     ['id' => 9, 'tahun' => '2025', 'kegiatan_id' => 7, 'kode' => '0009', 'uraian' => 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya'],

        //     ['id' => 10, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0001', 'uraian' => 'Pengelolaan Kelembagaan dan Analisis Jabatan'],
        //     ['id' => 11, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0002', 'uraian' => 'Fasilitasi Pelayanan Publik dan Tata Laksana '],
        //     ['id' => 12, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0003', 'uraian' => 'Peningkatan Kinerja dan Reformasi Birokrasi'],
        //     ['id' => 13, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0004', 'uraian' => 'Monitoring, Evaluasi dan Pengendalian Kualitas Pelayanan Publik dan Tata Laksana'],
        //     ['id' => 14, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0005', 'uraian' => 'Koordinasi dan Penyusunan Laporan Kinerja Pemerintah Daerah'],

        //     ['id' => 15, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0001', 'uraian' => 'Fasilitasi Keprotokolan'],
        //     ['id' => 16, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0002', 'uraian' => 'Fasilitasi Komunikasi Pimpinan'],
        //     ['id' => 17, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0003', 'uraian' => 'Pendokumentasian Tugas Pimpinan'],

        //     ['id' => 18, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0001', 'uraian' => 'Penataan Adminisrasi Pemerintahan'],
        //     ['id' => 19, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0002', 'uraian' => 'Pengelolaan Administrasi kewilayahan'],
        //     ['id' => 20, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0003', 'uraian' => 'Fasilitasi Pelaksanaan Otonomi Daerah'],

        //     ['id' => 21, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0001', 'uraian' => 'Fasilitasi Pengelolaan Bina Mental Spiritual'],
        //     ['id' => 22, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0002', 'uraian' => 'Pelaksanaan Kebijakan, Evaluasi, dan Capaian Kinerja Terkait Kesejahteraan Sosial '],
        //     ['id' => 23, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0003', 'uraian' => 'Pelaksanaan Kebijakan, Evaluasi, dan Capaian Kinerja Terkait Kesejahteraan Masyarakat'],

        //     ['id' => 24, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0001', 'uraian' => 'Fasilitasi Penyusunan Produk Hukum Daerah'],
        //     ['id' => 25, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0002', 'uraian' => 'Fasilitasi Bantuan Hukum'],
        //     ['id' => 26, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0003', 'uraian' => 'Pendokumentasian Produk Hukum dan Pengelolaan Informasi Hukum '],

        //     ['id' => 27, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0001', 'uraian' => 'Koordinasi, Sinkronisasi, Monitoring dan Evaluasi Kebijakan Pengelolaan BUMD dan BLUD'],
        //     ['id' => 28, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0002', 'uraian' => 'Pengendalian dan Distribusi Perekonomian'],
        //     ['id' => 29, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0003', 'uraian' => 'Perencanaan dan Pengawasan Ekonomi Mikro Kecil'],
        //     ['id' => 30, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0005', 'uraian' => 'Koordinasi, Sinkronisasi, dan Evaluasi Kebijakan Pendirian BUMD'],

        //     ['id' => 31, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0001', 'uraian' => 'Fasilitas Penyusunan Program Pembangunan'],
        //     ['id' => 32, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0002', 'uraian' => 'Pengendalian dan Evaluasi Program Pembangunan'],
        //     ['id' => 33, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0003', 'uraian' => 'Pengelolaan Evaluasi dan Pelaporan Pelaksanaan Pembangunan'],

        //     ['id' => 34, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0001', 'uraian' => 'Pengelolaan Pengadaan Barang dan Jasa'],
        //     ['id' => 35, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0002', 'uraian' => 'Pengelolaan Layanan Pengadaan Secara Elektronik'],
        //     ['id' => 36, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0003', 'uraian' => 'Pembinaan dan Advokasi Pengadaan Barang dan Jasa'],

        //     ['id' => 37, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0001', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Pertanian, Kehutanan, Kelautan, dan Perikanan'],
        //     ['id' => 38, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0002', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Pertambangan dan Lingkungan Hidup'],
        //     ['id' => 39, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0003', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Energi dan Air']
        // ];
        $sub_kegiatan = [
            ['id' => 1, 'kode' => '0001', 'tahun' => '2025', 'kegiatan_id' => 5, 'uraian' => 'Penyusunan Dokumen Perencanaan Perangkat Daerah', 'created_at' => '2025-02-19 03:01:27', 'updated_at' => '2025-02-19 03:02:54', 'deleted_at' => NULL],
            ['id' => 2, 'kode' => '0004', 'tahun' => '2025', 'kegiatan_id' => 5, 'uraian' => 'Koordinasi dan Penyusunan DPA-SKPD', 'created_at' => '2025-02-19 14:15:26', 'updated_at' => '2025-02-19 14:20:46', 'deleted_at' => NULL],
            ['id' => 3, 'kode' => '0006', 'tahun' => '2025', 'kegiatan_id' => 5, 'uraian' => 'Koordinasi dan Penyusunan Laporan Capaian Kinerja dan Ikhtisar Realisasi Kinerja SKPD', 'created_at' => '2025-02-19 14:26:46', 'updated_at' => '2025-02-19 14:26:46', 'deleted_at' => NULL],
            ['id' => 4, 'kode' => '0007', 'tahun' => '2025', 'kegiatan_id' => 5, 'uraian' => 'Evaluasi Kinerja Perangkat Daerah', 'created_at' => '2025-02-19 14:32:28', 'updated_at' => '2025-02-19 14:32:28', 'deleted_at' => NULL],
            ['id' => 5, 'kode' => '0009', 'tahun' => '2025', 'kegiatan_id' => 6, 'uraian' => 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', 'created_at' => '2025-02-19 14:44:53', 'updated_at' => '2025-02-19 14:45:32', 'deleted_at' => NULL],
            ['id' => 6, 'kode' => '0002', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi dan Penyusunan Perubahan KUA dan Perubahan PPAS', 'created_at' => '2025-02-20 01:53:02', 'updated_at' => '2025-02-20 01:53:02', 'deleted_at' => NULL],
            ['id' => 7, 'kode' => '0003', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi, Penyusunan dan Verifikasi RKA-SKPD', 'created_at' => '2025-02-20 02:10:23', 'updated_at' => '2025-02-20 02:10:23', 'deleted_at' => NULL],
            ['id' => 8, 'kode' => '0006', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi, Penyusunan dan Verifikasi Perubahan DPA-SKPD', 'created_at' => '2025-02-20 02:18:12', 'updated_at' => '2025-02-20 02:18:12', 'deleted_at' => NULL],
            ['id' => 9, 'kode' => '0013', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Pembinaan Perencanaan Penganggaran Daerah Pemerintah Kabupaten/Kota', 'created_at' => '2025-02-20 02:21:15', 'updated_at' => '2025-02-20 02:21:15', 'deleted_at' => NULL],
            ['id' => 10, 'kode' => '0004', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi, Penyusunan dan Verifikasi Perubahan RKA-SKPD', 'created_at' => '2025-02-20 02:25:22', 'updated_at' => '2025-02-20 02:25:22', 'deleted_at' => NULL],
            ['id' => 11, 'kode' => '0001', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi dan Penyusunan KUA dan PPAS', 'created_at' => '2025-02-20 02:29:17', 'updated_at' => '2025-02-20 02:29:17', 'deleted_at' => NULL],
            ['id' => 12, 'kode' => '0011', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi Perencanaan Anggaran Belanja Daerah', 'created_at' => '2025-02-20 02:36:01', 'updated_at' => '2025-02-20 02:36:01', 'deleted_at' => NULL],
            ['id' => 13, 'kode' => '0007', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi dan Penyusunan Peraturan Daerah Tentang APBD dan Peraturan Kepala Daerah Tentang Penjabaran APBD', 'created_at' => '2025-02-20 12:31:42', 'updated_at' => '2025-02-20 12:31:42', 'deleted_at' => NULL],
            ['id' => 14, 'kode' => '0005', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi, Penyusunan dan Verifikasi DPA-SKPD', 'created_at' => '2025-02-20 13:10:54', 'updated_at' => '2025-02-20 13:10:54', 'deleted_at' => NULL],
            ['id' => 15, 'kode' => '0012', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi Perencanaan Anggaran Pembiayaan', 'created_at' => '2025-02-20 13:16:10', 'updated_at' => '2025-02-20 13:16:10', 'deleted_at' => NULL],
            ['id' => 16, 'kode' => '0010', 'tahun' => '2025', 'kegiatan_id' => 7, 'uraian' => 'Koordinasi Perencanaan Anggaran Pendapatan', 'created_at' => '2025-02-20 13:24:05', 'updated_at' => '2025-02-20 13:24:05', 'deleted_at' => NULL],
            ['id' => 17, 'kode' => '0001', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Koordinasi dan Pengelolaan Kas Daerah', 'created_at' => '2025-02-20 13:52:03', 'updated_at' => '2025-02-20 13:52:03', 'deleted_at' => NULL],
            ['id' => 18, 'kode' => '0002', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Pengelolaan Sisa Lebih Perhitungan Anggaran Tahun Sebelumnya', 'created_at' => '2025-02-20 13:59:58', 'updated_at' => '2025-02-20 13:59:58', 'deleted_at' => NULL],
            ['id' => 19, 'kode' => '0004', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Penatausahaan Pembiayaan Daerah', 'created_at' => '2025-02-20 14:06:01', 'updated_at' => '2025-02-20 14:06:01', 'deleted_at' => NULL],
            ['id' => 20, 'kode' => '0005', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Koordinasi, Fasilitasi, Asistensi, Sinkronisasi, Supervisi, Monitoring dan Evaluasi Pengelolaan Dana Perimbangan dan Dana transfer Lainnya', 'created_at' => '2025-02-20 14:17:54', 'updated_at' => '2025-02-20 14:17:54', 'deleted_at' => NULL],
            ['id' => 21, 'kode' => '0006', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Koordinasi, Pelaksanaan Kerja Sama dan Pemantauan Transaksi Non Tunai dengan Lembaga Keuangan Bank dan Lembaga Keuangan Bukan Bank', 'created_at' => '2025-02-20 14:26:22', 'updated_at' => '2025-02-20 14:26:22', 'deleted_at' => NULL],
            ['id' => 22, 'kode' => '0007', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Koordinasi dan Penyusunan Laporan Realisasi Penerimaan dan Pengeluaran Kas Daerah, Laporan Aliran Kas, dan Pelaksanaan........', 'created_at' => '2025-02-20 14:37:46', 'updated_at' => '2025-02-20 14:37:46', 'deleted_at' => NULL],
            ['id' => 23, 'kode' => '0008', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Koordinasi Pelaksanaan Piutang dan Utang Daerah yang Timbul Akibat Pengelolaan Kas, Palaksanaan Analisis Pembiayaan dan........', 'created_at' => '2025-02-20 14:54:39', 'updated_at' => '2025-02-20 14:54:39', 'deleted_at' => NULL],
            ['id' => 24, 'kode' => '0009', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Rekonsiliasi Data Penerimaan dan Pengeluaran Kas Serta Pemungutan dan Pemotongan atas SP2D dengan Instansi Terkait', 'created_at' => '2025-02-20 15:03:48', 'updated_at' => '2025-02-20 15:03:48', 'deleted_at' => NULL],
            ['id' => 25, 'kode' => '0011', 'tahun' => '2025', 'kegiatan_id' => 8, 'uraian' => 'Pembinaan Penatausahaan Keuangan Pemerintah kabupaten/Kota', 'created_at' => '2025-02-20 15:19:02', 'updated_at' => '2025-02-20 15:19:02', 'deleted_at' => NULL],
            ['id' => 26, 'kode' => '0001', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Koordinasi Pelaksanaan Akuntansi Penerimaan dan Pengeluaran Kas Daerah', 'created_at' => '2025-02-21 01:23:31', 'updated_at' => '2025-02-21 01:23:31', 'deleted_at' => NULL],
            ['id' => 27, 'kode' => '0003', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Koordinasi Penyusunan Laporan Pertanggungjawaban Pelaksanaan APBD Bulanan, Triwulanan dan Semesteran', 'created_at' => '2025-02-21 01:34:11', 'updated_at' => '2025-02-21 01:34:11', 'deleted_at' => NULL],
            ['id' => 28, 'kode' => '0004', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Konsolidasi Laporan Keuangan SKPD, BLUD dan Laporan Keuangan Pemerintah Daerah', 'created_at' => '2025-02-21 01:39:31', 'updated_at' => '2025-02-21 01:39:31', 'deleted_at' => NULL],
            ['id' => 29, 'kode' => '0006', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Penyusunan Tanggapan/Tindak Lanjut Terhadap LHP BPK atas Laporan Pertanggungjawaban Pelaksanaan APBD', 'created_at' => '2025-02-21 01:51:02', 'updated_at' => '2025-02-21 01:51:02', 'deleted_at' => NULL],
            ['id' => 30, 'kode' => '0007', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Koordinasi, Sinkronisasi, dan Penyelesaian Tuntutan Perbendaharaan dan Tuntutan Kerugian Daerah', 'created_at' => '2025-02-21 01:55:03', 'updated_at' => '2025-02-21 01:55:03', 'deleted_at' => NULL],
            ['id' => 31, 'kode' => '0008', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Penyusunan Analisis Laporan Pertanggungjawaban Pelaksanaan APBD', 'created_at' => '2025-02-21 01:59:39', 'updated_at' => '2025-02-21 01:59:39', 'deleted_at' => NULL],
            ['id' => 32, 'kode' => '0010', 'tahun' => '2025', 'kegiatan_id' => 9, 'uraian' => 'Penyusunan Sistem dan Prosedur Akuntansi dan Pelaporan Keuangan Pemerintah Daerah', 'created_at' => '2025-02-21 02:11:25', 'updated_at' => '2025-02-21 02:11:25', 'deleted_at' => NULL],
            ['id' => 33, 'kode' => '0001', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penyusunan Standar Harga', 'created_at' => '2025-02-21 03:30:49', 'updated_at' => '2025-02-21 03:30:49', 'deleted_at' => NULL],
            ['id' => 34, 'kode' => '0002', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penyusunan Standar Barang Milik Daerah dan Standar Kebutuhan Barang Milik Daerah', 'created_at' => '2025-02-21 03:33:49', 'updated_at' => '2025-02-21 03:33:49', 'deleted_at' => NULL],
            ['id' => 35, 'kode' => '0003', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penyusunan Perencanaan Kebutuhan Barang Milik Daerah', 'created_at' => '2025-02-21 03:37:37', 'updated_at' => '2025-02-21 03:37:37', 'deleted_at' => NULL],
            ['id' => 36, 'kode' => '0004', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penyusunan Kebijakan Pengelolaan Barang Milik Daerah', 'created_at' => '2025-02-21 03:39:32', 'updated_at' => '2025-02-21 03:39:32', 'deleted_at' => NULL],
            ['id' => 37, 'kode' => '0005', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penatausahaan Barang Milik Daerah', 'created_at' => '2025-02-21 03:43:30', 'updated_at' => '2025-02-21 03:43:30', 'deleted_at' => NULL],
            ['id' => 38, 'kode' => '0006', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Inventarisasi Barang Milik Daerah', 'created_at' => '2025-02-21 14:13:52', 'updated_at' => '2025-02-21 14:13:52', 'deleted_at' => NULL],
            ['id' => 39, 'kode' => '0007', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Pengamanan Barang Milik Daerah', 'created_at' => '2025-02-21 14:16:41', 'updated_at' => '2025-02-21 14:16:41', 'deleted_at' => NULL],
            ['id' => 40, 'kode' => '0008', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penilaian Barang Milik Daerah', 'created_at' => '2025-02-21 14:42:50', 'updated_at' => '2025-02-21 14:42:50', 'deleted_at' => NULL],
            ['id' => 41, 'kode' => '0009', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Pengawasan dan Pengendalian Pengelolaan Barang Milik Daerah', 'created_at' => '2025-02-21 14:44:42', 'updated_at' => '2025-02-21 14:44:42', 'deleted_at' => NULL],
            ['id' => 42, 'kode' => '0010', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Optimalisasi Penggunaan, Pemanfaatan, Pemindahtanganan,, Pemusnahan, dan Penghapusan Barang Milik Daerah', 'created_at' => '2025-02-21 14:48:47', 'updated_at' => '2025-02-21 14:48:47', 'deleted_at' => NULL],
            ['id' => 43, 'kode' => '0011', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Rekonsiliasi Dalam Rangka Penyusunan Laporan Barang Milik Daerah', 'created_at' => '2025-02-21 14:54:12', 'updated_at' => '2025-02-21 14:54:12', 'deleted_at' => NULL],
            ['id' => 44, 'kode' => '0012', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Penyusunan Laporan Barang Milik Daerah', 'created_at' => '2025-02-21 15:05:33', 'updated_at' => '2025-02-21 15:05:33', 'deleted_at' => NULL],
            ['id' => 45, 'kode' => '0013', 'tahun' => '2025', 'kegiatan_id' => 10, 'uraian' => 'Pembinaan Pengelolaan Barang Milik Daerah Pemerintah Kabupaten/Kota', 'created_at' => '2025-02-21 15:14:24', 'updated_at' => '2025-02-21 15:14:24', 'deleted_at' => NULL]
        ];

        $pangkat = [
            ['id' => 1, 'kode_golongan' => 'KDH2', 'jenis_pegawai_id' => 1, 'uraian' => 'KEPALA DAERAH'],
            ['id' => 2, 'kode_golongan' => 'KDH1', 'jenis_pegawai_id' => 1, 'uraian' => 'WAKIL KEPALA DAERAH'],
            ['id' => 3, 'kode_golongan' => 'DPRD3', 'jenis_pegawai_id' => 2, 'uraian' => 'KETUA DPRD'],
            ['id' => 4, 'kode_golongan' => 'DPRD2', 'jenis_pegawai_id' => 2, 'uraian' => 'WAKIL KETUA DPRD'],
            ['id' => 5, 'kode_golongan' => 'DPRD1', 'jenis_pegawai_id' => 2, 'uraian' => 'ANGGOTA DPRD'],
            ['id' => 6, 'kode_golongan' => 'I/A', 'jenis_pegawai_id' => 3, 'uraian' => 'JURU MUDA'],
            ['id' => 7, 'kode_golongan' => 'I/B', 'jenis_pegawai_id' => 3, 'uraian' => 'JURU MUDA TK. I'],
            ['id' => 8, 'kode_golongan' => 'I/C', 'jenis_pegawai_id' => 3, 'uraian' => 'J U R U'],
            ['id' => 9, 'kode_golongan' => 'I/D', 'jenis_pegawai_id' => 3, 'uraian' => 'JURU TK. I'],
            ['id' => 10, 'kode_golongan' => 'II/A', 'jenis_pegawai_id' => 3, 'uraian' => 'PENGATUR MUDA'],
            ['id' => 11, 'kode_golongan' => 'II/B', 'jenis_pegawai_id' => 3, 'uraian' => 'PENGATUR MUDA TK. I'],
            ['id' => 12, 'kode_golongan' => 'II/C', 'jenis_pegawai_id' => 3, 'uraian' => 'PENGATUR'],
            ['id' => 13, 'kode_golongan' => 'II/D', 'jenis_pegawai_id' => 3, 'uraian' => 'PENGATUR TK. I'],
            ['id' => 14, 'kode_golongan' => 'III/A', 'jenis_pegawai_id' => 3, 'uraian' => 'PENATA MUDA'],
            ['id' => 15, 'kode_golongan' => 'III/B', 'jenis_pegawai_id' => 3, 'uraian' => 'PENATA MUDA TK. I'],
            ['id' => 16, 'kode_golongan' => 'III/C', 'jenis_pegawai_id' => 3, 'uraian' => 'PENATA'],
            ['id' => 17, 'kode_golongan' => 'III/D', 'jenis_pegawai_id' => 3, 'uraian' => 'PENATA TK. I'],
            ['id' => 18, 'kode_golongan' => 'IV/A', 'jenis_pegawai_id' => 3, 'uraian' => 'PEMBINA'],
            ['id' => 19, 'kode_golongan' => 'IV/B', 'jenis_pegawai_id' => 3, 'uraian' => 'PEMBINA  TK. I'],
            ['id' => 20, 'kode_golongan' => 'IV/C', 'jenis_pegawai_id' => 3, 'uraian' => 'PEMBINA UTAMA MUDA'],
            ['id' => 21, 'kode_golongan' => 'IV/D', 'jenis_pegawai_id' => 3, 'uraian' => 'PEMBINA UTAMA MADYA'],
            ['id' => 22, 'kode_golongan' => 'IV/E', 'jenis_pegawai_id' => 3, 'uraian' => 'PEMBINA UTAMA'],
            ['id' => 23, 'kode_golongan' => '01', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN I'],
            ['id' => 24, 'kode_golongan' => '02', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN II'],
            ['id' => 25, 'kode_golongan' => '03', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN III'],
            ['id' => 26, 'kode_golongan' => '04', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN IV'],
            ['id' => 27, 'kode_golongan' => '05', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN V'],
            ['id' => 28, 'kode_golongan' => '06', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN VI'],
            ['id' => 29, 'kode_golongan' => '07', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN VII'],
            ['id' => 30, 'kode_golongan' => '08', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN VIII'],
            ['id' => 31, 'kode_golongan' => '09', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN IX'],
            ['id' => 32, 'kode_golongan' => '10', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN X'],
            ['id' => 33, 'kode_golongan' => '11', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XI'],
            ['id' => 34, 'kode_golongan' => '12', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XII'],
            ['id' => 35, 'kode_golongan' => '13', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XIII'],
            ['id' => 36, 'kode_golongan' => '14', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XIV'],
            ['id' => 37, 'kode_golongan' => '15', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XV'],
            ['id' => 38, 'kode_golongan' => '16', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XVI'],
            ['id' => 39, 'kode_golongan' => '17', 'jenis_pegawai_id' => 4, 'uraian' => 'GOLONGAN XVII'],
            ['id' => 40, 'kode_golongan' => 'THL2', 'jenis_pegawai_id' => 5, 'uraian' => 'PEGAWAI THL'],
            ['id' => 41, 'kode_golongan' => 'THL1', 'jenis_pegawai_id' => 5, 'uraian' => 'PEGAWAI PTT'],
            ['id' => 42, 'kode_golongan' => 'SKPD1', 'jenis_pegawai_id' => 9, 'uraian' => 'PEGAWAI SKPD LAIN']
        ];

        $tingkat_sppd = [
            ['tingkat_sppd' => 1, 'uraian' => 'I (Satu)', 'keterangan' => 'Tingkat Satu'],
            ['tingkat_sppd' => 2, 'uraian' => 'II (Dua)', 'keterangan' => 'Tingkat Dua'],
            ['tingkat_sppd' => 3, 'uraian' => 'III (Tiga)', 'keterangan' => 'Tingkat Tiga'],
            ['tingkat_sppd' => 4, 'uraian' => 'IV (Empat)', 'keterangan' => 'Tingkat Empat']
        ];




        Bidang::insert($bidang);
        SubBidang::insert($sub_bidang);
        JenisPerjalanan::insert($jenis_sppd);
        Program::insert($program);
        Kegiatan::insert($kegiatan);
        SubKegiatan::insert($sub_kegiatan);
        JenisPegawai::insert($jenis_pegawai);
        Golongan::insert($pangkat);
        TingkatPerjalananDinas::insert($tingkat_sppd);
    }
}
