<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Http\Request;
use App\WorkStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        $imageURL = null;

        if ($index->image != null) {
            $imageURL = Storage::url($index->image);
        }

        return view('pages.index.edit', compact('index', 'imageURL'));
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

        if ($request->hasFile('image'))
        {
            $request->image = $request->image->store('index', 'public');
        }
        else
        {
            $request->image = $index->image;
        }

        Index::where('id', $index->id)->update([
            'section' => $request->section,
            'section_title' => $request->section_title,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image
        ]);

        return redirect('/index')->with('success', 'Galvenā lapa rediģēta!');
    }

    /**
     * Removes attached image from the specified index.
     *
     * @param  \App\Index  $index
     * @return void
     */
    public function imageDestroy(Index $index)
    {
        Storage::disk('public')->delete($index->image);

        Index::where('id', $index->id)->update([
            'image' => ''
        ]);

        return Session::flash('success', 'Pievienotais attēls izdzēsts.');
    }
}
