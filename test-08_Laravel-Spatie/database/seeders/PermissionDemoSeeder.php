<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'show articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        $roleAuthor = Role::create(['name' => 'author']);
        $roleAuthor->givePermissionTo('edit articles');
        $roleAuthor->givePermissionTo('show articles');
        $roleAuthor->givePermissionTo('delete articles');
        $roleAuthor->givePermissionTo('update articles');

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('publish articles');
        $roleAdmin->givePermissionTo('unpublish articles');

        // ALL PERMISSION
        $roleSuperAdmin = Role::create(['name' => 'super admin']);

    }
}
