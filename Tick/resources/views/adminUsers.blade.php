@extends('layouts.adminFormat')

@section('sidebar')
    <div class="admin-sidebar-tab">
        <p>Overview</p>
        <a href="/home">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-house"></i> Dashboard</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Users</p>
        <a href="{{route('admin-users')}}">
            <div class="tab active">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-people"></i> All Users</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>To-Do Lists</p>
        <a href="{{route('admin-todolists')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Planners</p>
        <a href="{{route('admin-planners')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Themes</p>
        <a href="{{route('admin-themes')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-brush"></i> View Themes</div>
            </div>
        </a>
    </div>

@endsection

@section('pageContent')
    <div id="admin-user-nav">
        <p>All User</p>
        <div class="user-buttons user-all" onclick="userFilter(0)">
            <i class="bi bi-people"></i>All
        </div>
        <div class="user-buttons user-admin" onclick="userFilter(1)">
            <i class="bi bi-person"></i>Admin
        </div>
        <div class="user-buttons user-student" onclick="userFilter(2)">
            <i class="bi bi-person-badge"></i>Student
        </div>
    </div>

    <div id="admin-user-view">
        <div class="add-floating shadow">
            <button><i class="bi bi-plus"></i></button>
        </div>
        <div class="user-instance shadow">
            asd
        </div>
        <div class="user-instance shadow">
            asd
        </div>
        <div class="user-instance shadow">
            asd
        </div>
        <div class="user-instance shadow">
            asd
        </div>
        <div class="user-instance shadow">
            asd
        </div>

    </div>
    
@endsection


