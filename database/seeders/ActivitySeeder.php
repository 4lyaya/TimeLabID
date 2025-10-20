<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('activities')->insertOrIgnore([
            [
                'name' => 'Kegiatan Praktek',
                'slug' => Str::slug('Kegiatan Praktek'),
                'description' => 'Kegiatan pembelajaran berbasis praktik di laboratorium atau ruang praktek untuk meningkatkan keterampilan siswa.',
            ],
        ]);
    }
}
