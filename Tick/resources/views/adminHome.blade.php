@extends('layouts.adminFormat')

@section('sidebar')
    <div class="admin-sidebar-tab">
        <p>Overview</p>
        <a href="/home">
            <div class="tab active">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-house"></i> Dashboard</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Users</p>
        <a href="{{route('admin-users')}}">
            <div class="tab">
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
    <div id="admin-dashboard-views">
        <p>Dashboard</p>
        <i class="bi bi-list listview" onclick="viewtype(0)"></i>
        <i class="bi bi-view-list cardview" onclick="viewtype(1)"></i>
    </div>
    <div id="admin-dashboard-cardView">
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-person"></i>
                <i class="bi bi-people card-onhover"></i>
                <p>Users</p>
            </div>
            <div class="dashboard-cards-body">
                <div class="dashboard-stats">
                    <div class="dashboard-user-overall bg-dark">
                        <p class="labelText">Total Users</p>
                        <p class="mainText">{{$users}}</p>
                    </div>
                    <div class="dashboard-user-specific">
                        <p class="admin-labelText">Total Admin</p>
                        <p class="admin-mainText">{{$user_admin}}</p>
                        <p class="user-labelText">Total Students</p>
                        <p class="user-mainText">{{$user_student}}</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="admin-users">View Users</a>
                </div>
            </div>
        </div>

        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-list-ul"></i>
                <i class="bi bi-list-check card-onhover"></i>
                <p>To-Do Lists</p>
            </div>
            <div class="dashboard-cards-body">
                <div class="dashboard-stats">
                    <div class="dashboard-stats-overall bg-dark">
                        <p class="labelText">Total To-Do Lists</p>
                        <p class="mainText">{{$todolists}}</p>
                    </div>
                    <div class="dashboard-stats-specific">
                        <p class="user-labelText">Total Tasks</p>
                        <p class="user-mainText">{{$tasks}}</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="admin-todolists">View To-Do Lists</a>
                </div>
            </div>
        </div>
        
        
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-brightness-alt-high"></i>
                <i class="bi bi-brightness-high card-onhover"></i>
                <p>Themes</p>
            </div>
            <div class="dashboard-cards-body">
                <div class="dashboard-stats">
                    <div class="dashboard-theme-overall bg-dark">
                        <p class="labelText">Total Themes</p>
                        <p class="mainText">{{$themes}}</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="admin-themes">View Themes</a>
                </div>
            </div>
        </div>
    </div>


    <div id="admin-dashboard-listView">
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-person"></i>
                <i class="bi bi-people list-onhover"></i>
                <p>Users</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                <div class="dashboard-lists-overall bg-dark">
                    <p class="labelText">Total User</p>
                    <p class="mainText">{{$users}}</p>
                </div>
                <div class="dashboard-user-specific bg-dark">
                    <p class="adminText">Total Admin</p>
                    <p class="mainText">{{$user_admin}}</p>
                    <p class="studentText">Total Student</p>
                    <p class="mainText">{{$user_student}}</p>
                </div>
            </div>
            <div class="dashboard-lists-footer">
                <a href="admin-users">View Users</a>
            </div>
        </div>

        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-list-ul"></i>
                <i class="bi bi-list-check list-onhover"></i>
                <p>To-Do Lists</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                <div class="dashboard-lists-overall bg-dark">
                    <p class="labelText">Total To-Do List</p>
                    <p class="mainText">{{$todolists}}</p>
                </div>
                <div class="dashboard-lists-specific bg-dark">
                    <p class="labelText">Total Tasks</p>
                    <p class="mainText">{{$tasks}}</p>
                </div>
            </div>
            <div class="dashboard-lists-footer">
                <a href="admin-todolists">View To-Do Lists</a>
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-calendar3-week"></i>
                <i class="bi bi-calendar3 list-onhover"></i>
                <p>Planners</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                <div class="dashboard-lists-overall bg-dark">
                    <p class="labelText">Total Planner</p>
                    <p class="mainText">{{$planners}}</p>
                </div>
                <div class="dashboard-lists-specific bg-dark">
                    <p class="labelText">Total Events</p>
                    <p class="mainText">{{$plans}}</p>
                </div>
            </div>
            <div class="dashboard-lists-footer">
                <a href="admin-planners">View Planners</a>
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-brightness-alt-high"></i>
                <i class="bi bi-brightness-high list-onhover"></i>
                <p>Themes</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                <div class="dashboard-theme-overall bg-dark">
                    <p class="labelText">Total Themes</p>
                    <p class="mainText">{{$themes}}</p>
                </div>
            </div>
            <div class="dashboard-lists-footer">
                <a href="admin-themes">View Themes</a>
            </div>
        </div>
    </div>

@endsection


