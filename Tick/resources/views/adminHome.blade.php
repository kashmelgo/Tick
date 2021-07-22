@extends('layouts.adminFormat')

@section('sidebar')
    <div class="admin-sidebar-tab">
        <p>Overview</p>
        <a href="">
            <div class="tab active">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-house"></i> Dashboard</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Users</p>
        <a href="">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-people"></i> All Users</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>To-Do Lists</p>
        <a href="">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Planners</p>
        <a href="">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Themes</p>
        <a href="">
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
                        <p class="mainText">423</p>
                    </div>
                    <div class="dashboard-user-specific">
                        <p class="admin-labelText">Total Admin</p>
                        <p class="admin-mainText">123</p>
                        <p class="user-labelText">Total Students</p>
                        <p class="user-mainText">259</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="">View Users</a>
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
                        <p class="mainText">23</p>
                    </div>
                    <div class="dashboard-stats-specific">
                        <p class="user-labelText">Total Tasks</p>
                        <p class="user-mainText">3056</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="">View To-Do Lists</a>
                </div>
            </div>
        </div>
        
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-calendar3-week"></i>
                <i class="bi bi-calendar3 card-onhover"></i>
                <p>Planners</p>
            </div>
            <div class="dashboard-cards-body">
                <div class="dashboard-stats">
                    <div class="dashboard-stats-overall bg-dark">
                        <p class="labelText">Total Planners</p>
                        <p class="mainText">345</p>
                    </div>
                    <div class="dashboard-stats-specific">
                        <p class="user-labelText">Total Events</p>
                        <p class="user-mainText">9238</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="">View Planners</a>
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
                        <p class="mainText">7</p>
                    </div>
                </div>
                <div class="dashboard-button">
                    <a href="">View Themes</a>
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
                <div class="dashboard-lists-overall bg-danger">

                </div>
                <div class="dashboard-lists-specific bg-warning">
                    
                </div>
            </div>
            <div class="dashboard-lists-footer">
                <a href="">View Users</a>
            </div>
        </div>








        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-list-ul"></i>
                <i class="bi bi-list-check list-onhover"></i>
                <p>To-Do Lists</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-calendar3-week"></i>
                <i class="bi bi-calendar3 list-onhover"></i>
                <p>Planners</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-brightness-alt-high"></i>
                <i class="bi bi-brightness-high list-onhover"></i>
                <p>Themes</p>
            </div>
            <div class="dashboard-lists-body bg-dark">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
    </div>

@endsection


