<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Jorong;
use App\Models\Letter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request): View
    {
        $applications = Application::where('jorong_id', auth()->user()->jorong_id)
                            ->orderBy('date', 'asc')
                            ->orderBy('id', 'desc')
                            ->limit(30)->with(['detailApplications' => function(Builder $query) {
                                $query->with('letter');
                            }])->get();
                            
        return view('dashboards.dashboard', compact('applications'));
    }
}
