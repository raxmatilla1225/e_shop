<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Support\Facades\Http;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAuthorRequest $request)
    {
        $model = new Author();
        $model->name = $request->get('name');
        if ($model->save()) {
            return redirect()->route('authors.index')->with('success', 'Author created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Author $author)
    {
        return view('admin.authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author = $author->update($request->validated());
        if($author){
            return redirect()->route('authors.index')->with('success','Author updated successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        $status = $author->delete();
        if ($status) {
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        }
        return redirect()->back();
    }


    public function sendSms(){
       $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsInJvbGUiOiJ1c2VyIiwiZGF0YSI6eyJpZCI6NSwibmFtZSI6Ilx1MDQyN1x1MDQxZiBCZXN0IEludGVybmV0IFNvbHV0aW9uIiwiZW1haWwiOiJ0ZXN0QGVza2l6LnV6Iiwicm9sZSI6InVzZXIiLCJhcGlfdG9rZW4iOm51bGwsInN0YXR1cyI6ImFjdGl2ZSIsInNtc19hcGlfbG9naW4iOiJlc2tpejIiLCJzbXNfYXBpX3Bhc3N3b3JkIjoiZSQkayF6IiwidXpfcHJpY2UiOjUwLCJiYWxhbmNlIjozOTUwLCJpc192aXAiOjAsImhvc3QiOiJzZXJ2ZXIxIiwiY3JlYXRlZF9hdCI6bnVsbCwidXBkYXRlZF9hdCI6IjIwMjItMDUtMTdUMjE6MTU6MTIuMDAwMDAwWiJ9LCJpYXQiOjE2NTI4NTQ4MTcsImV4cCI6MTY1NTQ0NjgxN30.U9vNjVRUmy9-n8XukYi3Bsodoyrh6WDahIdn5ccsfGY'
        ])->post('https://notify.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => '998935156999',
            'message' => "786155" ,
            'from' => '4546',
            'callback_url' => 'http://0000.uz/test.php',
            'client_id' => '248877'
        ]);
       dd($response->body());
    }
}
