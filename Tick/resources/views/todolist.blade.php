@extends('layouts.main')

@section('content')
<!--
//show all todolist
//when a certain todolist is clicked, it will redirect to another page containing all task inside that todolist
-->
    <div class="container-fluid p-5 text-center">
        <h1 class="h1 font-weight-bold">To Do List</h1>
        <a href= "{{route('todolist-add')}}"  class="btn btn-primary">
            <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <div class="col-md-6 container p-5 m-0 float-left">
        @foreach($lists as $list);
        <div id="tasklist" class="col-md-6 container p-5 m-0">
            <div class="row">
                <div class="col-md-6">
                    <h4 id="list-name"> {{$list->list_name}} </h4>
                </div>
                <div class="col-md-6">
                    <a href= "{{route('showaddTask', $list->task_id)}}"  class="btn btn-link">
                        <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a>
                </div>
                <div class="col-md-12 p-2 float-right">
                    @foreach($tasks as $task)
                        @if($task->task_id === $list->task_id)
                            @csrf
                            <p> {{$task->task}} </p>
                             <!-- Button trigger modal -->
                            <button id = "editTaskBtn" type="button" class="btn btn-primary" data-id="{{$task->tasks_id}}" data-mytask="{{$task->task}}" data-mysubject="{{$task->subject}}" data-mydue="{{$task->due_date}}" data-mytime="{{$task->time}}" data-mytasktype="{{$task->task_type}}" data-toggle="modal" data-target="#editTaskModal">
                               Edit
                            </button>
                            <form action="{{ route('todolist-deleteTask') }}" method="POST" role="form">
                                @csrf
                                <input type="hidden" id="tasks_id" name="tasks_id" value="{{$task->tasks_id}}">
                                <input class="btn btn-primary" type="submit" value="Delete">
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>


  <!-- Modal -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <form class="" method="POST" action="{{route('todolist-editTask')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><h5>Task</h5></label>
                            <input type="text" class="form-control-plaintext input-group-lg" name="task" id="task">
                        <div class="form-group">
                        <div class="form-group">
                            <label><h5>Subject</h5></label>
                            <input type="text" class="form-control-plaintext input-group-lg" name="subject" id="subject">
                        <div class="form-group">
                            <label><h5>Due Date</h5></label>
                            <input type="date" class="form-control-plaintext input-group-lg" id="due_date" name="due_date">
                        </div>
                        <div class="form-group">
                            <label><h5>Time</h5></label>
                            <input type="time" class="form-control-plaintext input-group-lg" name="time" id="time" value="{{old('time')}}">
                        </div>
                        <div class="form-group">
                            <label><h5>Task Type</h5></label> <br>
                            <label class="radio-inline"> Project <input type="radio" class="form-control-plaintext input-group-lg" name="task_type" id="task_type" value="project"> </label>
                            <label class="radio-inline"> Assignment <input type="radio" class="form-control-plaintext input-group-lg" name="task_type" id="task_type" value="assignment"> </label>
                        </div>
                        <input type="hidden" id="tasks_id" name="tasks_id">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
                </form>
            </div>

        </div>
    </div>
</div>




@endsection
