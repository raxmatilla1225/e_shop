<?php

namespace App\Http\Controllers\Admin;

use App\Models\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('admin.warehouse.index',['warehouses'=>$warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //validate the input
        $request->validate([
            'name'=> 'required'
        ]);
        //create new Warehouse
        Warehouse::create($request->all());
        //redirect
        return redirect()->route('warehouse.index')->with('succes','Warehouse created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Warehouse $warehouse): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
    return view('admin.warehouse.show', ['warehouse'=>$warehouse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
    return view('admin.warehouse.edit', ['warehouse'=>$warehouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //Validate the input
        $request->validate([
            'name'=> 'required'
        ]);
        //update Warehouse
        $warehouse->update($request->all());
        //redirect
        return redirect()->route('warehouse.index')->with('succes','Warehouse updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Warehouse $warehouse)
    {
        // delete the warehouse
        $warehouse->delete();
        //redirect
        return redirect()->route('warehouse.index')->with('succes','Warehouse deleted successfully');
    }
}
