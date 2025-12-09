<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;

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
}
