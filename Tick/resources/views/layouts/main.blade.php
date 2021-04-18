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
            <div class="col-lg-2 bg-dark d-flex align-items-end">
                <div class="container m-2 p-0">
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
                        <div class="col-8 rounded-right" style="background-color: rgb(87, 87, 87)">
                            <p class="text-light">Experience</p>
                        </div>
                    </div>
                </div>
                <hr>
                <a href="/planner" class="text-dark text-decoration-none ">
                    <div class="container to-planner pt-3 pb-1 rounded shadow-sm">
                        <h5><strong>Planner</strong></h5>
                    </div>
                </a>
                <a href="/todolist" class="text-dark text-decoration-none ">
                    <div class="container to-todolist pt-3 pb-1 rounded shadow-sm mt-2">
                        <h5><strong>To-Do List</strong></h5>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="col-md-10 ">
            @yield('content') <!--Insert Planner and To Do list View Here!-->
        </div>
    </div>
</body>
</html>