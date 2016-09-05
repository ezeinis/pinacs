<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Assign;
use App\ClassYear;
use App\HomeworkClassYear;
use App\LevelClass;
use App\Grade;
use App\Homework;

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
            'email'    => 'ezeinis11@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Dimitris',
            'last_name' => 'Parpounas',
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
            'email'    => 'ezeinis17@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Kostas',
            'last_name' => 'Zarkadis',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis18@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Panagiotis',
            'last_name' => 'Lontogiannhs',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'ezeinis19@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Nikos',
            'last_name' => 'Vandoros',
            'phone' => '96718318',
            'parent_to' => NULL,
        ]);

        Sentinel::registerAndActivate([
            'email'    => 'stathiszeinis@gmail.com',
            'password' => 'e21111991',
            'first_name' => 'Stathis',
            'last_name' => 'Zeinis',
            'phone' => '96718318',
            'parent_to' => 6,
        ]);

        $this->command->info('Users seeded!');
        DB::table('role_users')->delete();

        $userUser = Sentinel::findByCredentials(['login' => 'user@user.com']);
        $adminUser = Sentinel::findByCredentials(['login' => 'admin@admin.com']);
        $studentUser = Sentinel::findByCredentials(['login' => 'ezeinis13@gmail.com']);
        $studentUser2 = Sentinel::findByCredentials(['login' => 'ezeinis15@gmail.com']);
        $studentUser3 = Sentinel::findByCredentials(['login' => 'ezeinis16@gmail.com']);
        $studentUser4 = Sentinel::findByCredentials(['login' => 'ezeinis17@gmail.com']);
        $studentUser5 = Sentinel::findByCredentials(['login' => 'ezeinis18@gmail.com']);
        $studentUser6 = Sentinel::findByCredentials(['login' => 'ezeinis19@gmail.com']);
        $parentUser = Sentinel::findByCredentials(['login' => 'stathiszeinis@gmail.com']);
        $teacherUser = Sentinel::findByCredentials(['login' => 'ezeinis14@gmail.com']);
        $teacherUser2 = Sentinel::findByCredentials(['login' => 'ezeinis12@gmail.com']);
        $teacherUser3 = Sentinel::findByCredentials(['login' => 'ezeinis11@gmail.com']);

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
        $studentRole->users()->attach($studentUser4);
        $studentRole->users()->attach($studentUser5);
        $studentRole->users()->attach($studentUser6);
        $teacherRole->users()->attach($teacherUser);
        $teacherRole->users()->attach($teacherUser2);
        $teacherRole->users()->attach($teacherUser3);
        $parentRole->users()->attach($parentUser);

        $this->command->info('Users assigned to roles seeded!');

        $level_class = new LevelClass;
        $level_class->id=1;
        $level_class->name="Pro Junior";
        $level_class->parent=NULL;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=2;
        $level_class->name="Junior";
        $level_class->parent=NULL;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=3;
        $level_class->name="Pro Junior 1";
        $level_class->parent=1;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=4;
        $level_class->name="Pro Junior 2";
        $level_class->parent=1;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=5;
        $level_class->name="Junior 1";
        $level_class->parent=2;
        $level_class->save();
        $level_class = new LevelClass;
        $level_class->id=6;
        $level_class->name="Junior 2";
        $level_class->parent=2;
        $level_class->save();

        $this->command->info('level_class seeded');

        $class_year = new ClassYear;
        $class_year->id = 1;
        $class_year->level_class_id = 3;
        $class_year->school_year = "2015-2016";
        $class_year->starting = '2015-09-15';
        $class_year->ending = '2016-09-14';
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 2;
        $class_year->level_class_id = 3;
        $class_year->school_year = "2014-2015";
        $class_year->starting = '2014-09-15';
        $class_year->ending = '2015-09-14';
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 3;
        $class_year->level_class_id = 4;
        $class_year->school_year = "2015-2016";
        $class_year->starting = '2015-09-15';
        $class_year->ending = '2016-09-14';
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 4;
        $class_year->level_class_id = 4;
        $class_year->school_year = "2014-2015";
        $class_year->starting = '2014-09-15';
        $class_year->ending = '2015-09-14';
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 5;
        $class_year->level_class_id = 5;
        $class_year->school_year = "2015-2016";
        $class_year->starting = '2015-09-15';
        $class_year->ending = '2016-09-14';
        $class_year->save();
        $class_year = new ClassYear;
        $class_year->id = 6;
        $class_year->level_class_id = 6;
        $class_year->school_year = "2015-2016";
        $class_year->starting = '2015-09-15';
        $class_year->ending = '2016-09-14';
        $class_year->save();

        $this->command->info('class_year_seeded');

        $assign = new Assign;
        $assign->user_id=3;
        $assign->class_year_id=2;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=3;
        $assign->class_year_id=1;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=3;
        $assign->class_year_id=5;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=4;
        $assign->class_year_id=4;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=4;
        $assign->class_year_id=3;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=4;
        $assign->class_year_id=6;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=6;
        $assign->class_year_id=2;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=6;
        $assign->class_year_id=5;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=7;
        $assign->class_year_id=2;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=7;
        $assign->class_year_id=5;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=8;
        $assign->class_year_id=2;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=8;
        $assign->class_year_id=5;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=9;
        $assign->class_year_id=4;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=9;
        $assign->class_year_id=6;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=10;
        $assign->class_year_id=4;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=10;
        $assign->class_year_id=6;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=11;
        $assign->class_year_id=4;
        $assign->save();
        $assign = new Assign;
        $assign->user_id=11;
        $assign->class_year_id=6;
        $assign->save();

        $this->command->info('assigns seeded');

        $homework = new Homework;
        $homework->id = 1;
        $homework->user_id = 3;
        $homework->text = 'Revision for test cocksuckers';
        $homework->type = 'homework';
        $homework->save();
        $homework = new Homework;
        $homework->id = 2;
        $homework->user_id = 4;
        $homework->text = 'Revision for test cocksuckers 2';
        $homework->type = 'homework';
        $homework->save();
        $homework = new Homework;
        $homework->id = 3;
        $homework->user_id = 3;
        $homework->text = 'Revision for test cocksuckers new';
        $homework->type = 'homework';
        $homework->save();
        $homework = new Homework;
        $homework->id = 4;
        $homework->user_id = 4;
        $homework->text = 'Revision for test cocksuckers new 2';
        $homework->type = 'homework';
        $homework->save();

        $this->command->info('homeworks seeded');

        $h_c = new HomeworkClassYear;
        $h_c->id=1;
        $h_c->class_year_id=2;
        $h_c->homework_id=1;
        $h_c->start_date = '2015-01-13 00:00:00';
        $h_c->due_date = '2015-01-20 00:00:00';
        $h_c->state="active";
        $h_c->save();
        $h_c = new HomeworkClassYear;
        $h_c->id=2;
        $h_c->class_year_id=4;
        $h_c->homework_id=2;
        $h_c->start_date = '2015-01-13 00:00:00';
        $h_c->due_date = '2015-01-20 00:00:00';
        $h_c->state="active";
        $h_c->save();
        $h_c = new HomeworkClassYear;
        $h_c->id=3;
        $h_c->class_year_id=5;
        $h_c->homework_id=3;
        $h_c->start_date = '2016-01-13 00:00:00';
        $h_c->due_date = '2016-01-20 00:00:00';
        $h_c->state="active";
        $h_c->save();
        $h_c = new HomeworkClassYear;
        $h_c->id=4;
        $h_c->class_year_id=6;
        $h_c->homework_id=4;
        $h_c->start_date = '2016-01-13 00:00:00';
        $h_c->due_date = '2016-01-20 00:00:00';
        $h_c->state="active";
        $h_c->save();

        $this->command->info('homeworks classes years seeded');

        $grade = new Grade;
        $grade->id = 1;
        $grade->homework_id = 1;
        $grade->student_id = 6;
        $grade->teacher_id = 3;
        $grade->class_year_id = 2;
        $grade->grade=8;
        $grade->save();
        $grade = new Grade;
        $grade->id = 2;
        $grade->homework_id = 1;
        $grade->student_id = 7;
        $grade->teacher_id = 3;
        $grade->class_year_id = 2;
        $grade->grade=0;
        $grade->save();
        $grade = new Grade;
        $grade->id = 3;
        $grade->homework_id = 1;
        $grade->student_id = 8;
        $grade->teacher_id = 3;
        $grade->class_year_id = 2;
        $grade->grade=3;
        $grade->save();
        $grade = new Grade;
        $grade->id = 4;
        $grade->homework_id = 2;
        $grade->student_id = 9;
        $grade->teacher_id = 4;
        $grade->class_year_id = 4;
        $grade->grade=3;
        $grade->save();
        $grade = new Grade;
        $grade->id = 5;
        $grade->homework_id = 2;
        $grade->student_id = 10;
        $grade->teacher_id = 4;
        $grade->class_year_id = 4;
        $grade->grade=6;
        $grade->save();
        $grade = new Grade;
        $grade->id = 6;
        $grade->homework_id = 2;
        $grade->student_id = 11;
        $grade->teacher_id = 4;
        $grade->class_year_id = 4;
        $grade->grade=10;
        $grade->save();
        $grade = new Grade;
        $grade->id = 7;
        $grade->homework_id = 3;
        $grade->student_id = 6;
        $grade->teacher_id = 3;
        $grade->class_year_id = 5;
        $grade->grade=8;
        $grade->save();
        $grade = new Grade;
        $grade->id = 8;
        $grade->homework_id = 3;
        $grade->student_id = 7;
        $grade->teacher_id = 3;
        $grade->class_year_id = 5;
        $grade->grade=0;
        $grade->save();
        $grade = new Grade;
        $grade->id = 9;
        $grade->homework_id = 3;
        $grade->student_id = 8;
        $grade->teacher_id = 3;
        $grade->class_year_id = 5;
        $grade->grade=3;
        $grade->save();
        $grade = new Grade;
        $grade->id = 10;
        $grade->homework_id = 4;
        $grade->student_id = 9;
        $grade->teacher_id = 4;
        $grade->class_year_id = 6;
        $grade->grade=3;
        $grade->save();
        $grade = new Grade;
        $grade->id = 11;
        $grade->homework_id = 4;
        $grade->student_id = 10;
        $grade->teacher_id = 4;
        $grade->class_year_id = 6;
        $grade->grade=6;
        $grade->save();
        $grade = new Grade;
        $grade->id = 12;
        $grade->homework_id = 4;
        $grade->student_id = 11;
        $grade->teacher_id = 4;
        $grade->class_year_id = 6;
        $grade->grade=10;
        $grade->save();

        $this->command->info('grades seeded');

        $this->command->info('All tables seeded!');

        Model::reguard();
    }
}
