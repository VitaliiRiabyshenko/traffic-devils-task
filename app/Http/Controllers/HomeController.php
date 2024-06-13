<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $statistics = User::withCount(['products'])
            ->where(function ($q) {
                if (auth()->user()->hasPermission('view_all_stats')) {
                }
                else if (auth()->user()->hasPermission('view_team_stats')) {
                    $q->where('team_lead_id', auth()->user()->id);
                }
                else if (auth()->user()->hasPermission('view_own_stats')) {
                    $q->where('id', auth()->user()->id);
                }
            })
            ->get();

        return view('home', compact('statistics'));
    }
}
