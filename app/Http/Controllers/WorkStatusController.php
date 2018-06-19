<?php

namespace App\Http\Controllers;

use App\WorkStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function show(WorkStatus $workStatus)
    {
        return view('pages.workStatus.show', ['status' => $workStatus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkStatus $workStatus)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkStatus  $workStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkStatus $workStatus)
    {
        $workStatus->delete();

        return Session::flash('success', 'Darba statuss izdzēsts.');
    }
}
