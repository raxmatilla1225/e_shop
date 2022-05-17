<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', ['banner' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $banner = Banner::all();
        return view('admin.banner.create', ['banner' => $banner]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->title=$request->get('title');
        $banner->description=$request->get('description');
        $banner->price=$request->get('price');
        if ($request->file('image'))
        {
            $file = $request->file('image');
            $extention = date('YmdHi').$file->getClientOriginalName();
            $file->move('banner', $extention);
            $banner->image = $extention;
        }
        $banner->status = $request->get('status');
        $banner->save();
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Banner $banner
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', ['banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner $banner
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->title=$request->get('title');
        $banner->description=$request->get('description');
        $banner->price=$request->get('price');
        if ($request->file('image')){
            $des = $_SERVER['DOCUMENT_ROOT'].'/banner/'.$banner->image;
            unlink($des);
            $file = $request->file('image');
            $extention = date('YmdHi').$file->getClientOriginalName();
            $file->move('banner', $extention);
            $banner->image = $extention;
        }
        $banner->status=$request->get('status');
        $banner->save();
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        $des = $_SERVER['DOCUMENT_ROOT'].'/user/'.$banner->image;
        $status = $banner->delete();
        if ($status){
            unlink($des);
        }
        return redirect()->back();
    }
}

