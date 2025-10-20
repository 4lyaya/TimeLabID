<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID jurusan (pastikan sudah ada di tabel departments)
        $tkjId = DB::table('departments')->where('slug', 'teknik-komputer-dan-jaringan')->value('id');
        $rplId = DB::table('departments')->where('slug', 'rekayasa-perangkat-lunak')->value('id');

        $rooms = [
            [
                'department_id' => $tkjId,
                'name' => 'Lab TEFA',
                'location' => 'Lantai 2 Gedung Utama',
                'capacity' => 25,
                'status' => 'tersedia',
            ],
            [
                'department_id' => $rplId,
                'name' => 'RPS',
                'location' => 'Lantai 1 Gedung RPL',
                'capacity' => 20,
                'status' => 'tersedia',
            ],
        ];

        DB::table('rooms')->insert($rooms);
    }
}
