<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/logo/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/aos.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/webfonts') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- IcoMoon Icons CDN -->
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/4c9f2e3d8a/UntitledProject/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .trending-box {
            position: absolute;
            background: #fff;
            width: 100%;
            max-width: 350px;
            padding: 15px;
            border-radius: 12px;
            top: 100%;
            z-index: 1000;
        }
    </style>

</head>


<body>
    <header>

        <div id="myHeader" class="">
            <div class="container">
                <div class="headermn">
                    <nav class="navbar navbar-expand-lg p-0 align-items-center gap-3">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ url('assets/images/logo/logo.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="menu-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <!-- search-baar  -->
                        <div class="search-wrapper position-relative d-flex align-items-center shadow-sm">

                            <!-- Back Icon -->
                            <i class="fa-solid fa-arrow-left back-icon"></i>

                            <!-- Search Input -->
                            <input type="text" id="searchInput" class="form-control search-input"
                                placeholder="Search events" autocomplete="off">

                            <!-- Search Icon -->
                            <button class="btn search-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <!-- Suggestions Box -->
                            <div id="suggestionBox" class="list-group position-absolute w-100 d-none"
                                style="top:100%; z-index:999;"></div>
                        </div>

                        <!-- Trending Dropdown -->
                        <div id="trendingBox" class="trending-box shadow d-none">
                            <h6 class="fw-bold mb-3">Trending Searches</h6>
                            <ul class="list-unstyled">
                                @foreach ($headerevents->take(5) as $event)
                                    <li data-search="{{ $event->title }}">
                                        <i class="fa-solid fa-chart-line trend-icon"></i>
                                        {{ $event->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>




                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                                    <img src="{{ url('assets/images/logo/logo.png') }}" alt="">
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body align-items-center">
                                <ul class="navbar-nav flex-grow-1 justify-content-end">

                                    @if (Auth::user()->name)
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                Welcome, {{ Auth::user()->name }}
                                            </a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-flex"
                                            role="search">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Logout</button>
                                        </form>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                                Login
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                                data-bs-target="#signupModal">
                                                Sign Up
                                            </a>
                                        </li>
                                    @endif


                                </ul>





                            </div>
                            <div>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>

    <script>
        const events = @json($headerevents);
    </script>

    <script>
        const searchInput = document.getElementById('searchInput');
        const suggestionBox = document.getElementById('suggestionBox');
        const trendingBox = document.getElementById('trendingBox');

        // Show trending on focus
        searchInput.addEventListener('focus', function() {
            if (!this.value) {
                trendingBox.classList.remove('d-none');
                suggestionBox.classList.add('d-none');
            }
        });

        // Live typing search
        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase().trim();
            suggestionBox.innerHTML = '';

            if (value.length === 0) {
                suggestionBox.classList.add('d-none');
                trendingBox.classList.remove('d-none');
                return;
            }

            trendingBox.classList.add('d-none');

            const filtered = events.filter(event =>
                event.title.toLowerCase().includes(value)
            );

            if (filtered.length === 0) {
                suggestionBox.innerHTML = `<div class="list-group-item text-muted">No results found</div>`;
            } else {
                filtered.slice(0, 6).forEach(event => {
                    suggestionBox.innerHTML += `
                    <a href="/event-detail/${event.slug}" class="list-group-item list-group-item-action">
                        ${event.title}
                    </a>
                `;
                });
            }

            suggestionBox.classList.remove('d-none');
        });

        // Clicking trending suggestion
        document.querySelectorAll('#trendingBox li').forEach(item => {
            item.addEventListener('click', function() {
                searchInput.value = this.dataset.search;
                searchInput.dispatchEvent(new Event('input'));
            });
        });

        // Hide on outside click
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) &&
                !suggestionBox.contains(e.target) &&
                !trendingBox.contains(e.target)) {

                suggestionBox.classList.add('d-none');
                trendingBox.classList.add('d-none');
            }
        });
    </script>
