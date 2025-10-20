<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MakeUserCommand extends Command
{
    protected $signature = 'user:make';
    protected $description = 'Membuat user baru dengan sistem lengkap dan tampilan profesional';

    public function handle()
    {
        $this->newLine(2);
        $this->info('🚀  Membuat User Baru');
        $this->line(str_repeat('=', 40));

        // Input nama
        $name = $this->ask('🧑 Nama lengkap');

        // Input email: otomatis domain sekolah
        $username = strtolower(str_replace(' ', '.', trim($name)));
        $email = $username . '@timelab.id';
        $this->info("📧 Email otomatis: {$email}");

        // Password
        $password = $this->secret('🔑 Password (min. 8 karakter)');

        if (strlen($password) < 8) {
            $this->error('❌ Password terlalu pendek. Minimal 8 karakter.');
            return 1;
        }

        // Role
        $role = $this->choice('🛠 Pilih role', ['admin', 'petugas'], 0);

        // Nomor HP (opsional)
        $phone = $this->ask('📱 Nomor HP (opsional)', null);

        // Avatar (opsional)
        $avatar = $this->ask('🖼 Path avatar (opsional)', null);

        // Status aktif
        $isActive = $this->confirm('✅ Aktifkan user ini?', true);

        $this->newLine();
        $this->info('✨ Data yang akan dibuat:');
        $this->table(
            ['Field', 'Value'],
            [
                ['Nama', $name],
                ['Email', $email],
                ['Role', ucfirst($role)],
                ['HP', $phone ?: '-'],
                ['Avatar', $avatar ?: '-'],
                ['Aktif', $isActive ? 'Ya' : 'Tidak'],
            ]
        );

        if (!$this->confirm('Apakah data di atas sudah benar?')) {
            $this->warn('❌ Pembuatan user dibatalkan.');
            return 0;
        }

        // Cek email unik
        if (User::where('email', $email)->exists()) {
            $this->error('❌ Email sudah terdaftar. Gunakan nama lain.');
            return 1;
        }

        // Simpan ke database
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
            'phone' => $phone,
            'avatar' => $avatar,
            'is_active' => $isActive,
        ]);

        $this->newLine();
        $this->info('✅ User berhasil dibuat!');
        $this->line('🎯 Selesai. Sistem siap digunakan.');
    }
}
