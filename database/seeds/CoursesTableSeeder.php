<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('courses')->truncate();
        DB::table('courses')->insert([
            [
                'author_id' => '1',
                'title'     => 'lorem ipsum 1',
                'slug'      => 'lorem-ipsum-1',
                'excerpt'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem repellendus dolorem veniam nihil iure, voluptates, laborum ullam tempore distinctio ipsam incidunt exercitationem voluptate quasi quos fugiat unde. Ut, dolore?',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptatibus nisi laudantium nesciunt, alias quo, blanditiis assumenda doloremque esse cupiditate a magnam explicabo omnis optio veniam nobis dolorum odio excepturi?',
                'image'       => null,
                'category_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'author_id' => '2',
                'title'     => 'lorem ipsum 2',
                'slug'      => 'lorem-ipsum-2',
                'excerpt'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem repellendus dolorem veniam nihil iure, voluptates, laborum ullam tempore distinctio ipsam incidunt exercitationem voluptate quasi quos fugiat unde. Ut, dolore?',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptatibus nisi laudantium nesciunt, alias quo, blanditiis assumenda doloremque esse cupiditate a magnam explicabo omnis optio veniam nobis dolorum odio excepturi?',
                'image'       => null,
                'category_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'author_id' => '3',
                'title'     => 'lorem ipsum 3',
                'slug'      => 'lorem-ipsum-3',
                'excerpt'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem repellendus dolorem veniam nihil iure, voluptates, laborum ullam tempore distinctio ipsam incidunt exercitationem voluptate quasi quos fugiat unde. Ut, dolore?',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptatibus nisi laudantium nesciunt, alias quo, blanditiis assumenda doloremque esse cupiditate a magnam explicabo omnis optio veniam nobis dolorum odio excepturi?',
                'image'       => null,
                'category_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
