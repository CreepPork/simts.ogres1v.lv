<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use App\WorkStatus;
use Illuminate\Support\Facades\Session;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = WorkStatus::with(['works' => function ($query) {
            $query->with('teacher')->orderBy('priority', 'desc');
        }])->get()->sortBy('status');

        return view('pages.work.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workStatuses = WorkStatus::all()->sortBy('status');
        $teachers = Teacher::all()->sortBy('last_name');

        return view('pages.work.create', compact('workStatuses', 'teachers'));
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
            'title' => 'required|max:255',
            'body' => 'required',

            'completed_at' => 'date|nullable|after:today',

            'teacher_id' => 'required',
            'work_status_id' => 'required',

            'image' => 'nullable|image|max:5000'
        ]);

        if ($request->hasFile('image'))
        {
            $request->image = $request->image->store('work', 'public');
        }

        Work::create([
            'title' => $request->title,
            'body' => $request->body,

            'completed_at' => isset($request->completed_at) ? Carbon::createFromFormat('Y-m-d H:i', $request->completed_at . ' 00:00') : null,

            'teacher_id' => $request->teacher_id,
            'work_status_id' => $request->work_status_id,

            'image' => $request->image
        ]);

        return redirect('/work/create')->with('success', 'Darbs pievienots.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        $work->imageUrl = Storage::url($work->image);

        return view('pages.work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $teachers = Teacher::all();
        $statuses = WorkStatus::all();

        $work->imageUrl = Storage::url($work->image);

        return view('pages.work.edit', compact('work', 'teachers', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',

            'completed_at' => 'date|nullable|after:today',

            'teacher_id' => 'required',
            'work_status_id' => 'required',

            'image' => 'nullable|image|max:5000'
        ]);

        if ($request->hasFile('image'))
        {
            Storage::disk('public')->delete($work->image);

            $request->image = $request->image->store('work', 'public');
        }
        else
        {
            $request->image = $work->image;
        }

        $work->update([
            'title' => $request->title,
            'body' => $request->body,

            'completed_at' => isset($request->completed_at) ? Carbon::createFromFormat('Y-m-d H:i', $request->completed_at . ' 00:00') : null,

            'teacher_id' => $request->teacher_id,
            'work_status_id' => $request->work_status_id,

            'image' => $request->image
        ]);

        return redirect('/work')->with('success', 'Darbs rediģēts.');
    }

    /**
     * Sort the specified resource by priority in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $data = $request->json();

        foreach ($data as $id => $priority)
        {
            Work::find($id)->update([
                'priority' => $priority
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return void
     */
    public function destroy(Work $work)
    {
        if ($work->image)
        {
            Storage::disk('public')->delete($work->image);
        }

        $work->delete();

        Session::flash('success', 'Darbs izdzēsts.');
    }

    /**
     * Remove the specified resource's image from storage.
     *
     * @param Work $work
     * @return \Illuminate\Http\Response
     */
    public function imageDestroy(Work $work)
    {
        Storage::disk('public')->delete($work->image);

        $work->update([
            'image' => null
        ]);

        return redirect('/work/' . $work->id . '/edit')->with('success', 'Darba attēls izdzēsts.');
    }
}
