<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Teknik Komputer dan Jaringan',
                'slug' => Str::slug('Teknik Komputer dan Jaringan'),
                'description' => 'Jurusan yang mempelajari instalasi, konfigurasi, dan perawatan jaringan komputer.'
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'slug' => Str::slug('Rekayasa Perangkat Lunak'),
                'description' => 'Jurusan yang fokus pada pengembangan aplikasi, pemrograman, dan rekayasa software.'
            ]
        ];

        DB::table('departments')->insert($departments);
    }
}
