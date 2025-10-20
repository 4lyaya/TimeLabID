<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LabScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID dari tabel lain
        $tkjId = DB::table('departments')->where('slug', 'teknik-komputer-dan-jaringan')->value('id');
        $rplId = DB::table('departments')->where('slug', 'rekayasa-perangkat-lunak')->value('id');

        $labTefaId = DB::table('rooms')->where('name', 'Lab TEFA')->value('id');
        $rpsId = DB::table('rooms')->where('name', 'RPS')->value('id');

        $activityId = DB::table('activities')->where('slug', 'kegiatan-praktek')->value('id');

        $schedules = [
            [
                'department_id' => $tkjId,
                'room_id' => $labTefaId,
                'activity_id' => $activityId,
                'category' => 'Praktek Jaringan Dasar',
                'date' => Carbon::now()->addDay()->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'booked_by' => 'Guru TKJ',
                'status' => 'dipakai',
                'notes' => 'Kegiatan praktek instalasi LAN untuk kelas XI TKJ.',
            ],
            [
                'department_id' => $rplId,
                'room_id' => $rpsId,
                'activity_id' => $activityId,
                'category' => 'Praktek Pemrograman',
                'date' => Carbon::now()->addDays(2)->toDateString(),
                'start_time' => '10:30:00',
                'end_time' => '14:25:00',
                'booked_by' => 'Guru RPL',
                'status' => 'dipakai',
                'notes' => 'Kegiatan praktek pembuatan aplikasi CRUD menggunakan Laravel.',
            ],
        ];

        DB::table('lab_schedules')->insertOrIgnore($schedules);
    }
}
