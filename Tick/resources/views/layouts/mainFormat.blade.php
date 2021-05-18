@extends('layouts.app2')

@section('content')

    <div id="dashboard">
        <div id="side">

            <div class="logout">
                <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <p><i class="bi bi-box-arrow-left"></i></p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

            <div class="to-profile">
                <a href="{{ route('profile') }}">
                    <p><i class="bi bi-person-circle"></i></p>
                </a>
            </div>
        </div>
        <main>
            <div id="sidebar" class="shadow rounded-right">
                <div id="sidebar-level">
                    <div class="level">
                        <div class="level-num">
                            <p>Level:</p>
                            <div>
                                <h2>1</h2>
                            </div>
                        </div>
                    </div>
                    <div class="experience">
                        <p>Experience Here</p>
                    </div>
                </div>
                <hr>
                <div id="sidebar-tabs">
                    @yield('sidebar')
                </div>
            </div>
            <div id="main">
                @yield('pageContent')
            </div>
        </main>
    </div>

@endsection


