<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('model_has_roles')->delete();

        // Remove user
        Admin::where('name', 'SuperAdmin')->delete();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['guard_name' => 'admin', 'name' => 'dashboard']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit employee']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete employee']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create employee']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list employee']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit tag']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete tag']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create tag']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list tag']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit article']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete article']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create article']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list article']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit customer']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete customer']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create customer']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list customer']);
        Permission::create(['guard_name' => 'admin', 'name' => 'show customer']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit slider']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete slider']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create slider']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list slider']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit feedback']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete feedback']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create feedback']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list feedback']);
        Permission::create(['guard_name' => 'admin', 'name' => 'show feedback']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit voucher']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete voucher']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create voucher']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list voucher']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'edit curriculum']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete curriculum']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create curriculum']);
        Permission::create(['guard_name' => 'admin', 'name' => 'list curriculum']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'list request']);
        Permission::create(['guard_name' => 'admin', 'name' => 'confirm request']);
        Permission::create(['guard_name' => 'admin', 'name' => 'show request']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete request']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'list contract']);
        Permission::create(['guard_name' => 'admin', 'name' => 'confirm contract']);
        Permission::create(['guard_name' => 'admin', 'name' => 'show contract']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete contract']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'change password']);
        Permission::create(['guard_name' => 'admin', 'name' => 'change profile']);

        //
        Permission::create(['guard_name' => 'admin', 'name' => 'schedule all']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view schedule']);
        Permission::create(['guard_name' => 'admin', 'name' => 'confirm schedule admin']);

        Permission::create(['guard_name' => 'admin', 'name' => 'setting']);

        ////
        $role = Role::create(['guard_name' => 'admin', 'name' => 'personal_trainer'])
            ->givePermissionTo([
                'change password', 'change profile',
                'confirm schedule admin',
                'schedule all',
                'view schedule',
                'list customer', 'show customer',
            ]);

        $superAdminRole = Role::create(['guard_name' => 'admin', 'name' => 'super-admin'])
            ->givePermissionTo([
                'list employee', 'create employee', 'edit employee', 'delete employee',
                'list tag', 'create tag', 'edit tag', 'delete tag',
                'list article', 'create article', 'edit article', 'delete article',
                'list customer', 'create customer', 'edit customer', 'delete customer', 'show customer',
                'list slider', 'create slider', 'edit slider', 'delete slider',
                'list feedback', 'create feedback', 'edit feedback', 'delete feedback',
                'list voucher', 'create voucher', 'edit voucher', 'delete voucher',
                'list curriculum', 'create curriculum', 'edit curriculum', 'delete curriculum',
                'list request', 'confirm request', 'show request', 'delete request',
                'list contract', 'confirm contract', 'show contract', 'delete contract',
                'setting'

            ]);

        $admin = Admin::create([
            'name'          => 'SuperAdmin',
            'email'         => 'hugo210295@gmail.com',
            'password'      => Hash::make('password'),
            'phone'         => '0907426506',
            'email_verified_at' => \Carbon\Carbon::now(),
            'address'       => '',
            'avatar'       => '',
        ]);

        $admin = $admin->assignRole($superAdminRole);
    }
}
