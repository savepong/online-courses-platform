<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        /** clud course */
        $crudCourse = new Permission();
        $crudCourse->name = "crud-course";
        $crudCourse->save();

        $updateOthersCourse = new Permission();
        $updateOthersCourse->name = "update-others-course";
        $updateOthersCourse->save();

        $deleteOthersCourse = new Permission();
        $deleteOthersCourse->name = "delete-others-course";
        $deleteOthersCourse->save();

        /** clud category */
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        /** clud category */
        $crudPromotion = new Permission();
        $crudPromotion->name = "crud-promotion";
        $crudPromotion->save();

        /** clud user */
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        /** clud user */
        $viewCourse = new Permission();
        $viewCourse->name = "view-course";
        $viewCourse->save();

        /** attach roles permissions */
        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();
        $student = Role::whereName('student')->first();

        $admin->detachPermissions([$crudCourse, $updateOthersCourse, $deleteOthersCourse, $crudCategory, $crudPromotion, $crudUser]);
        $admin->attachPermissions([$crudCourse, $updateOthersCourse, $deleteOthersCourse, $crudCategory, $crudPromotion, $crudUser]);

        $editor->detachPermissions([$crudCourse, $updateOthersCourse, $deleteOthersCourse, $crudCategory]);
        $editor->attachPermissions([$crudCourse, $updateOthersCourse, $deleteOthersCourse, $crudCategory]);

        $author->detachPermissions([$crudCourse]);
        $author->attachPermissions([$crudCourse]);

        $student->detachPermissions([$viewCourse]);
        $student->attachPermissions([$viewCourse]);
    }
}
