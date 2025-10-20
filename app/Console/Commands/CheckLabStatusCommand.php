<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\LabSchedule;

class CheckLabStatusCommand extends Command
{
    protected $signature = 'schedule:check-status';
    protected $description = 'Perbarui status jadwal lab yang sudah selesai otomatis';

    public function handle()
    {
        $now = Carbon::now('Asia/Jakarta');

        $updated = LabSchedule::where('status', 'aktif')
            ->where(function ($q) use ($now) {
                $q->where('end_time', '<', $now->format('H:i'))
                    ->orWhere('date', '<', $now->toDateString());
            })
            ->update(['status' => 'selesai']);

        if ($updated > 0) {
            $this->info("{$updated} jadwal lab diperbarui menjadi 'selesai'.");
        } else {
            $this->info('Tidak ada jadwal lab yang perlu diperbarui.');
        }

        return Command::SUCCESS;
    }
}
