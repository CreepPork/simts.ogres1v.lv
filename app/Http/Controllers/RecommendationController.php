<?php

namespace App\Http\Controllers;

use App\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'email' => 'required_without:telephone|email',
            'telephone' => 'required_without:email|max:12'
        ]);

        $recommendation = new Recommendation;

        $recommendation->title = $request->title;
        $recommendation->body = $request->body;
        $recommendation->email = $request->email;
        $recommendation->telephone = $request->telephone;

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

        return view('pages.recommend.show', compact('recommendation'));
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
