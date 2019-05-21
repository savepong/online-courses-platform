<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        $facebook = new Tag();
        $facebook->name = "Facebook";
        $facebook->slug = "facebook";
        $facebook->save();

        $line = new Tag();
        $line->name = "Line";
        $line->slug = "line";
        $line->save();
    }
}
