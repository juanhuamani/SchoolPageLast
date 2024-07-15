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
        Permission::create(['name' => 'take attendance']);
        Permission::create(['name' => 'view attendance']);
        Permission::create(['name' => 'edit courses']);


        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([ 'view attendance', 'edit courses']);

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('take attendance' , 'view attendance');

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view attendance');
    }
}
