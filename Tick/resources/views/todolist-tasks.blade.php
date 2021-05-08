@extends('layouts.mainFormat')

@section('sidebar')
    <div class="sidebar-tab">
        <p>Overview</p>
        <a href="{{ route('home') }}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-house"></i> Dashboard</div>
            </div>
        </a>
    </div>
    <div class="sidebar-tab">
        <p>To-Do List</p>
        <a href="{{ route('todolist') }}">
            <div class="tab active">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> All</div>
            </div>
        </a>
        <a href="{{ route('todolist-add') }}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-plus-circle"></i> New List</div>
            </div>
        </a>
    </div>
    <div class="sidebar-tab">
        <p>Planner</p>
        <a href="{{ route('planner') }}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> All</div>
            </div>
        </a>
        <a href="">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-calendar2-plus"></i> Add Plan</div>
            </div>
        </a>
    </div>
@endsection

@section('pageContent')
    <div id="todolist-tasks-title">
        <h3>To-Do List/List Name</h3>
        <a href="javascript:history.back()">
            <div class="back-btn">
                <i class="bi bi-backspace-fill"></i>
                <i class="bi bi-backspace"></i>
            </div>
        </a>
    </div>
    <div id="todolist-tasks-content">
        <div id="tasks">
            <div class="list-tasks">
                <div class="shadow">
                    list of tasks
                </div>
            </div>
            <div class="list-side">
                <div class="list-side-upper">
                    <div class="task-info">
                        <div class="shadow-sm">
                            task details
                        </div>
                    </div>
                    <div class="list-status">
                        <div class="shadow-sm">
                            list status
                        </div>
                    </div>
                </div>
                <div class="new-task">
                    <div class="shadow-sm">
                        add task
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

