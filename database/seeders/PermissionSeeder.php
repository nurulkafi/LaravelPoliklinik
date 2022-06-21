<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'obat-list',
            'obat-create',
            'obat-edit',
            'obat-delete',
            'pemeriksaan-list',
            'pemeriksaan-create',
            'pemeriksaan-edit',
            'pemeriksaan-delete',
            'jenis-biaya-list',
            'jenis-biaya-create',
            'jenis-biaya-edit',
            'jenis-biaya-delete',
            'pasien-list',
            'pasien-create',
            'pasien-edit',
            'pasien-delete',
            'pendaftaran-list',
            'pendaftaran-create',
            'pendaftaran-edit',
            'pendaftaran-delete',
            'poliklik-list',
            'poliklik-create',
            'poliklik-edit',
            'poliklik-delete',
            'dokter-list',
            'dokter-create',
            'dokter-edit',
            'dokter-delete',
            'jadwal-praktek-list',
            'jadwal-praktek-create',
            'jadwal-praktek-edit',
            'jadwal-praktek-delete',
            'pegawai-list',
            'pegawai-create',
            'pegawai-edit',
            'pegawai-delete',
            'media-pembayaran-list',
            'media-pembayaran-create',
            'media-pembayaran-edit',
            'media-pembayaran-delete',
            'pembayaran-list',
            'pembayaran-create',
            'pembayaran-edit',
            'pembayaran-delete',
            'dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
