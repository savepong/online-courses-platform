<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    protected $limit = 10;

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        authorizeRoles(['admin', 'editor']);
        $category = new Category();

        return view("category.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryStoreRequest $request)
    {
        authorizeRoles(['admin', 'editor']);
        Category::create($request->all());

        return redirect(route('admin.categories'))->with("alert-success", "New category was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        authorizeRoles(['admin', 'editor']);
        $category = Category::findOrFail($id);
        
        return view("category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        authorizeRoles(['admin', 'editor']);

        Category::findOrFail($id)->update($request->all());

        return redirect(route('admin.categories'))->with("alert-success", "Category was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        authorizeRoles(['admin', 'editor']);

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect(route('admin.categories'))->with("alert-warning", "Category was deleted successfully!");
    }
}
