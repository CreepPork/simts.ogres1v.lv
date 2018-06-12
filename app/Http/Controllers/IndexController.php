<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkStatus;

class IndexController extends Controller
{
    public function index()
    {
        $plannedWorks = WorkStatus::where('status', '=', 'Plānotie darbi')->with(['works' => function($query) {
            $query->limit(5);
        }])->get()->first();

        $currentWorks = WorkStatus::where('status', '=', 'Pašreizējie darbi')->with(['works' => function($query) {
            $query->limit(5);
        }])->get()->first();

        $completedWorks = WorkStatus::where('status', '=', 'Pabeigtie darbi')->with(['works' => function($query) {
            $query->limit(10);
        }])->get()->first();

        return view('pages.index', compact('plannedWorks', 'currentWorks', 'completedWorks'));
    }
}
