<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        /** Create Admin role */
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        /** Create Editor role */
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        /** Create Author role */
        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

        /** Create Author role */
        $student = new Role();
        $student->name = "student";
        $student->display_name = "Student";
        $student->save();

        /** Attach the roles */
        /* Admin */
        $user1 = User::find(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        /* Editor */
        $user2 = User::find(2);
        $user2->detachRole($editor);
        $user2->attachRole($editor);

        /* Author */
        $user3 = User::find(3);
        $user3->detachRole($author);
        $user3->attachRole($author);

        /* Student */
        $user4 = User::find(4);
        $user4->detachRole($student);
        $user4->attachRole($student);
    }
}
