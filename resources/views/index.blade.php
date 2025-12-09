<!-- header  -->
@extends('dashboard.layouts.main')
@section('content')
    <!-- hero section   -->
    <section class="hero-banner">
        <div class="container-fluid">
            <img src="{{ url('assets/images/banner-1.jpg') }}" alt="">
        </div>
    </section>

    <!-- icon-sec  -->

    <section class="icon-sec">
        <div class="container">
            <div class="row justify-content-center text-center g-4 category-row">

                <!-- Category Item -->

                @foreach ($eventCategories as $eventCat)
                    <div class="col-auto">
                        <div class="category-card">
                            <div class="icon-circle">
                                <i><img class="icon-sec-img" src="{{ url('uploads/' . $eventCat->image) }}"
                                        alt="{{ $eventCat->name }}"></i>
                                {{-- <i class="fa-fa{{$eventCat->image}}"></i> --}}
                            </div>
                            {{-- <span class="new-badge">New</span> --}}
                            <p class="category-title">{{ $eventCat->name }}</p>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>


    </section>


    <!-- browsing-events  -->
    <section class="browsing-events">
        <div class="container">

            <!-- Location Selector -->


            <!-- Tabs -->
            <ul class="nav nav-tabs custom-tabs mb-4">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-today">Today</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-weekend">This Weekend</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                @php
                    use Carbon\Carbon;

                    $todayEvents = $event->filter(function ($e) {
                        return Carbon::parse($e->date_time)->isToday();
                    });

                    $weekendEvents = $event->filter(function ($e) {
                        $date = Carbon::parse($e->date_time);
                        return $date->isSaturday() || $date->isSunday();
                    });
                @endphp

                <!-- All -->
                <div class="tab-pane fade show active" id="tab-all">
                    <div class="row g-4">
                        @foreach ($event as $events)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ url('event-detail/' . $events->slug) }}">
                                    <div class="event-card shadow-sm">
                                        <img src="{{ url('uploads/' . $events->image) }}" class="w-100">
                                        <div class="p-3">
                                            <h6 class="fw-bold">{{ $events->title }}</h6>
                                            <p class="text-muted small mb-1">
                                                {{ \Carbon\Carbon::parse($events->date_time)->format('D, M d · h:i A') }}
                                            </p>
                                            <p class="fw-semibold small">From £{{ $events->price }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- TODAY -->
                <div class="tab-pane fade" id="tab-today">
                    <div class="row g-4">
                        @forelse ($todayEvents as $events)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ url('event-detail/' . $events->slug) }}">
                                    <div class="event-card shadow-sm">
                                        <img src="{{ url('uploads/' . $events->image) }}" class="w-100">
                                        <div class="p-3">
                                            <h6 class="fw-bold">{{ $events->title }}</h6>
                                            <p class="text-muted small mb-1">
                                                {{ \Carbon\Carbon::parse($events->date_time)->format('D, M d · h:i A') }}
                                            </p>
                                            <p class="fw-semibold small">From £{{ $events->price }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-center">No events today</p>
                        @endforelse
                    </div>
                </div>


                <!-- THIS WEEKEND -->
                <div class="tab-pane fade" id="tab-weekend">
                    <div class="row g-4">
                        @forelse ($weekendEvents as $events)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ url('event-detail/' . $events->slug) }}">
                                    <div class="event-card shadow-sm">
                                        <img src="{{ url('uploads/' . $events->image) }}" class="w-100">
                                        <div class="p-3">
                                            <h6 class="fw-bold">{{ $events->title }}</h6>
                                            <p class="text-muted small mb-1">
                                                {{ \Carbon\Carbon::parse($events->date_time)->format('D, M d · h:i A') }}
                                            </p>
                                            <p class="fw-semibold small">From £{{ $events->price }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-center">No weekend events</p>
                        @endforelse
                    </div>
                </div>


            </div>

        </div>
    </section>


    <!-- top-destination  -->

    <section class="top-destination">
        <div class="container position-relative">

            <h3 class="mb-4 fw-bold">Top destinations in United Kingdom</h3>

            <!-- Custom Nav Arrows -->
            <div class="uk-nav">
                <button class="uk-prev"><i class="fa-solid fa-angle-left"></i></button>
                <button class="uk-next"><i class="fa-solid fa-angle-right"></i></button>
            </div>

            <div class="owl-carousel uk-slider">

                <a href="#" class="uk-card">
                    <div class="uk-img">
                        <img src="assets/images/destination-1.webp" class="img-fluid">
                    </div>
                    <div class="uk-name">London</div>
                </a>

                <a href="#" class="uk-card">
                    <div class="uk-img">
                        <img src="assets/images/destination-1.webp" class="img-fluid">
                    </div>
                    <div class="uk-name">Manchester</div>
                </a>

                <a href="#" class="uk-card">
                    <div class="uk-img">
                        <img src="assets/images/destination-1.webp" class="img-fluid">
                    </div>
                    <div class="uk-name">Birmingham</div>
                </a>

                <a href="#" class="uk-card">
                    <div class="uk-img">
                        <img src="assets/images/destination-1.webp" class="img-fluid">
                    </div>
                    <div class="uk-name">Bristol</div>
                </a>

            </div>

        </div>
    </section>

    <!-- popular-city  -->

    <section class="popular-city">
        <div class="container">



        </div>
        <div class="container mt-2">

            <h3 class="mt-4 fw-bold">Things to do around United Kingdom</h3>

            <div class="city-tags">
                @foreach ($event as $eventname)
                    <a href="{{ url('event-detail/' . $eventname->slug) }}" class="tag-item">{{ $eventname->title }} <i
                            class="bi bi-arrow-up-right"></i></a>
                @endforeach

            </div>

        </div>
    </section>
@endsection
