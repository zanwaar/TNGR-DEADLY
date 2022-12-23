<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $default_user = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin web',
            ], $default_user));
            $user = User::create(array_merge([
                'email' => 'user@gmail.com',
                'name' => 'user',
            ], $default_user));

            $roleuser = Role::create(['name' => 'user']);
            $roleAdmin = Role::create(['name' => 'admin']);

            Permission::create(['name' => 'admin']);
            Permission::create(['name' => 'user']);

            $roleAdmin->givePermissionTo('admin');
            $roleuser->givePermissionTo('user');


            $user->assignRole('user');
            $admin->assignRole('admin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
