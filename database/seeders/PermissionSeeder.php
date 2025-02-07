<?php

namespace Database\Seeders;

use App\Models\PermissionCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        PermissionCategory::create(['nama' => 'Akses User']);
        Permission::create(['name' => 'Daftar User', 'category_id' => 1]);
        Permission::create(['name' => 'Tambah User', 'category_id' => 1]);
        Permission::create(['name' => 'Edit User', 'category_id' => 1]);
        Permission::create(['name' => 'Hapus User', 'category_id' => 1]);

        PermissionCategory::create(['nama' => 'Akses Role']);
        Permission::create(['name' => 'Daftar Role', 'category_id' => 2]);
        Permission::create(['name' => 'Tambah Role', 'category_id' => 2]);
        Permission::create(['name' => 'Edit Role', 'category_id' => 2]);
        Permission::create(['name' => 'Hapus Role', 'category_id' => 2]);


        PermissionCategory::create(['nama' => 'Akses Provinsi']);
        Permission::create(['name' => 'Daftar Provinsi', 'category_id' => 3]);
        Permission::create(['name' => 'Tambah Provinsi', 'category_id' => 3]);
        Permission::create(['name' => 'Edit Provinsi', 'category_id' => 3]);
        Permission::create(['name' => 'Hapus Provinsi', 'category_id' => 3]);

        PermissionCategory::create(['nama' => 'Akses Kabupaten/Kota']);
        Permission::create(['name' => 'Daftar Kabupaten/Kota', 'category_id' => 4]);
        Permission::create(['name' => 'Tambah Kabupaten/Kota', 'category_id' => 4]);
        Permission::create(['name' => 'Edit Kabupaten/Kota', 'category_id' => 4]);
        Permission::create(['name' => 'Hapus Kabupaten/Kota', 'category_id' => 4]);

        PermissionCategory::create(['nama' => 'Akses Kecamatan']);
        Permission::create(['name' => 'Daftar Kecamatan', 'category_id' => 5]);
        Permission::create(['name' => 'Tambah Kecamatan', 'category_id' => 5]);
        Permission::create(['name' => 'Edit Kecamatan', 'category_id' => 5]);
        Permission::create(['name' => 'Hapus Kecamatan', 'category_id' => 5]);

        PermissionCategory::create(['nama' => 'Akses Desa']);
        Permission::create(['name' => 'Daftar Desa', 'category_id' => 6]);
        Permission::create(['name' => 'Tambah Desa', 'category_id' => 6]);
        Permission::create(['name' => 'Edit Desa', 'category_id' => 6]);
        Permission::create(['name' => 'Hapus Desa', 'category_id' => 6]);

        PermissionCategory::create(['nama' => 'Akses Tingkat Perjalanan Dinas']);
        Permission::create(['name' => 'Daftar Tingkat Perjalanan Dinas', 'category_id' => 7]);
        Permission::create(['name' => 'Tambah Tingkat Perjalanan Dinas', 'category_id' => 7]);
        Permission::create(['name' => 'Edit Tingkat Perjalanan Dinas', 'category_id' => 7]);
        Permission::create(['name' => 'Hapus Tingkat Perjalanan Dinas', 'category_id' => 7]);

        PermissionCategory::create(['nama' => 'Akses Pangkat/Golongan']);
        Permission::create(['name' => 'Daftar Pangkat/Golongan', 'category_id' => 8]);
        Permission::create(['name' => 'Tambah Pangkat/Golongan', 'category_id' => 8]);
        Permission::create(['name' => 'Edit Pangkat/Golongan', 'category_id' => 8]);
        Permission::create(['name' => 'Hapus Pangkat/Golongan', 'category_id' => 8]);

        PermissionCategory::create(['nama' => 'Akses Pegawai']);
        Permission::create(['name' => 'Daftar Pegawai', 'category_id' => 9]);
        Permission::create(['name' => 'Tambah Pegawai', 'category_id' => 9]);
        Permission::create(['name' => 'Edit Pegawai', 'category_id' => 9]);
        Permission::create(['name' => 'Hapus Pegawai', 'category_id' => 9]);

        PermissionCategory::create(['nama' => 'Akses Ref Sub Bagian']);
        Permission::create(['name' => 'Daftar Ref Sub Bagian', 'category_id' => 10]);
        Permission::create(['name' => 'Tambah Ref Sub Bagian', 'category_id' => 10]);
        Permission::create(['name' => 'Edit Ref Sub Bagian', 'category_id' => 10]);
        Permission::create(['name' => 'Hapus Ref Sub Bagian', 'category_id' => 10]);

        PermissionCategory::create(['nama' => 'Akses Ref Bagian']);
        Permission::create(['name' => 'Daftar Ref Bagian', 'category_id' => 11]);
        Permission::create(['name' => 'Tambah Ref Bagian', 'category_id' => 11]);
        Permission::create(['name' => 'Edit Ref Bagian', 'category_id' => 11]);
        Permission::create(['name' => 'Hapus Ref Bagian', 'category_id' => 11]);

        PermissionCategory::create(['nama' => 'Akses Sub Bidang']);
        Permission::create(['name' => 'Daftar Sub Bidang', 'category_id' => 12]);
        Permission::create(['name' => 'Tambah Sub Bidang', 'category_id' => 12]);
        Permission::create(['name' => 'Edit Sub Bidang', 'category_id' => 12]);
        Permission::create(['name' => 'Hapus Sub Bidang', 'category_id' => 12]);

        PermissionCategory::create(['nama' => 'Akses Bidang']);
        Permission::create(['name' => 'Daftar Bidang', 'category_id' => 13]);
        Permission::create(['name' => 'Tambah Bidang', 'category_id' => 13]);
        Permission::create(['name' => 'Edit Bidang', 'category_id' => 13]);
        Permission::create(['name' => 'Hapus Bidang', 'category_id' => 13]);

        PermissionCategory::create(['nama' => 'Akses Jenis SPPD']);
        Permission::create(['name' => 'Daftar Jenis SPPD', 'category_id' => 14]);
        Permission::create(['name' => 'Tambah Jenis SPPD', 'category_id' => 14]);
        Permission::create(['name' => 'Edit Jenis SPPD', 'category_id' => 14]);
        Permission::create(['name' => 'Hapus Jenis SPPD', 'category_id' => 14]);

        PermissionCategory::create(['nama' => 'Akses Sub Kegiatan']);
        Permission::create(['name' => 'Daftar Sub Kegiatan', 'category_id' => 15]);
        Permission::create(['name' => 'Tambah Sub Kegiatan', 'category_id' => 15]);
        Permission::create(['name' => 'Edit Sub Kegiatan', 'category_id' => 15]);
        Permission::create(['name' => 'Hapus Sub Kegiatan', 'category_id' => 15]);

        PermissionCategory::create(['nama' => 'Akses Kegiatan']);
        Permission::create(['name' => 'Daftar Kegiatan', 'category_id' => 16]);
        Permission::create(['name' => 'Tambah Kegiatan', 'category_id' => 16]);
        Permission::create(['name' => 'Edit Kegiatan', 'category_id' => 16]);
        Permission::create(['name' => 'Hapus Kegiatan', 'category_id' => 16]);

        PermissionCategory::create(['nama' => 'Akses Program']);
        Permission::create(['name' => 'Daftar Program', 'category_id' => 17]);
        Permission::create(['name' => 'Tambah Program', 'category_id' => 17]);
        Permission::create(['name' => 'Edit Program', 'category_id' => 17]);
        Permission::create(['name' => 'Hapus Program', 'category_id' => 17]);



        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('Daftar User');

        $superadminRole = Role::create(['name' => 'Super Admin']);

        $user = User::factory()->create([
            'name' => 'Ardan Sebagai Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($superadminRole);
    }
}
