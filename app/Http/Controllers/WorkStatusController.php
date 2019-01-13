<?php

namespace App\Http\Controllers;

use App\WorkStatus;
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
     * @return void
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store()
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
     * @return void
     */
    public function edit()
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkStatus $workStatus
     * @return void
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(WorkStatus $workStatus)
    {
        $workStatus->delete();

        Session::flash('success', 'Darba statuss izdzēsts.');
    }
}
