@extends('layouts.main')

@section('content')
    <div class="container-fluid p-5 text-center">
        <p>To Do List</p>
        <a href= "{{route('todolist-add')}}"  class="btn btn-primary">
            <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
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
