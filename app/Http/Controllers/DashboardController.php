<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Fetch all events
        $allEvents = Event::with('university')->count();
        $upcomingEvent = Event::with('university')->where('start_time', '>=', now())->orderBy('created_at', 'desc')->get()->count();
        $finishedEvent =    Event::with('university')->where('end_time', '<', now())->orderBy('created_at', 'desc')->get()->count();

        $labels = Event::selectRaw('MONTHNAME(start_time) as month')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->pluck('month')
            ->toArray();


        $allData = Event::selectRaw('Month(start_time) as month, Count(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count')
            ->toArray();


        $userData = Event::selectRaw('Month(start_time) as month, Count(*) as count')
            ->with('user')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->user()->id);
            })
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count')
            ->toArray();






        return view('dashboard', compact('allEvents', 'upcomingEvent', 'finishedEvent', 'allData', 'labels', 'userData'));
    }
}
//Event::selectRaw('Month(created_at) as month, COUNT(*) as count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();