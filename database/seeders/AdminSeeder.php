<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin')],
        ];

        foreach ($admins as $admin) {
            $admin = User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => $admin['password'],
                'email_verified_at' => now(),
            ])->assignRole('admin');

        }
    }
}
