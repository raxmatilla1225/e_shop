<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $propertytype = PropertyType::all();
        return view('admin.propertytype.index', ['propertytype' => $propertytype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.propertytype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $propertytype = new PropertyType();
        $propertytype->properties = $request->get('properties');
        $propertytype->save();
        return redirect()->route('propertytype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  PropertyType $propertytype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(PropertyType $propertytype)
    {
        return view('admin.propertytype.show', ['propertytype' => $propertytype->load('child_properties')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PropertyType $propertytype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(PropertyType $propertytype)
    {
        return view('admin.propertytype.edit', ['propertytype' => $propertytype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PropertyType $propertytype
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PropertyType $propertytype)
    {
        $propertytype->update($request->only(['properties']));
        return redirect()->route('propertytype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PropertyType $propertytype
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PropertyType $propertytype)
    {
        $propertytype->delete();
        return redirect()->back();
    }
}
