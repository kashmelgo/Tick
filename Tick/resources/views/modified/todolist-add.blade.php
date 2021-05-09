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
            <div class="tab">
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
    <div class="container-fluid p-5 text-center">
        <h3>To Do List</h3>
        <a href= "{{route('todolist-add')}}"  class="btn btn-primary">
            <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <div class="card d-flex m-5 p-5 shadow-lg">
        <form action="{{route('todolist-add.createList')}}" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label><h5>List Name</h5></label>
                <input type="text" class="form-control-plaintext input-group-lg" name="list_name" value="Input list name">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
