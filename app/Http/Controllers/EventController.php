<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('event_at', 'asc')->get();

        return view('pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.create');
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
            'title' => 'required|max:255|string',
            'summary' => 'required|max:255|string',
            'body' => 'required|string',

            'image' => 'required|max:10240|file|image|dimensions:width=1024,height=512',

            'event_at' => 'required|date|after:now'
        ]);

        $event_at = $request->event_at;
        // Does not have seconds (2020-01-01T01:00)
        if (strlen($event_at) == 16)
        {
            $event_at = $event_at . ":00";
        }

        Event::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'body' => $request->body,

            'image' => $request->image->store('event', 'public'),

            'event_at' => Carbon::createFromFormat('Y-m-d\TH:i:s', $event_at)
        ]);

        return redirect('/event/create')->with('success', 'Pasākums pievienots.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $mainEvent = $event;

        $events = Event::orderBy('event_at', 'asc')->get();

        $mainEvent->image = Storage::url($mainEvent->image);

        return view('pages.event.show', compact('events', 'mainEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event->image = Storage::url($event->image);

        return view('pages.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'summary' => 'required|max:255|string',
            'body' => 'required|string',

            'image' => 'required|max:10240|image|dimensions:width=1024,height=512',

            'event_at' => 'required|date|after:now'
        ]);

        if ($request->hasFile('image'))
        {
            Storage::disk('public')->delete($event->image);

            $request->image = $request->image->store('event', 'public');
        }
        else
        {
            $request->image = $event->image;
        }

        $event_at = $request->event_at;
        // Does not have seconds (2020-01-01T01:00)
        if (strlen($event_at) == 16)
        {
            $event_at = $event_at . ":00";
        }

        $event->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'body' => $request->body,

            'image' => $request->image,

            'event_at' => Carbon::createFromFormat('Y-m-d\TH:i:s', $event_at)
        ]);

        return redirect('/event')->with('success', 'Pasākums rediģēts.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return void
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
        Storage::disk('public')->delete($event->image);

        $event->delete();

        Session::flash('success', 'Pasākums izdzēsts.');
    }
}
