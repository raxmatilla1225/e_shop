<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statuses;
use App\Http\Controllers\Controller;
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
        $stats=Statuses::with('client')->get();
        return view('admin.stat.index', ['stats'=>$stats]);
    }

//public function user(): Factory|View|Application
//{
//    return view('admin.stat.users');
//}

    public function client(): Factory|View|Application
    {
        $stats=Statuses::all();
        return view('admin.stat.clients', ['stats'=>$stats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function show(Statuses $statuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuses $statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statuses $statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuses $statuses)
    {
        //
    }
}
