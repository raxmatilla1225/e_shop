<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusesType;
use Illuminate\Http\Request;

class StatusesTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=StatusesType::all();
        return view('admin.status_type.index',['st_type'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        StatusesType::create($request->all());
        return redirect()->route('types.index')->with('succes','Status Type created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusesType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(StatusesType $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusesType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusesType $type)
    {
        return view('admin.status_type.edit',['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusesType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusesType $type)
    {
        $model=$type->update($request->validate(['name'=>'required']));
        if($type){
            return redirect()->route('types.index')->with('succes','Status type updated successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusesType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusesType $type)
    {
        $type->delete();
        return redirect()->route('types.index')->with('succes', 'Status Type deleted succsefully');
    }
}
