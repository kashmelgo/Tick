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
        <a href="">
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
        <p>To Do List</p>
        <a href= "{{route('todolist-add')}}"  class="btn btn-primary">
            <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <div class="card d-flex m-5 p-5 shadow-lg">
        <form class="col-md-12" action="{{ route('todolist-add-task.createTask') }}" method="POST" role="form">
            {{csrf_field()}}
            <div class="form-group">
                <label><h5>Task</h5></label>
                <input type="text" class="form-control-plaintext input-group-lg" name="task" id="" placeholder="Input task..." value="Input task">
            <div class="form-group">
            <div class="form-group">
                <label><h5>Subject</h5></label>
                <input type="text" class="form-control-plaintext input-group-lg" name="subject" id="" placeholder="Input subject..." value="Input subject">
            <div class="form-group">
                <label><h5>Due Date</h5></label>
                <input type="date" class="form-control-plaintext input-group-lg" id="due_date" name="due_date">
            </div>
            <div class="form-group">
                <label><h5>Time</h5></label>
                <input type="time" class="form-control-plaintext input-group-lg" name="time" id="" value="{{old('time')}}">
            </div>
            <div class="form-group">
                <label><h5>Task Type</h5></label> <br>
                <label class="radio-inline"> Project <input type="radio" class="form-control-plaintext input-group-lg" name="task_type" id="" value="project"> </label>
                <label class="radio-inline"> Assignment <input type="radio" class="form-control-plaintext input-group-lg" name="task_type" id="" value="assignment"> </label>
            </div>
            <input type="hidden" id="list_id" name="task_id" value="{{$task_id}}">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection

{{--

<div class="col-md-10 container p-5">
    <div id="tasklist" class="container p-5 float-left">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-4">
                <h2> Tasks </h2>
            </div>
            <div class="col-md-8">
                <a href="{{ route('todolist-add')}}">
                <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle float-right" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <a>
            </div>
            <div  class="d-flex p-5">
                <div>
                </div>
            </div>
        </div>
    </div>
    <div id="tasklist" class="container p-5">
        <div class="row">
            <h2> Add Task </h2>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div  class="d-flex p-5">
                <div>
                    <form class="col-md-12" action="{{ route('todolist-add.createTask') }}" method="POST" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><h5>Task</h5></label>
                            <input type="text" class="form-control-plaintext input-group-lg" name="task" id="" placeholder="Input task..." value="Input task">
                        <div class="form-group">
                        <div class="form-group">
                            <label><h5>Subject</h5></label>
                            <input type="text" class="form-control-plaintext input-group-lg" name="subject" id="" placeholder="Input subject..." value="Input subject">
                        <div class="form-group">
                            <label><h5>Due Date</h5></label>
                            <input type="date" class="form-control-plaintext input-group-lg" id="due_date" name="due_date">
                        </div>
                        <div class="form-group">
                            <label><h5>Time</h5></label>
                            <input type="time" class="form-control-plaintext input-group-lg" name="time" id="" value="{{old('time')}}">
                        </div>
                        <div class="form-group">
                            <label><h5>Task Type</h5></label> <br>
                            <label class="radio-inline"> Project <input type="radio" class="form-control-plaintext input-group-lg" name="tasktype" id="" value="project"> </label>
                            <label class="radio-inline"> Assignment <input type="radio" class="form-control-plaintext input-group-lg" name="tasktype" id="" value="assignment"> </label>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
