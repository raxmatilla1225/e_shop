<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', ['news_s' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $categories = NewsCategory::all();
        $authors = Author::all();
        return view('admin.news.create', ['categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreNewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(StoreNewsRequest $request)
    {
        $model = new News();
        $model->title = $request->get('title');
        $model->description = $request->get('description');
        $model->news_category_id = $request->get('category');
        $model->author_id = $request->get('author');
        $model->views_count = $request->get('view_count');
        $model->status = $request->get('status');
        $model->meta_keys = $request->get('meta_keys');
        $model->meta_description = $request->get('meta_description');

        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/admin/news';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $model->image_url = $postImage;
        }
        if ($model->save()) {
            return redirect()->route('news.index')->with('success', 'News created successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(News $news)
    {
        return view('admin.news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $authors = Author::all();
        return view('admin.news.edit', ['news' => $news, 'categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateNewsRequest $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news = $news->update($request->all());
        if($news){
            return redirect()->route('news.index')->with('success','News updated successfully');
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        $status = $news->delete();
        if ($status) {
            return redirect()->route('news.index')->with('success', 'News deleted successfully');
        }
        return redirect()->back();
    }
}
