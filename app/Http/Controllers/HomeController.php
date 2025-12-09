<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventBooking;

class HomeController extends Controller
{


    public function __construct()
    {
        $headerevents = Event::orderBy('title', 'desc')->get();

        view()->share('headerevents', $headerevents);
    }

    public function index()
    {
        $eventCategories = EventCategory::latest()->get();
        $event = Event::latest()->get();
        return view('index', compact('eventCategories', 'event'));
    }

    public function eventDetail($slug = null)
    {
        $eventData = Event::where('slug', $slug)->first();
        return view('event-detail', compact('eventData'));
    }


    public function eventBooking(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'tickets' => 'required|integer|min:1',
        ]);
        // Create a new EventBooking record
       EventBooking::create([
            'name' => $request->input('name'),
            'phone_code' => $request->input('phone_code'),
            'phone' => $request->input('phone'),
            'tickets' => $request->input('tickets'),
            'user_id' => auth()->check() ? auth()->id() : null,
            'event_id' => $request->input('event_id'),
        ]);

        return back()->with('success', 'Your booking has been submitted successfully!');
    }
}
