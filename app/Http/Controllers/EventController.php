<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\University;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View as ViewView;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $events = Event::where('user_id', Auth::id())->with('venue')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $universities = University::all();
        return view('events.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {

        if ($request->hasFile('image')) {

            $data = $request->validated();
            $data['user_id'] = Auth::id();
            $data['image'] = $request->file('image')->store('images', 'public');
            Event::create($data);
            return redirect()->route('events.index');
        } else {
            return redirect()->back()->withErrors('Error creating resource');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $universities = University::all();
        return view('events.edit', compact('universities', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                Storage::delete($event->image);
                $data['image'] = $request->file('image')->store('images', 'public');
            }


            $event->update($data);
            return to_route('events.index');
        } catch (Exception $e) {
            return to_route('events.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        Storage::delete($event->image);
        $event->delete();
        return to_route('events.index');
    }
}
