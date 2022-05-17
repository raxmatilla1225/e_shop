<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',  ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = new Category();
       if($category->title_en){
           $category->title_en  = $request->get('title_en') ;
       }
        $category->title_ru = $request->get('title_ru');
        $category->title_uz = $request->get('title_uz');
        $category->slug = Str::slug($request->get('title_en'));
        $category->description_en = $request->get('description_en');
        $category->description_ru = $request->get('description_ru');
        $category->description_uz = $request->get('description_uz');
        $category->icon = $request->get('icon');
        $category->parent_id = $request->get('parent_id');
        $category->order = $request->get('order');
        $category->status = $request->get('status');
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/admin/categories';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $category->image = $postImage;
        }
        if($category->save()){
            return redirect()->route('categories.index')->with('success' , 'Category added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->title_en = $request->get('title_en');
        $category->title_ru = $request->get('title_ru');
        $category->title_uz = $request->get('title_uz');
        $category->slug = Str::slug($request->get('title_en'));
        $category->description_en = $request->get('description_en');
        $category->description_ru = $request->get('description_ru');
        $category->description_uz = $request->get('description_uz');
        $category->icon = $request->get('icon');
        $category->parent_id = $request->get('parent_id');
        $category->order = $request->get('order');
        $category->status = $request->get('status');
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/admin/categories';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $category->image = $postImage;
        }
        if($category->update()){
            return redirect()->route('categories.index')->with('success','Category updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $status = $category->delete();
        if($status){
            return redirect()->route('categories.index')->with('success','Category deleted successfully');
        }
        return redirect()->back();
    }
}
