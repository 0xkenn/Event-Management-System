<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DateTime;
use DateTimeZone;
use Faker\Core\DateTime as CoreDateTime;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        $events = Event::with('university')->where('start_time', '>=', now())->orderBy('created_at', 'desc')->get();


        return view('welcome', compact('events'));
    }
}
