<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Level;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        //Start Roles

        $faker = Factory::create();

        $role_admin = Role::create([
            'name' => 'Διαχειριστής',
            'slug' => 'admin',
        ]);

        $role_teacher = Role::create([
            'name' => 'Καθηγητής',
            'slug' => 'teacher',
        ]);

        $role_student = Role::create([
            'name' => 'Μαθητής',
            'slug' => 'student',
        ]);

        //End Roles


        //Start Admin Role

        $admin = User::create([
            'name' => 'admin',
            'password' => bcrypt('1234567'),
            'email' => 'admin@gmail.com',
            'role_id' => $role_admin->id,
            'slug' => $faker->md5,
        ]);

        $admin->admin()->create([
            'gender' => 'male',
        ]);

        //End Admin Role

        //Start Students

        $student1 = User::create([
            'name' => 'Ζήσης',
            'password' => bcrypt('1234567'),
            'email' => 'zisis@gmail.com',
            'role_id' => $role_student->id,
            'slug' => $faker->md5,
        ]);

        $student1->student()->create([
            'gender' => 'male',
        ]);


        $student2 = User::create([
            'name' => 'Μάριος',
            'password' => bcrypt('1234567'),
            'email' => 'marios@gmail.com',
            'role_id' => $role_student->id,
            'slug' => $faker->md5,
        ]);

        $student2->student()->create([
            'gender' => 'male',
        ]);


        $student3 = User::create([
            'name' => 'Μαρία',
            'password' => bcrypt('1234567'),
            'email' => 'maria@gmail.com',
            'role_id' => $role_student->id,
            'slug' => $faker->md5,
        ]);

        $student3->student()->create([
            'gender' => 'female',
        ]);


        $student4 = User::create([
            'name' => 'Κώστας',
            'password' => bcrypt('1234567'),
            'email' => 'kostas@gmail.com',
            'role_id' => $role_student->id,
            'slug' => $faker->md5,
        ]);

        $student4->student()->create([
            'gender' => 'male',
        ]);


        $student5 = User::create([
            'name' => 'Κάλλη',
            'password' => bcrypt('1234567'),
            'email' => 'kalli@gmail.com',
            'role_id' => $role_student->id,
            'slug' => $faker->md5,
        ]);

        $student5->student()->create([
            'gender' => 'female',
        ]);

        //End Students 

        //Start Teachers 

        $teacher1 = User::create([
            'name' => 'Δέσποινα',
            'password' => bcrypt('1234567'),
            'email' => 'despoina@gmail.com',
            'role_id' => $role_teacher->id,
            'slug' => $faker->md5,
        ]);

        $teacher1->teacher()->create([
            'gender' => 'female',
        ]);


        $teacher2 = User::create([
            'name' => 'Δημήτρης',
            'password' => bcrypt('1234567'),
            'email' => 'dimitris@gmail.com',
            'role_id' => $role_teacher->id,
            'slug' => $faker->md5,
        ]);

        $teacher2->teacher()->create([
            'gender' => 'male',
        ]);

        $teacher3 = User::create([
            'name' => 'Πάνος',
            'password' => bcrypt('1234567'),
            'email' => 'panos@gmail.com',
            'role_id' => $role_teacher->id,
            'slug' => $faker->md5,
        ]);

        $teacher3->teacher()->create([
            'gender' => 'male',
        ]);

        $teacher4 = User::create([
            'name' => 'Μπάμπης',
            'password' => bcrypt('1234567'),
            'email' => 'mpampis@gmail.com',
            'role_id' => $role_teacher->id,
            'slug' => $faker->md5,
        ]);

        $teacher4->teacher()->create([
            'gender' => 'male',
        ]);

        //End Teachers


        //Start Subject

        $subject1 = Subject::create([
            'subject_name' => 'Grammar',
            'subject_slug' => 'grammar',
        ]);

        $subject2 = Subject::create([
            'subject_name' => 'Vocabulary',
            'subject_slug' => 'vocabulary',
        ]);

        //End Subject

        //Start Levels

        $level1 = Level::create([
            'level_name' => 'A junior',
        ]);

        $level2 = Level::create([
            'level_name' => 'B junior'
        ]);

        $level3 = Level::create([
            'level_name' => 'A senior'
        ]);

        $level4 = Level::create([
            'level_name' => 'B senior'
        ]);

        $level5 = Level::create([
            'level_name' => 'C senior'
        ]);

        $level6 = Level::create([
            'level_name' => 'Pre Lower'
        ]);

        $level7 = Level::create([
            'level_name' => 'Lower'
        ]);

        $level8 = Level::create([
            'level_name' => 'Proficiency 1'
        ]);

        $level9 = Level::create([
            'level_name' => 'Proficiency 2'
        ]);

        //End Levels


        //Start Groups

        // $group1 = Group::create([
        //     'group_name' => 'A1',
        //     'group_slug' => 'a1',
        //     'teacher_id' => $teacher1->id,
        //     'level_id' => $level1->id,
        //     'subject_id' => $subject1->id,
        // ]);

        // $group1->students()->attach([
        //     $student1->id,
        // ]);

        // $group2 = Group::create([
        //     'group_name' => 'B2',
        //     'group_slug' => 'b2',
        //     'teacher_id' => $teacher2->id,
        //     'level_id' => $level5->id,
        //     'subject_id' => $subject2->id,
        // ]);

        // $group2->students()->attach([
        //     $student4->id,
        // ]);


        //End Groups
    }
}
