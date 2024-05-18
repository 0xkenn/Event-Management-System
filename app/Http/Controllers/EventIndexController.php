<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Faker\Core\DateTime;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class EventIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $currentTime = now();


        $events = Event::with('university')
            ->where('start_time', '<=', $currentTime)
            ->where('end_time', '>=', $currentTime)->get();

        // dd($events);
        return view('eventIndex', compact('events'));
    }
}
