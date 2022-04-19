<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Http\Requests\StoreNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = NewsCategory::all();
        return view('admin.news_categories.index', ['news_c' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        $model = new NewsCategory();
        $model->name = $request->get('name');
        if ($model->save()) {
            return redirect()->route('newsCategory.index')->with('success', 'News category created successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(NewsCategory $newsCategory)
    {
        return view('admin.news_categories.show', ['newsCategory' => $newsCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(NewsCategory $newsCategory)
    {
        return view('admin.news_categories.edit', ['newsCategory' => $newsCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsCategoryRequest  $request
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $newsCategory = $newsCategory->update($request->validated());
        if($newsCategory){
            return redirect()->route('newsCategory.index')->with('success','News category updated successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NewsCategory $newsCategory)
    {
        $status = $newsCategory->delete();
        if ($status) {
            return redirect()->route('newsCategory.index')->with('success', 'News category deleted successfully');
        }
        return redirect()->back();

    }
}
