@extends('layouts.app2')

@section('content')

    <div id="dashboard">
        <div id="side">
            <div class="admin-logout">
                <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <p><i class="bi bi-box-arrow-left"></i></p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <main id="admin-sidebar">
            <div id="sidebar" class="shadow rounded-right">
                <div id="sidebar-level">
                    <p>TICK<span>.AdminView</span></p>
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


