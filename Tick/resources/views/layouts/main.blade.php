<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tick') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/e97029e132.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid row m-0 p-0">
        <div class="col-md-2 row vh-100 border-right shadow-sm p-0">
            <div class="col-lg-2 bg-dark d-flex align-items-end p-0">
                <div class="container w-50 mx-auto">
                    <a class="logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt logout-logo"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-lg-10 p-2 m-0">
                <div class="container w-100" style="height: 100px">
                    <div class="row h-100">
                        <div class="col-4 bg-dark rounded-left">
                            <p class="text-light">Level</p>
                        </div>
                        <div class="col-8 rounded-right bg-secondary">
                            <p class="text-light">Experience</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container mt-3">
                    <p class="font-weight-bold">Overview</p>
                    <a href="/home" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">Dashboard</span>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="container mt-3">
                    <p class="font-weight-bold">Planner</p>
                    <a href="{{ route('planner') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">All</span>
                        </div>
                    </a>
                    <a href="{{ route('planner-weekly') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">Weekly</span>
                        </div>
                    </a>
                    <a href="{{ route('planner-monthly') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">Monthly</span>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="container mt-3">
                    <p class="font-weight-bold">To-Do List</p>
                    <a href="{{ route('todolist') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">All</span>
                        </div>
                    </a>
                    <a href="{{ route('todolist-weekly') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">Weekly</span>
                        </div>
                    </a>
                    <a href="{{ route('todolist-monthly') }}" class="text-secondary text-decoration-none p-0">
                        <div class="container to-planner px-4 py-2 rounded shadow-sm">
                            <span class="align-middle">Monthly</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-10 ">
            @yield('content') <!--Insert Planner and To Do list View Here!-->
        </div>
    </div>
</body>
</html>