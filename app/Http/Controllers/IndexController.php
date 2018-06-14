<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Http\Request;
use App\WorkStatus;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plannedWorks = WorkStatus::where('status', '=', 'Plānotie darbi')->with(['works' => function ($query) {
            $query->limit(5);
        }])->get()->first();

        $currentWorks = WorkStatus::where('status', '=', 'Pašreizējie darbi')->with(['works' => function ($query) {
            $query->limit(5);
        }])->get()->first();

        $completedWorks = WorkStatus::where('status', '=', 'Pabeigtie darbi')->with(['works' => function ($query) {
            $query->limit(10);
        }])->get()->first();

        $involve = Index::where('section', '=', 'involve')->get()->first();

        if (isset($involve->image))
        {
            $involve->image = Storage::url($involve->image);
        }

        return view('pages.index', compact('plannedWorks', 'currentWorks', 'completedWorks', 'involve'));
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
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        abort(404);
    }
}
