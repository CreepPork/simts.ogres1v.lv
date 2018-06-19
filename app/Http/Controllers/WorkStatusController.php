<?php

namespace App\Http\Controllers;

use App\WorkStatus;
use Illuminate\Http\Request;

class WorkStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = WorkStatus::all();

        return view('pages.workStatus.index', compact('statuses'));
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
        $request->validate([
            'status' => 'min:3|required|string|max:255'
        ]);

        WorkStatus::create([
            'status' => $request->status
        ]);

        return redirect('/workStatus/create')->with('success', 'Darba statuss pievienots.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function show(WorkStatus $workStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkStatus $workStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkStatus $workStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkStatus $workStatus)
    {
        //
    }
}
