<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Assign;
use App\ClassYear;
use App\LevelClass;

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

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Teachers',
            'slug' => 'teachers',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Parents',
            'slug' => 'parents',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Students',
            'slug' => 'students',
        ]);

        $this->command->info('Roles seeded!');
        DB::table('users')->delete();

        Sentinel::registerAndActivate([
            'email'    => 'user@user.com',
            'password' => 'sentineluser',
            'first_name' => 'UserFirstName',
            'last_name' => 'UserLastName',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'admin@admin.com',
            'password' => 'sentineladmin',
            'first_name' => 'AdminFirstName',
            'last_name' => 'AdminLastName',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis14@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Alexis',
            'last_name' => 'Nearxou',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis12@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Yiannis',
            'last_name' => 'Elpidis',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis13@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Efthimis',
            'last_name' => 'Zeinis',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis15@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Kostas',
            'last_name' => 'Lamo',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis16@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Stayros',
            'last_name' => 'Diolatzis',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'stathiszeinis@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Stathis',
            'last_name' => 'Zeinis',
            'phone' => '96718318',
            'parent_to' => 5,
        ]);

        $this->command->info('Users seeded!');
        DB::table('role_users')->delete();

        $userUser = Sentinel::findByCredentials(['login' => 'user@user.com']);
        $adminUser = Sentinel::findByCredentials(['login' => 'admin@admin.com']);
        $studentUser = Sentinel::findByCredentials(['login' => 'ezeinis13@gmail.com']);
        $studentUser2 = Sentinel::findByCredentials(['login' => 'ezeinis15@gmail.com']);
        $studentUser3 = Sentinel::findByCredentials(['login' => 'ezeinis16@gmail.com']);
        $parentUser = Sentinel::findByCredentials(['login' => 'stathiszeinis@gmail.com']);
        $teacherUser = Sentinel::findByCredentials(['login' => 'ezeinis14@gmail.com']);
        $teacherUser2 = Sentinel::findByCredentials(['login' => 'ezeinis12@gmail.com']);

        $userRole = Sentinel::findRoleByName('Users');
        $adminRole = Sentinel::findRoleByName('Admins');
        $studentRole = Sentinel::findRoleByName('Students');
        $teacherRole = Sentinel::findRoleByName('Teachers');
        $parentRole = Sentinel::findRoleByName('Parents');

        // Assign the roles to the users
        $userRole->users()->attach($userUser);
        $adminRole->users()->attach($adminUser);
        $studentRole->users()->attach($studentUser);
        $studentRole->users()->attach($studentUser2);
        $studentRole->users()->attach($studentUser3);
        $teacherRole->users()->attach($teacherUser);
        $teacherRole->users()->attach($teacherUser2);
        $parentRole->users()->attach($parentUser);

        $this->command->info('Users assigned to roles seeded!');

        $level_class = new LevelClass;
        $level_class->id=1;
        $level_class->name="Pro Junior";
        $level_class->level_class_id=NULL;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=2;
        $level_class->name="Junior";
        $level_class->level_class_id=NULL;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=3;
        $level_class->name="Pro Junior 1";
        $level_class->level_class_id=1;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=4;
        $level_class->name="Pro Junior 2";
        $level_class->level_class_id=1;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=5;
        $level_class->name="Junior 1";
        $level_class->level_class_id=2;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=6;
        $level_class->name="Junior 2";
        $level_class->level_class_id=2;
        $level_class->save();

        $this->command->info('level_class seeded');

        $class_year = new ClassYear;
        $class_year->id = 1;
        $class_year->level_class_id = 3;
        $class_year->school_year = "2015-2016";
        $class_year->current_year = 1;
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 2;
        $class_year->level_class_id = 4;
        $class_year->school_year = "2015-2016";
        $class_year->current_year = 1;
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 3;
        $class_year->level_class_id = 5;
        $class_year->school_year = "2015-2016";
        $class_year->current_year = 1;
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 4;
        $class_year->level_class_id = 6;
        $class_year->school_year = "2015-2016";
        $class_year->current_year = 1;
        $class_year->save();

        $this->command->info('class_year_seeded');

        $assign = new Assign;
        $assign->user_id=3;
        $assign->class_year_id=1;
        $assign->role="Teachers";
        $assign->save();
        $assign = new Assign;
        $assign->user_id=4;
        $assign->class_year_id=2;
        $assign->role="Teachers";
        $assign->save();
        $assign = new Assign;
        $assign->user_id=5;
        $assign->class_year_id=1;
        $assign->role="Students";
        $assign->save();
        $assign = new Assign;
        $assign->user_id=6;
        $assign->class_year_id=1;
        $assign->role="Students";
        $assign->save();
        $assign = new Assign;
        $assign->user_id=7;
        $assign->class_year_id=2;
        $assign->role="Students";
        $assign->save();

        $this->command->info('assigns seeded');

        $this->command->info('All tables seeded!');

        Model::reguard();
    }
}
