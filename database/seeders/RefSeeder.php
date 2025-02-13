<?php

namespace Database\Seeders;

use App\Models\Anggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bidang;
use App\Models\Config;
use App\Models\Golongan;
use App\Models\Jabatan;
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
        $config = [
            ['tahun' => '2025', 'aktif' => 'Y', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => ''],
            ['tahun' => '2026', 'aktif' => 'T', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => ''],
            ['tahun' => '2027', 'aktif' => 'T', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => '']
        ];
        $bidang = [
            ['tahun' => '2025', 'id' => 1, 'uraian' => 'BAGIAN UMUM'],
            ['tahun' => '2025', 'id' => 2, 'uraian' => 'BAGIAN PROTOKOL DAN KOMUNIKASI PIMPINAN'],
            ['tahun' => '2025', 'id' => 3, 'uraian' => 'BAGIAN KESEJAHTERAAN RAKYAT'],
            ['tahun' => '2025', 'id' => 4, 'uraian' => 'BAGIAN PEREKONOMIAN DAN SUMBER DAYA ALAM'],
            ['tahun' => '2025', 'id' => 5, 'uraian' => 'BAGIAN HUKUM'],
            ['tahun' => '2025', 'id' => 6, 'uraian' => 'BAGIAN PEMERINTAHAN'],
            ['tahun' => '2025', 'id' => 7, 'uraian' => 'BAGIAN ORGANISASI'],
            ['tahun' => '2025', 'id' => 8, 'uraian' => 'BAGIAN ADMINISTRASI PEMBANGUNAN'],
            ['tahun' => '2025', 'id' => 9, 'uraian' => 'BAGIAN PENGADAAN BARANG DAN JASA']
        ];
        $sub_bidang = [
            ['tahun' => '2025', 'bidang_id' => 1, 'uraian' => 'SUB. BAGIAN UMUM'],
            ['tahun' => '2025', 'bidang_id' => 1, 'uraian' => 'SUB. BAGIAN KEUANGAN'],
            ['tahun' => '2025', 'bidang_id' => 2, 'uraian' => 'SUB. BAGIAN PROTOKOL'],
            ['tahun' => '2025', 'bidang_id' => 2, 'uraian' => 'SUB. BAGIAN KOMUNIKASI PIMPINAN'],
            ['tahun' => '2025', 'bidang_id' => 3, 'uraian' => 'SUB. BAGIAN KESEJAHTERAAN RAKYAT'],
            ['tahun' => '2025', 'bidang_id' => 4, 'uraian' => 'SUB. BAGIAN PEREKONOMIAN'],
            ['tahun' => '2025', 'bidang_id' => 4, 'uraian' => 'SUB. BAGIAN SUMBER DAYA ALAM'],
            ['tahun' => '2025', 'bidang_id' => 5, 'uraian' => 'SUB. BAGIAN HUKUM'],
            ['tahun' => '2025', 'bidang_id' => 6, 'uraian' => 'SUB. BAGIAN PEMERINTAHAN'],
            ['tahun' => '2025', 'bidang_id' => 7, 'uraian' => 'SUB. BAGIAN ORGANISASI'],
            ['tahun' => '2025', 'bidang_id' => 8, 'uraian' => 'SUB. BAGIAN ADMINISTRASI PEMBANGUNAN'],
            ['tahun' => '2025', 'bidang_id' => 9, 'uraian' => 'SUB. BAGIAN PENGADAAN BARANG DAN JASA']
        ];
        $jabatan = [
            ['id' => 1, 'uraian' => 'Bupati Paser', 'ttd_default' => 'Y'],
            ['id' => 2, 'uraian' => 'Wakil Bupati', 'ttd_default' => 'Y'],
            ['id' => 3, 'uraian' => 'Sekretaris Daerah', 'ttd_default' => 'Y'],
            ['id' => 4, 'uraian' => 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'ttd_default' => 'Y'],
            ['id' => 5, 'uraian' => 'Asisten Administrasi Umum', 'ttd_default' => 'Y'],
            ['id' => 6, 'uraian' => 'Asisten Perekonomian dan Pembangunan', 'ttd_default' => 'Y'],
            ['id' => 7, 'uraian' => 'Sekretaris DPRD', 'ttd_default' => 'Y'],
            ['id' => 8, 'uraian' => 'Kepala Bagian Umum dan Keuangan', 'ttd_default' => 'N'],
            ['id' => 9, 'uraian' => 'Kepala Sub. Bagian Tata Usaha dan Kepegawaian', 'ttd_default' => 'N'],
            ['id' => 10, 'uraian' => 'Kepala Bagian Fasilitasi Pengawasan dan Penganggaran', 'ttd_default' => 'N'],
            ['id' => 11, 'uraian' => 'Kepala Bagian Persidangan dan Perundang-Undangan', 'ttd_default' => 'N'],
            ['id' => 12, 'uraian' => 'Analis Pengawasan', 'ttd_default' => 'N'],
            ['id' => 13, 'uraian' => 'Analis Hukum Muda', 'ttd_default' => 'N'],
            ['id' => 14, 'uraian' => 'Analis Kebijakan Muda', 'ttd_default' => 'N'],
            ['id' => 15, 'uraian' => 'Analis Pengembangan SDM Aparatur', 'ttd_default' => 'N'],
            ['id' => 16, 'uraian' => 'Analis Perencanaan, Evaluasi dan Pelaporan', 'ttd_default' => 'N'],
            ['id' => 17, 'uraian' => 'Analis Berita Bagian Persidagan dan Perundang-Undangan', 'ttd_default' => 'N'],
            ['id' => 18, 'uraian' => 'Pengadministrasi Umum', 'ttd_default' => 'N'],
            ['id' => 19, 'uraian' => 'Pengadministrasi Rapat', 'ttd_default' => 'N'],
            ['id' => 20, 'uraian' => 'Perisalah Legislatif Muda', 'ttd_default' => 'N'],
            ['id' => 21, 'uraian' => 'Penata Laporan Keuangan', 'ttd_default' => 'N'],
            ['id' => 22, 'uraian' => 'Pranata Hubungan Masyarakat Muda', 'ttd_default' => 'N'],
            ['id' => 23, 'uraian' => 'Pranata Hubungan Masyarakat Ahli Pertama', 'ttd_default' => 'N'],
            ['id' => 24, 'uraian' => 'Penyusun Bahan Kebijakan', 'ttd_default' => 'N'],
            ['id' => 25, 'uraian' => 'Penyusun Rencana Kebutuhan Rumah Tangga dan Perlengkapan', 'ttd_default' => 'N'],
            ['id' => 26, 'uraian' => 'Perancang Peraturan Perundan-Undangan Muda', 'ttd_default' => 'N'],
            ['id' => 27, 'uraian' => 'Pengadministrasi Data Peraturan Perundang-Undangan', 'ttd_default' => 'N'],
            ['id' => 28, 'uraian' => 'Pengelola Pengawasan', 'ttd_default' => 'N'],
            ['id' => 29, 'uraian' => 'Pengelola Persidangan', 'ttd_default' => 'N'],
            ['id' => 30, 'uraian' => 'Pengelola Perjalanan Dinas', 'ttd_default' => 'N'],
            ['id' => 31, 'uraian' => 'Pengelola Pengkajian dan Penelaahan Hukum', 'ttd_default' => 'N'],
            ['id' => 32, 'uraian' => 'Pengelola Pelaporan dan Evaluasi Pelaksanaan APD', 'ttd_default' => 'N'],
            ['id' => 33, 'uraian' => 'Pengelola Sarana dan Prasarana Kantor', 'ttd_default' => 'N'],
            ['id' => 34, 'uraian' => 'Pengelola Situs/Web', 'ttd_default' => 'N'],
            ['id' => 35, 'uraian' => 'Perencana Ahli Pratama', 'ttd_default' => 'N'],
            ['id' => 36, 'uraian' => 'Teknisi Sarana dan Prasarana', 'ttd_default' => 'N'],
            ['id' => 37, 'uraian' => 'Penata Liputan', 'ttd_default' => 'N'],
            ['id' => 38, 'uraian' => 'Bendahara', 'ttd_default' => 'N'],
            ['id' => 39, 'uraian' => 'Jurnalis', 'ttd_default' => 'N'],
            ['id' => 40, 'uraian' => 'Ajudan', 'ttd_default' => 'N'],
            ['id' => 41, 'uraian' => 'Pramu Kebersihan', 'ttd_default' => 'N']
        ];
        $jenis_sppd = [
            ['id' => 1, 'uraian' => 'Perjalanan Dinas Dalam Daerah', 'wilayah' => 'Kecamatan'],
            ['id' => 2, 'uraian' => 'Perjalanan Dinas Luar Daerah', 'wilayah' => 'Provinsi'],
            ['id' => 3, 'uraian' => 'Perjalanan Dinas Dalam Daerah Dalam Provinsi', 'wilayah' => 'Kabupaten']
        ];
        $program = [
            ['id' => 1, 'tahun' => '2025', 'kode' => '4.01.01', 'uraian' => 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KAB/KOTA'],
            ['id' => 2, 'tahun' => '2025', 'kode' => '4.01.02', 'uraian' => 'PROGRAM PEMERINTAHAN DAN KESEJAHTERAAN RAKYAT'],
            ['id' => 3, 'tahun' => '2025', 'kode' => '4.01.03', 'uraian' => 'PROGRAM PEREKONOMIAN DAN PEMBANGUNAN']
        ];
        $kegiatan = [
            ['id' => 1, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.01', 'uraian' => 'PERENCANAAN, PENGANGGARAN, DAN EVALUASI KINERJA PERANGKAT DAERAH'],
            ['id' => 2, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.02', 'uraian' => 'ADMINISTRASI KEUANGAN PERANGKAT DAERAH'],
            ['id' => 3, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.03', 'uraian' => 'ADMINISTRASI BARANG MILIK DAERAH PADA PERANGKAT DAERAH'],
            ['id' => 4, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.06', 'uraian' => 'ADMINISTRASI UMUM PERANGKAT DAERAH'],
            ['id' => 5, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.07', 'uraian' => 'PENGADAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAH DAERAH'],
            ['id' => 6, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.08', 'uraian' => 'PENYEDIAAN JASA PENUNJANG URUSAN PEMERINTAHAN DAERAH'],
            ['id' => 7, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.09', 'uraian' => 'PEMELIHARAAN BARANG MILIK DAERAH PENUNJANG URUSAN PEMERINTAHAN DAERAH'],
            ['id' => 8, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.13', 'uraian' => 'PENATAAN ORGANISASI'],
            ['id' => 9, 'tahun' => '2025', 'program_id' => 1, 'kode' => '2.14', 'uraian' => 'PELAKSANAAN  PROTOKOL DAN KOMUNIKASI PIMPINAN'],

            ['id' => 10, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.01', 'uraian' => 'ADMINISTRASI TATA PEMERINTAHAN'],
            ['id' => 11, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.02', 'uraian' => 'PELAKSANAAN KEBIJAKAN KESEJAHTERAAN RAKYAT'],
            ['id' => 12, 'tahun' => '2025', 'program_id' => 2, 'kode' => '2.03', 'uraian' => 'FASILITASI DAN KOORDINASI HUKUM'],

            ['id' => 13, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.01', 'uraian' => 'PELAKSANAAN KEBIJAKAN PEREKONOMIAN'],
            ['id' => 14, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.02', 'uraian' => 'PELAKSANAAN ADMINISTRASI PEMBANGUNAN'],
            ['id' => 15, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.03', 'uraian' => 'PENGELOLAAN PENGADAAN BARANG DAN JASA'],
            ['id' => 16, 'tahun' => '2025', 'program_id' => 3, 'kode' => '2.04', 'uraian' => 'PEMANTAUAN KEBIJAKAN SUMBER DAYA ALAM']
        ];
        $sub_kegiatan = [
            ['id' => 1, 'tahun' => '2025', 'kegiatan_id' => 1, 'kode' => '0001', 'uraian' => 'Penyusunan Dokumen Perencanaan Perangkat Daerah'],

            ['id' => 2, 'tahun' => '2025', 'kegiatan_id' => 2, 'kode' => '0003', 'uraian' => 'Pelaksanaan Penatausahaan dan Pengujian/Verifikasi Keuangan SKPD'],

            ['id' => 3, 'tahun' => '2025', 'kegiatan_id' => 3, 'kode' => '0006', 'uraian' => 'Penatausahaan Barang Milik Daerah pada SKPD '],

            ['id' => 4, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0008', 'uraian' => 'Fasilitasi Kunjungan Tamu'],
            ['id' => 5, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0009', 'uraian' => 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD'],
            ['id' => 6, 'tahun' => '2025', 'kegiatan_id' => 4, 'kode' => '0010', 'uraian' => 'Penatausahaan Arsip Dinamis Pada SKPD'],

            ['id' => 7, 'tahun' => '2025', 'kegiatan_id' => 5, 'kode' => '0009', 'uraian' => 'Pengadaan Gedung Kantor atau Bangunan Lainnya'],

            ['id' => 8, 'tahun' => '2025', 'kegiatan_id' => 6, 'kode' => '0001', 'uraian' => 'Penyediaan Jasa Surat Menyurat'],

            ['id' => 9, 'tahun' => '2025', 'kegiatan_id' => 7, 'kode' => '0009', 'uraian' => 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya'],

            ['id' => 10, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0001', 'uraian' => 'Pengelolaan Kelembagaan dan Analisis Jabatan'],
            ['id' => 11, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0002', 'uraian' => 'Fasilitasi Pelayanan Publik dan Tata Laksana '],
            ['id' => 12, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0003', 'uraian' => 'Peningkatan Kinerja dan Reformasi Birokrasi'],
            ['id' => 13, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0004', 'uraian' => 'Monitoring, Evaluasi dan Pengendalian Kualitas Pelayanan Publik dan Tata Laksana'],
            ['id' => 14, 'tahun' => '2025', 'kegiatan_id' => 8, 'kode' => '0005', 'uraian' => 'Koordinasi dan Penyusunan Laporan Kinerja Pemerintah Daerah'],

            ['id' => 15, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0001', 'uraian' => 'Fasilitasi Keprotokolan'],
            ['id' => 16, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0002', 'uraian' => 'Fasilitasi Komunikasi Pimpinan'],
            ['id' => 17, 'tahun' => '2025', 'kegiatan_id' => 9, 'kode' => '0003', 'uraian' => 'Pendokumentasian Tugas Pimpinan'],

            ['id' => 18, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0001', 'uraian' => 'Penataan Adminisrasi Pemerintahan'],
            ['id' => 19, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0002', 'uraian' => 'Pengelolaan Administrasi kewilayahan'],
            ['id' => 20, 'tahun' => '2025', 'kegiatan_id' => 10, 'kode' => '0003', 'uraian' => 'Fasilitasi Pelaksanaan Otonomi Daerah'],

            ['id' => 21, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0001', 'uraian' => 'Fasilitasi Pengelolaan Bina Mental Spiritual'],
            ['id' => 22, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0002', 'uraian' => 'Pelaksanaan Kebijakan, Evaluasi, dan Capaian Kinerja Terkait Kesejahteraan Sosial '],
            ['id' => 23, 'tahun' => '2025', 'kegiatan_id' => 11, 'kode' => '0003', 'uraian' => 'Pelaksanaan Kebijakan, Evaluasi, dan Capaian Kinerja Terkait Kesejahteraan Masyarakat'],

            ['id' => 24, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0001', 'uraian' => 'Fasilitasi Penyusunan Produk Hukum Daerah'],
            ['id' => 25, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0002', 'uraian' => 'Fasilitasi Bantuan Hukum'],
            ['id' => 26, 'tahun' => '2025', 'kegiatan_id' => 12, 'kode' => '0003', 'uraian' => 'Pendokumentasian Produk Hukum dan Pengelolaan Informasi Hukum '],

            ['id' => 27, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0001', 'uraian' => 'Koordinasi, Sinkronisasi, Monitoring dan Evaluasi Kebijakan Pengelolaan BUMD dan BLUD'],
            ['id' => 28, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0002', 'uraian' => 'Pengendalian dan Distribusi Perekonomian'],
            ['id' => 29, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0003', 'uraian' => 'Perencanaan dan Pengawasan Ekonomi Mikro Kecil'],
            ['id' => 30, 'tahun' => '2025', 'kegiatan_id' => 13, 'kode' => '0005', 'uraian' => 'Koordinasi, Sinkronisasi, dan Evaluasi Kebijakan Pendirian BUMD'],

            ['id' => 31, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0001', 'uraian' => 'Fasilitas Penyusunan Program Pembangunan'],
            ['id' => 32, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0002', 'uraian' => 'Pengendalian dan Evaluasi Program Pembangunan'],
            ['id' => 33, 'tahun' => '2025', 'kegiatan_id' => 14, 'kode' => '0003', 'uraian' => 'Pengelolaan Evaluasi dan Pelaporan Pelaksanaan Pembangunan'],

            ['id' => 34, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0001', 'uraian' => 'Pengelolaan Pengadaan Barang dan Jasa'],
            ['id' => 35, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0002', 'uraian' => 'Pengelolaan Layanan Pengadaan Secara Elektronik'],
            ['id' => 36, 'tahun' => '2025', 'kegiatan_id' => 15, 'kode' => '0003', 'uraian' => 'Pembinaan dan Advokasi Pengadaan Barang dan Jasa'],

            ['id' => 37, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0001', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Pertanian, Kehutanan, Kelautan, dan Perikanan'],
            ['id' => 38, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0002', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Pertambangan dan Lingkungan Hidup'],
            ['id' => 39, 'tahun' => '2025', 'kegiatan_id' => 16, 'kode' => '0003', 'uraian' => 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Energi dan Air']
        ];
        $anggaran = [
            ['tahun' => '2024', 'sub_kegiatan_id' => 1, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 10, 'rp_pagu' => 44445000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 2, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 103346000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 3, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 82006000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 4, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 2, 'rp_pagu' => 34000000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 4, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 42048000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 5, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 2, 'rp_pagu' => 46750000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 5, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 527496000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 6, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 24562000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 7, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 16212000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 8, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 24948000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 9, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 2, 'rp_pagu' => 27998000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 10, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 9, 'rp_pagu' => 4518850],
            ['tahun' => '2024', 'sub_kegiatan_id' => 10, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 9, 'rp_pagu' => 86230000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 11, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 9, 'rp_pagu' => 122079000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 12, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 9, 'rp_pagu' => 5100000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 12, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 9, 'rp_pagu' => 71291000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 13, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 9, 'rp_pagu' => 20020000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 13, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 9, 'rp_pagu' => 56097000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 14, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 9, 'rp_pagu' => 26222000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 15, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 7, 'rp_pagu' => 211906000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 15, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 7, 'rp_pagu' => 1826380032],
            ['tahun' => '2024', 'sub_kegiatan_id' => 16, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 7, 'rp_pagu' => 27825000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 16, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 7, 'rp_pagu' => 241454000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 17, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 7, 'rp_pagu' => 58620000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 17, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 7, 'rp_pagu' => 233656992],
            ['tahun' => '2024', 'sub_kegiatan_id' => 18, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 11, 'rp_pagu' => 90567104],
            ['tahun' => '2024', 'sub_kegiatan_id' => 18, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 11, 'rp_pagu' => 185892992],
            ['tahun' => '2024', 'sub_kegiatan_id' => 19, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 11, 'rp_pagu' => 105864000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 19, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 11, 'rp_pagu' => 245840000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 20, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 11, 'rp_pagu' => 43315700],
            ['tahun' => '2024', 'sub_kegiatan_id' => 20, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 11, 'rp_pagu' => 68322000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 21, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 8, 'rp_pagu' => 20570000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 21, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 8, 'rp_pagu' => 378249984],
            ['tahun' => '2024', 'sub_kegiatan_id' => 22, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 8, 'rp_pagu' => 8500000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 23, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 8, 'rp_pagu' => 42500000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 23, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 8, 'rp_pagu' => 192887008],
            ['tahun' => '2024', 'sub_kegiatan_id' => 24, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 4, 'rp_pagu' => 67568000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 25, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 4, 'rp_pagu' => 193079008],
            ['tahun' => '2024', 'sub_kegiatan_id' => 26, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 4, 'rp_pagu' => 6055500],
            ['tahun' => '2024', 'sub_kegiatan_id' => 26, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 4, 'rp_pagu' => 43835000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 27, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 126199000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 28, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 12, 'rp_pagu' => 17308700],
            ['tahun' => '2024', 'sub_kegiatan_id' => 28, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 23965000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 29, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 12, 'rp_pagu' => 15343000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 29, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 24294000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 30, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 2310000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 31, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 10, 'rp_pagu' => 5820000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 31, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 10, 'rp_pagu' => 50595000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 32, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 10, 'rp_pagu' => 89050000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 32, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 10, 'rp_pagu' => 53237000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 33, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 10, 'rp_pagu' => 4312500],
            ['tahun' => '2024', 'sub_kegiatan_id' => 33, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 10, 'rp_pagu' => 106555000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 34, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 6, 'rp_pagu' => 10512500],
            ['tahun' => '2024', 'sub_kegiatan_id' => 34, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 6, 'rp_pagu' => 270097984],
            ['tahun' => '2024', 'sub_kegiatan_id' => 35, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 6, 'rp_pagu' => 27634000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 36, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 6, 'rp_pagu' => 35352000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 37, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 12, 'rp_pagu' => 12238000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 37, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 25474000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 38, 'jenis_sppd_id' => 1, 'bidang_sub_id' => 12, 'rp_pagu' => 11358300],
            ['tahun' => '2024', 'sub_kegiatan_id' => 38, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 26174000],
            ['tahun' => '2024', 'sub_kegiatan_id' => 39, 'jenis_sppd_id' => 2, 'bidang_sub_id' => 12, 'rp_pagu' => 28203000],
        ];
        $pangkat = [
            ['jenis_pegawai' => 1, 'kode_golongan' => 'I/A', 'uraian' => 'JURU MUDA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'I/B', 'uraian' => 'JURU MUDA TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'I/C', 'uraian' => 'J U R U'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'I/D', 'uraian' => 'JURU TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'II/A', 'uraian' => 'PENGATUR MUDA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'II/B', 'uraian' => 'PENGATUR MUDA TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'II/C', 'uraian' => 'PENGATUR'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'II/D', 'uraian' => 'PENGATUR TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'III/A', 'uraian' => 'PENATA MUDA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'III/B', 'uraian' => 'PENATA MUDA TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'III/C', 'uraian' => 'PENATA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'III/D', 'uraian' => 'PENATA TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'IV/A', 'uraian' => 'PEMBINA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'IV/B', 'uraian' => 'PEMBINA  TK. I'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'IV/C', 'uraian' => 'PEMBINA UTAMA MUDA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'IV/D', 'uraian' => 'PEMBINA UTAMA MADYA'],
            ['jenis_pegawai' => 1, 'kode_golongan' => 'IV/E', 'uraian' => 'PEMBINA UTAMA'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '01', 'uraian' => 'GOLONGAN I'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '02', 'uraian' => 'GOLONGAN II'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '03', 'uraian' => 'GOLONGAN III'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '04', 'uraian' => 'GOLONGAN IV'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '05', 'uraian' => 'GOLONGAN V'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '06', 'uraian' => 'GOLONGAN VI'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '07', 'uraian' => 'GOLONGAN VII'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '08', 'uraian' => 'GOLONGAN VIII'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '09', 'uraian' => 'GOLONGAN IX'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '10', 'uraian' => 'GOLONGAN X'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '11', 'uraian' => 'GOLONGAN XI'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '12', 'uraian' => 'GOLONGAN XII'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '13', 'uraian' => 'GOLONGAN XIII'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '14', 'uraian' => 'GOLONGAN XIV'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '15', 'uraian' => 'GOLONGAN XV'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '16', 'uraian' => 'GOLONGAN XVI'],
            ['jenis_pegawai' => 2, 'kode_golongan' => '17', 'uraian' => 'GOLONGAN XVII'],
            ['jenis_pegawai' => 3, 'kode_golongan' => '01', 'uraian' => 'HONORER BULANAN'],
            ['jenis_pegawai' => 3, 'kode_golongan' => '02', 'uraian' => 'PEGAWAI TIDAK TETAP']
        ];
        $tingkat_sppd = [
            ['tingkat_sppd' => 1, 'uraian' => 'I (Satu)', 'keterangan' => 'Tingkat Satu'],
            ['tingkat_sppd' => 2, 'uraian' => 'II (Dua)', 'keterangan' => 'Tingkat Dua'],
            ['tingkat_sppd' => 3, 'uraian' => 'III (Tiga)', 'keterangan' => 'Tingkat Tiga'],
            ['tingkat_sppd' => 4, 'uraian' => 'IV (Empat)', 'keterangan' => 'Tingkat Empat']
        ];



        Config::insert($config);
        Bidang::insert($bidang);
        SubBidang::insert($sub_bidang);
        Jabatan::insert($jabatan);
        JenisPerjalanan::insert($jenis_sppd);
        Program::insert($program);
        Kegiatan::insert($kegiatan);
        SubKegiatan::insert($sub_kegiatan);
        Golongan::insert($pangkat);
        TingkatPerjalananDinas::insert($tingkat_sppd);
        Anggaran::insert($anggaran);
    }
}
