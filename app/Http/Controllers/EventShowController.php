<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $event = Event::findOrFail($id);
        $savedEvent = $event->savedEvents()->where('user_id', auth()->id())->first();

        return view('eventsShow', compact('event', 'savedEvent'));
    }
}
