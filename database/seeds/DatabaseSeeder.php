<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('roles')->delete();

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Users',
            'slug' => 'users',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admins',
            'slug' => 'admins',
        ]);

        $this->command->info('Roles seeded!');
        DB::table('users')->delete();

        Sentinel::registerAndActivate([
            'email'    => 'user@user.com',
            'password' => 'sentineluser',
            'first_name' => 'UserFirstName',
            'last_name' => 'UserLastName',
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'admin@admin.com',
            'password' => 'sentineladmin',
            'first_name' => 'AdminFirstName',
            'last_name' => 'AdminLastName',
        ]);

        $this->command->info('Users seeded!');
        DB::table('role_users')->delete();

        $userUser = Sentinel::findByCredentials(['login' => 'user@user.com']);
        $adminUser = Sentinel::findByCredentials(['login' => 'admin@admin.com']);

        $userRole = Sentinel::findRoleByName('Users');
        $adminRole = Sentinel::findRoleByName('Admins');

        // Assign the roles to the users
        $userRole->users()->attach($userUser);
        $adminRole->users()->attach($adminUser);

        $this->command->info('Users assigned to roles seeded!');

        $this->command->info('All tables seeded!');

        Model::reguard();
    }
}
