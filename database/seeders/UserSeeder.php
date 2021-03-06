<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'super-admin',
            'admin',
            'investor',
            'entrepreneur'
        ]);

        // Password: password (for all users)
        $defaultUsers = collect([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@test.com',
                // 'mobile' => '9843613596',
                'role' => 'super-admin',
                'country_id' => 1,
            ],

            [
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                // 'mobile' => '9843613597',
                'role' => 'admin',
                'country_id' => 1,
            ],
            [
                'name' => 'Richard Roe',
                'email' => 'investor@test.com',
                // 'mobile' => '9843613598',
                'role' => 'investor',
                'country_id' => 1,
            ],
            [
                'name' => 'Cali Doe',
                'email' => 'ent@test.com',
                // 'mobile' => '98436135999',
                'role' => 'entrepreneur',
                'country_id' => 1,
            ],
        ]);

        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles->each(function ($role) {
            Role::firstOrCreate(['name' => $role]);
        });

        $defaultUsers->each(function ($user) {
            User::firstOrCreate([
                'name' => $user['name']
            ], [
                'email' => $user['email'],
                // 'mobile' => $user['mobile'],
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]);

            $newUser = User::where('email', $user['email'])->first();
            $newUser->assignRole($user['role']);
        });
    }
}
