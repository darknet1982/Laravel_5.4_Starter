<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new \Backpack\PermissionManager\app\Models\Permission([
            'name' => 'Edit Contact Form'
        ]);
        $permission->save();
        $permission = new \Backpack\PermissionManager\app\Models\Permission([
            'name' => 'View Form Submissions'
        ]);
        $permission->save();
        $permission = new \Backpack\PermissionManager\app\Models\Permission([
            'name' => 'Edit Homepage'
        ]);
        $permission->save();
        $permission = new \Backpack\PermissionManager\app\Models\Permission([
            'name' => 'Edit Users'
        ]);
        $permission->save();
        $permission = new \Backpack\PermissionManager\app\Models\Permission([
            'name' => 'Edit Permissions'
        ]);
        $permission->save();

        $role = new \Backpack\PermissionManager\app\Models\Role([
            'name' => 'Dev',
        ]);
        $role->save();
        $role->givePermissionTo([
            'Edit Homepage',
            'Edit Contact Form',
            'View Form Submissions',
            'Edit Users',
            'Edit Permissions'
        ]);

        $role = new \Backpack\PermissionManager\app\Models\Role([
            'name' => 'Admin',
        ]);
        $role->save();
        $role->givePermissionTo([
            'Edit Homepage',
            'Edit Contact Form',
            'View Form Submissions',
            'Edit Users',
        ]);

        $role = new \Backpack\PermissionManager\app\Models\Role([
            'name' => 'Editor',
        ]);
        $role->save();
        $role->givePermissionTo([
            'Edit Homepage',
            'Edit Contact Form',
            'View Form Submissions',
        ]);
    }
}
