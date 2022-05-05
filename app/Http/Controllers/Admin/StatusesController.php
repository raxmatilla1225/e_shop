<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Models\StatusesType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $stats = Status::all();
        return view('admin.stat.index', ['stats' => $stats]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = StatusesType::all();
        return \view('admin.stat.create', ['types' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
//        $status = Status::create([
//            'name' => $request->get('name'),
//            'statuses_type_id' => $request->get('statuses_type_id'),
//        ]);
        $status = new Status();
        $status->name = $request->get('name');
        $status->statuses_type_id=$request->get('statuses_type_id');
        $status->save();
        if ($status) {
            return redirect()->route('status.index')->with('succes', 'Status created Successfully');
        };
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Status $status
     * @return Application|Factory|View
     */
    public function edit(Status $status)
    {
        $type=StatusesType::all();
        return view('admin.stat.edit',['status'=>$status],['types'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Status $status)
    {
//        dd($request->all());
        $data = $request->validate([
           'name' => [
               'required'
           ]
        ]);

        $status->update($request->all());
        return redirect()->route('status.index')->with('succes','Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('succes', 'Status deleted successfully');
    }
}
