<?php

namespace App\Http\Controllers;

use App\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommendations = Recommendation::all();

        return view('pages.recommend.index', compact('recommendations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.recommend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'body' => 'required',
                'email' => 'nullable|required_without:telephone|email',
                'telephone' => 'nullable|required_without:email|max:12',
                'attachment' => 'nullable|max:2000'
            ]
        );

        if ($request->hasFile('attachment'))
        {
            $attachmentPath = $request->attachment->store('public/recommend');
        }

        $recommendation = new Recommendation;

        $recommendation->title = $request->title;
        $recommendation->body = $request->body;
        $recommendation->email = $request->email;
        $recommendation->telephone = $request->telephone;
        $recommendation->attachment = isset($attachmentPath) ? $attachmentPath : '';

        $recommendation->save();

        return redirect('/recommend/create')->with('success', 'Paldies par jūsu ieteikumu, noteikti ņemsim vērā!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recommendation = Recommendation::find($id);

        if ($recommendation == null)
            abort(404);

        $attachmentInfo = [];
        if ($recommendation->attachment != null)
        {
            $attachment = explode('/', $recommendation->attachment)[2];

            $attachmentMIME = Storage::mimeType($recommendation->attachment);

            $attachmentType = explode('/', $attachmentMIME)[0];

            $attachmentInfo = [$attachment, $attachmentType];
        }

        return view('pages.recommend.show', compact('recommendation', 'attachmentInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(501, 'Not implemented.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(501, 'Not implemented.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recommendation = Recommendation::find($id);

        $recommendation->delete();

        return Session::flash('success', 'Ieteikums izdzēsts.');
    }
}
