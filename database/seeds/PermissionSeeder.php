<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        Permission::create(['name' => 'play-video']);
        Permission::create(['name' => 'add-edit-video']);
        Permission::create(['name' => 'delete-video']);
    }
}
