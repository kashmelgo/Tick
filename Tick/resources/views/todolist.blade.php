@extends('layouts.main')

@section('content') 
<!--
//show all todolist
//when a certain todolist is clicked, it will redirect to another page containing all task inside that todolist
-->
    <div class="container-fluid p-5 text-center">
        <p>To Do List</p>
        <a href= "{{route('todolist-add')}}"  class="btn btn-primary">
            <svg id ="plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <div class="col-md-10 container p-5 float-left">
        @forelse($lists as $list);
        <div id="tasklist" class="container p-5 m-0">
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
                    @foreach($tasks as $task)
                        @if($task->task_id === $list->task_id)
                            @csrf
                            <a href=""></a>
                            <form action="{{ route('todolist-deleteTask') }}" method="POST" role="form">
                                @csrf
                                <input type="hidden" id="tasks_id" name="tasks_id" value="{{$task->tasks_id}}">
                                <input class="btn btn-primary" type="submit" value="Delete">
                            </form>
                        @enddif
                    @endforeach
                </div>
            </div>
        </div>
        @empty
        <h1> No lists found, add a list! </h1>
        @endforelse
    </div>
    {{-- <div class="col-md-10 container p-5">
        <div id="tasklist" class="container p-5 float-left">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-md-4">
                    @forelse ($lists as $list)
                    <h2> {{$list->list_name}} </h2>
                    @empty
                    <h5> No lists </h5>
                    @endforelse
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
    </div>
 --}}


@endsection
