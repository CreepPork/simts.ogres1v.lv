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
        $events = Event::all();

        return view('pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.index');
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

        Event::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'body' => $request->body,

            'image' => $request->image->store('event', 'public'),

            'event_at' => Carbon::createFromFormat('Y-m-d H:i', $request->event_at)
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
        return view('pages.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
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

            'image' => 'required|max:10240|file|image|dimensions:width=1024,height=512',

            'event_at' => 'required|date|after:now'
        ]);

        if ($request->hasFile('image'))
        {
            $request->image = $request->image->store('event', 'public');
        }
        else
        {
            $request->image = $event->image;
        }

        Event::find($event->id)->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'body' => $request->body,

            'image' => $request->image,

            'event_at' => Carbon::createFromFormat('Y-m-d H:i', $request->event_at)
        ]);

        return redirect('/event')->with('success', 'Pasākums rediģēts.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return Session::flash('success', 'Pasākums izdzēsts.');
    }

    /**
     * Replaces the specified resource's image from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function replaceImage(Request $request, Event $event)
    {
        if ($request->hasFile('image'))
        {
            $request->validate([
                'image' => 'required|max:10240|file|image'
            ]);

            Storage::disk('public')->delete($event->image);

            Event::find($event->id)->update([
                'image' => $request->image->store('event', 'public')
            ]);

            return Session::flash('success', 'Attēls nomainīts.');
        }
    }
}
