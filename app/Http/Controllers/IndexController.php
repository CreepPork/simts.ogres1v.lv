<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Http\Request;
use App\WorkStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Event;

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
        $plannedWorks = WorkStatus::where('status', 'Plānotie darbi')->with(['works' => function ($query) {
            $query->orderBy('priority', 'desc')->limit(5);
        }])->get()->first();

        $currentWorks = WorkStatus::where('status', 'Pašreizējie darbi')->with(['works' => function ($query) {
            $query->orderBy('priority', 'desc')->limit(5);
        }])->get()->first();

        $completedWorks = WorkStatus::where('status', 'Pabeigtie darbi')->with(['works' => function ($query) {
            $query->orderBy('priority', 'desc')->limit(10);
        }])->get()->first();

        $involve = Index::where('section', 'involve')->get()->first();

        if (isset($involve->image))
        {
            if (Storage::disk('public')->exists($involve->image))
            {
                $involve->image = Storage::url($involve->image);
            }
            else
            {
                $involve->image = null;
            }
        }

        $events = Event::orderBy('event_at', 'asc')->get();

        foreach ($events as $event)
        {
            $event->image = Storage::url($event->image);
        }

        $presentation = Index::where('section', 'presentation')->get()->first();
        $regulation = Index::where('section', 'regulation')->get()->first();

        $presentationURL = isset($presentation->file) ? Storage::url($presentation->file) : '';
        $regulationURL = isset($regulation->file) ? Storage::url($regulation->file) : '';

        $workPresentation = [$presentation, $presentationURL];
        $workRegulation = [$regulation, $regulationURL];

        $parallax = Index::where('section', 'parallax')->get()->first();

        $parallaxURL = isset($parallax->image) ? Storage::url($parallax->image) : '../images/parallax.jpg';

        return view('pages.index', compact('plannedWorks', 'currentWorks', 'completedWorks', 'involve', 'events', 'workPresentation', 'workRegulation', 'parallaxURL'));
    }

    /**
     * Display the admin panel listing of all pages editable.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $indexes = Index::orderBy('section_title')->get();

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
        if ($index->image != null)
        {
            $imageURL = Storage::url($index->image);
        }

        $fileURL = null;
        if ($index->file != null)
        {
            $fileURL = Storage::url($index->file);
        }

        return view('pages.index.edit', compact('index', 'imageURL', 'fileURL'));
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
            'image' => 'nullable|file|image|max:10240',
            'file' => 'nullable|file|max:10240'
        ]);

        if ($request->hasFile('image'))
        {
            $request->image = $request->image->store('index', 'public');
        }
        else
        {
            $request->image = $index->image;
        }

        if ($request->hasFile('file'))
        {
            $request->file = $request->file->store('index', 'public');
        }
        else
        {
            $request->file = $index->file;
        }

        Index::where('id', $index->id)->update([
            'section' => $request->section,
            'section_title' => $request->section_title,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'file' => $request->file
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
            'image' => null
        ]);

        return Session::flash('success', 'Pievienotais attēls izdzēsts.');
    }

    /**
     * Removes attached file from the specified index.
     *
     * @param  \App\Index  $index
     * @return void
     */
    public function fileDestroy(Index $index)
    {
        Storage::disk('public')->delete($index->file);

        Index::where('id', $index->id)->update([
            'file' => null
        ]);

        return Session::flash('success', 'Pievienotais fails izdzēsts.');
    }
}
