<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'  => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@vcommerce.co.th',
                'password'  => bcrypt('secret')
            ],
            [
                'name'  => 'Editor User',
                'username' => 'editor',
                'email' => 'editor@vcommerce.co.th',
                'password'  => bcrypt('secret')
            ],
            [
                'name'  => 'Author User',
                'username' => 'author',
                'email' => 'author@vcommerce.co.th',
                'password'  => bcrypt('secret')
            ],
            [
                'name'  => 'Student User',
                'username' => 'student',
                'email' => 'student@vcommerce.co.th',
                'password'  => bcrypt('secret')
            ]
        ]);
    }
}
