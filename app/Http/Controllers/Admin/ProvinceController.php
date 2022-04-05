<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $provinces = Province::all();
        return view('admin.province.index',['provinces'=>$provinces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProvinceRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProvinceRequest $request)
    {
        $model = new Province();
        $model->name = $request->get('name');
        $model->province_id = $request->get('province_id');
        if($model->save()){
            return redirect()->route('provinces.index')->with('success','Province created successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Province $province)
    {
        return view('admin.province.show', ['province'=> $province]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Province $province)
    {
        return view('admin.province.edit', ['province' => $province]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProvinceRequest  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProvinceRequest $request, Province $province)
    {
        $user = $province->update($request->validated());
        if($province){
            return redirect()->route('provinces.index')->with('success','Province updated successfully');
        }
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Province $province)
    {
        $status =  $province->delete();
        if($status){
            return redirect()->route('provinces.index')->with('success','Province deleted successfully');
        }
        return redirect()->back();
    }
}
