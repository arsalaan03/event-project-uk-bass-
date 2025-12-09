@extends('dashboard.layouts.main')
@section('content')
    <style>
        /* Modal Box */
        #ticketModal .modal-content {
            border-radius: 20px;
            border: none;
            padding: 0 !important;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.15);
        }

        /* Header */
        #ticketModal .modal-header {
            padding: 20px 25px;
            border-bottom: 0;
        }

        #ticketModal .modal-title {
            font-size: 1.4rem;
            font-weight: 700;
        }

        /* Body */
        #ticketModal .modal-body {
            padding: 25px 30px;
        }

        /* Form Inputs */
        #ticketModal .form-control {
            padding: 12px 16px;
            border-radius: 12px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            transition: 0.3s;
        }

        #ticketModal .form-control:focus {
            background: #fff;
            border-color: #ecb3a7;
            box-shadow: none;
        }

        /* Labels */
        #ticketModal label {
            font-size: 0.95rem;
            font-weight: 600;
        }

        /* Submit Button */
        #ticketModal .btn-primary {
            background: #ecb3a7 !important;
            border: none;
            padding: 12px 15px;
            font-size: 1.05rem;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.3s;
            color: #000;
        }

        #ticketModal .btn-primary:hover {
            background: #d9a197 !important;
        }

        /* Close Button */
        #ticketModal .btn-close {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>

    <section class="service-detail">
        <!-- EVENT BANNER -->
        @if (Session::has('success'))
            <div class="alert alert-success container">
                {{ Session::get('success') }}
            </div>

        @endif
        <div class="event-banner mb-4 container">
            <img src="{{ url('uploads/'.$eventData->image) }}" class="w-100 rounded">
        </div>

        <div class="container">

            <div class="row align-items-start">

                <!-- LEFT CONTENT -->
                <div class="col-lg-8">

                    <h2 class="fw-bold mb-2">{{ $eventData->title }}</h2>

                    <div class="d-flex align-items-center mb-3 text-muted small">
                        <i class="bi bi-geo-alt me-2"></i>
                        {{ $eventData->short_content }}
                    </div>

                    <div class="d-flex align-items-center mb-4 text-muted small">
                        <i class="bi bi-calendar-event me-2"></i>
                        @php
                            $start = \Carbon\Carbon::parse($eventData->date_time);
                            $end = $start->copy()->addHours(3)->addMinutes(30);
                        @endphp

                        {{ $start->format('M d') }} from {{ $start->format('g:ia') }} to {{ $end->format('g:ia') }}

                    </div>

                    <hr>

                    <h4 class="fw-bold mb-3">Overview</h4>
                    <p class="text-muted">
                        {{$eventData->overview}}
                    </p>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-lg-4">
                    <div class="card shadow-sm p-3 sticky-top" style="top:120px; z-index: 0;">
                        <h5 class="fw-bold mb-1">£ {{$eventData->price}}</h5>
                        <p class="small text-muted mb-3">{{ \Carbon\Carbon::parse($eventData->event_date_time)->format('M d, Y') }} </p>

                        <button class="get-ticket-btn" data-bs-toggle="modal" data-bs-target="#ticketModal">
                            Get Tickets
                        </button>

                    </div>
                </div>

            </div>

        </div>

        <div class="container my-5">

            <div class="row g-4 align-items-start">

                <!-- LEFT SIDE -->
                <div class="col-lg-6">

                    <h4 class="fw-bold mb-3">Location</h4>

                    <p class="fw-semibold mb-1">{{$eventData->location}}</p>


                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">How do you want to get there?</h6>

                    <div class="d-flex flex-column gap-2 location-links">

                        <a href="#" class="travel-link">
                            <i class="fa-solid fa-car-side"></i> Driving
                        </a>

                        <a href="#" class="travel-link">
                            <i class="fa-solid fa-bus"></i> Public Transport
                        </a>

                        <a href="#" class="travel-link">
                            <i class="fa-solid fa-bicycle"></i> Biking
                        </a>

                        <a href="#" class="travel-link">
                            <i class="fa-solid fa-person-walking"></i> Walking
                        </a>

                    </div>

                </div>

                <!-- RIGHT SIDE MAP -->
                <div class="col-lg-6">
                    <div class="map-box rounded overflow-hidden shadow-sm">
                        {{-- <iframe width="100%" height="350" style="border:0;" loading="lazy" allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.390446637333!2d75.812256!3d26.865580!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5c63c55!2sRajasthan%20Palace%20Hotel!5e0!3m2!1sen!2sin!4v1719988888888">
                        </iframe> --}}
                        {!! $eventData->map !!}
                    </div>
                </div>

            </div>

        </div>


        <!-- MODAL FORM -->
        <div class="modal fade" id="ticketModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">

                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Book Your Tickets</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('event.booking') }}">
                            @csrf

                            <label class="mb-1 fw-semibold">Your Name</label>
                            <input type="hidden" name="event_id" value="{{ $eventData->id }}">
                            {{-- <input type="hidden" name="user_id" value="{{ $eventData->user_id }}"> --}}


                            <input type="text" name="name" class="form-control mb-3" placeholder="Enter your name">
                        <span>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </span>

                            <label class="mb-1 fw-semibold">Mobile Number</label>

                            <div class="phone-group mb-3">
                                <select class="country-code" name="phone_code">
                                    <option value="+44">+44</option>

                                </select>

                                <input type="text" name="phone" class="phone-input" placeholder="Enter mobile">
                                <span>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </span>
                            </div>


                            <label class="mb-1 fw-semibold">Tickets</label>
                            <select class="form-control mb-3" name="tickets">
                                <option value="1">1 Ticket</option>
                                <option value="2">2 Tickets</option>
                                <option value="3">3 Tickets</option>
                                <option value="4">4 Tickets</option>
                                <option value="5">5 Tickets</option>
                            </select>
                            <span>
                                @error('tickets')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>

                            <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </section>
@endsection
