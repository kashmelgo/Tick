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
                
            </div>
        </div>
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-list-ul"></i>
                <i class="bi bi-list-check card-onhover"></i>
                <p>To-Do Lists</p>
            </div>
            <div class="dashboard-cards-body">
                
            </div>
        </div>
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-calendar3-week"></i>
                <i class="bi bi-calendar3 card-onhover"></i>
                <p>Planners</p>
            </div>
            <div class="dashboard-cards-body">
                
            </div>
        </div>
        <div class="dashboard-cards shadow">
            <div class="dashboard-cards-header shadow-sm">
                <i class="bi bi-brightness-alt-high"></i>
                <i class="bi bi-brightness-high card-onhover"></i>
                <p>Themes</p>
            </div>
            <div class="dashboard-cards-body">
                
            </div>
        </div>
    </div>
    <div id="admin-dashboard-listView">
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-person"></i>
                <i class="bi bi-people list-onhover"></i>
            </div>
            <div class="dashboard-lists-body">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-list-ul"></i>
                <i class="bi bi-list-check list-onhover"></i>
            </div>
            <div class="dashboard-lists-body">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-calendar3-week"></i>
                <i class="bi bi-calendar3 list-onhover"></i>
            </div>
            <div class="dashboard-lists-body">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
        <div class="dashboard-lists shadow">
            <div class="dashboard-lists-header">
                <i class="bi bi-brightness-alt-high"></i>
                <i class="bi bi-brightness-high list-onhover"></i>
            </div>
            <div class="dashboard-lists-body">
                
            </div>
            <div class="dashboard-lists-footer">
                
            </div>
        </div>
    </div>

@endsection


