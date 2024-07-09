<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage students']);
        Permission::create(['name' => 'manage courses']);
        Permission::create(['name' => 'manage teachers']);
        Permission::create(['name' => 'manage admins']);
        Permission::create(['name' => 'take attendance']);
        Permission::create(['name' => 'view attendance']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['manage students', 'manage courses', 'manage teachers', 'manage admins']);

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('take attendance');

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view attendance');
    }
}
