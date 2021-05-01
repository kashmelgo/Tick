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
    <script src="{{ asset('js/script.js') }}" defer></script>
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
        <div class="col-md-2 row vh-100 border-right shadow p-0 bg-light">
            <div class="col-lg-2 bg-dark d-flex align-items-end p-0">
                <div class="container d-flex flex-column m-0 p-0">
                    <div class="container w-50 mx-auto my-2">
                        <a href="{{ route('profile') }}">
                            <i class="far fa-user-circle profile-button"></i>
                        </a>
                    </div>
                    <div class="container w-50 mx-auto my-1">
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
                    <a href="{{ route('todolist')}}" class="text-secondary text-decoration-none p-0">
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
        <div class="col-md-10 pl-5 ml-2">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>


        $('#editTaskModal').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget)
        var task = $(event.relatedTarget).data('mytask')
        var subject = button.data('mysubject')
        var due_date = button.data('mydue')
        var time = button.data('mytime')
        var task_type = button.data('mytasktype')
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #task').val(task);
        modal.find('.modal-body #subject').val(subject);
        modal.find('.modal-body #due_date').val(due_date);
        modal.find('.modal-body #time').val(time);
        modal.find('.modal-body #task_type').val(task_type);
        modal.find('.modal-body #tasks_id').val(id);
        })
    </script>

</body>
</html>

