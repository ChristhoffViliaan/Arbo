<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if (! is_string($email) || trim($email) === '' || ! is_string($password) || $password === '') {
            throw new RuntimeException('Set ADMIN_EMAIL and ADMIN_PASSWORD before seeding the admin user.');
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Arbo Admin',
                'password' => $password,
                'is_admin' => true,
            ],
        );
    }
}
