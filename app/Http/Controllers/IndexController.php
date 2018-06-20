<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Http\Request;
use App\WorkStatus;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * Display the main web page (/).
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
     * Display the admin panel listing of all pages editable.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $indexes = Index::all();

        return view('pages.index.list', compact('indexes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        return view('pages.index.show', compact('index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        return view('pages.index.edit', compact('index'));
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
        $request->validate([
            'section' => 'required|string|min:3|max:255',
            'section_title' => 'required|string|min:3|max:255',
            'title' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'image' => 'nullable|file|image|max:10240'
        ]);

        Index::where('id', $index->id)->update([
            'section' => $request->section,
            'section_title' => $request->section_title,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image
        ]);

        return redirect('/index')->with('success', 'Galvenā lapa rediģēta!');
    }
}
