<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AddRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $perm = Permission::create(['guard_name' => 'admin', 'name' => 'view user']);

        $role1 = Role::where('name', 'super-admin')->first();
        $role1->givePermissionTo($perm);

        $role2 = Role::where('name', 'personal_trainer')->first();
        $role2->givePermissionTo($perm);
    }
}
