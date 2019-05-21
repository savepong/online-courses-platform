<?php
use Illuminate\Support\Facades\Auth;

function authorizeRoles($roles)
{
    /** Get user & role */
    if (Auth::check()) {
        $user = Auth::user();
    }else{
        return false;
    }

    /** Get controller & method */
    // $action = $request->route()->getActionName();
    // list($controller, $method) = explode('@', $action);
    // $controller = strtolower(str_replace(["App\\Http\\Controllers\\", "Controller"], "", $controller));
    // $permission = "{$method}-{$controller}";


    return $user->authorizeRoles($roles) || abort(401, 'This action is unauthorized.');
}

function hasRoles($roles)
{
    if (Auth::check()) {
        $user = Auth::user();
    }else{
        return false;
    }


    return $user->hasAnyRole($roles);
}

function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
    /** get current user */
    $currentUser = $request->user();

    /** get current action name */
    if($actionName){
        $currentActionName = $actionName;
    }else{
        $currentActionName = $request->route()->getActionName();
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\", "Controller"], "", $controller);
    
    $crudPermissionsMap = [
        // 'create' => ['create', 'store'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'restore', 'forceDestroy'],
        'read' => ['index', 'view','dashboard', 'courses', 'users', 'categories', 'promotions', 'sitemapGenerate'],
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view'],
    ];

    $classesMap = [
        'Admin' => 'admin',
        'Course' => 'course',
        'User' => 'user',
        'Category' => 'category',
        'Promotion' => 'promotion',
    ];

    foreach($crudPermissionsMap as $permission => $methods){
        /** if the currnet method exists in methods list, */

        /** we'll check the permission */
        if(in_array($method, $methods) && isset($classesMap[$controller])){
            $className = $classesMap[$controller];
            
            /** if the user has not permisson don't allow next request */
            if($className == 'admin'){

                $userRole = $currentUser->role()->first()->name;
                if($userRole != 'admin'){
                    return false;
                }

            }elseif($className == 'course' && in_array($method, ['edit', 'update', 'destroy', 'restore'])){
                $course = !is_null($id) ? \App\Course::find($id) : $request->route('course');

                /** if the current user has not update-others-course/delete-others-course permission*/
                /** make sure he/she only modify his/her own course*/
                if( $course && (!$currentUser->can('update-others-course') || !$currentUser->can('delete-others-course')) ){
                    if($course->author_id !== $currentUser->id){
                        return false;
                    }
                }
            }elseif($className == 'user' && in_array($method, ['edit', 'update', 'destroy', 'restore'])){
                $user_id = $request->route('user');
                if(!$currentUser->can('update-others-user') || !$currentUser->can('delete-others-user') ){
                    if($currentUser->id != $user_id){
                        return false;
                    }
                }
            }elseif( isset($currentUser) && !$currentUser->can("{$permission}-{$className}") && $permission != 'read' ){
                // echo "{$permission}-{$className}";
                // dd($currentUser->can("{$permission}-{$className}"));
                return false;
            }
            break;
        }
    }
    return true;
}

function isActive($routes, $print = 'active'){
    if (is_array($routes)) {
        foreach ($routes as $route) {
            if(Route::is($route)){
                return $print;
            }
        }

        return '';
    }

    return Route::is($routes) ? $print : '';
}