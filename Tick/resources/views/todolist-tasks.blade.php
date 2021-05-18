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

        @foreach ($list as $list)
        <p>List Name : <span>{{$list->list_name}}</span></p>
        @endforeach
        
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
                <div class="list-of-tasks shadow">
                    <div class="list-of-tasks-title">
                        <p>Tasks</p>
                    </div>
                    <div class="list-of-tasks-content">
                        
                        @foreach ($tasks as $task)
                            <div class="task" onclick="test('task-info-{{$task->tasks_id}}')">

                                
                                @if ($task->status == "done")
                                    <div class="task-name done">
                                        <form action="" method="post">
                                            @csrf
                                            <a onclick="this.parentNode.submit();">
                                                <div>
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                            </a>
                                        </form>
                                        <label for="">{{$task->task}}</label>
                                    </div>
                                    <div class="task-status-done">
                                        <form action="">
                                            @csrf
                                            <a  onclick="this.parentNode.submit();"><i class="bi bi-trash2-fill"></i></a>

                                        </form>
                                    </div>
                                @else
                                    <div class="task-name unfinished">

                                        <form action="{{route('todolist-markAsDone',$task->tasks_id)}}" method="post">

                                            @csrf
                                            <a onclick="this.parentNode.submit();">
                                                <div>
                                                    <i class="bi bi-dash-circle"></i>
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                            </a>
                                        </form>
                                        <label for="">{{$task->task}}</label>
                                    </div>
                                    <div class="task-status-unfinished">
                                        <div>
                                            <form action="">
                                                @csrf

                                                <a onclick="this.parentNode.submit();"><i class="bi bi-trash2-fill"></i></a>

                                            </form>
                                        </div>
                                    </div>
                                @endif
                                


                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="list-side">
                <div class="list-side-upper">

                    <div class="list-status">
                        <div class="shadow">
                            list status
                        </div>
                    </div>
                    
                    @foreach ($tasks as $task)

                        <div class="task-info task-info-{{$task->tasks_id}}">
                            <div class="shadow">
                                <div class="task-info-title">
                                    <p>Task Name: <span>{{$task->task}}</span></p>
                                </div>
                                <div class="task-info-body">
                                    <div>
                                        <p>Subject: <span>{{$task->subject}}</span></p>
                                    </div>
                                    <div>
                                        <p>Task Type: <span>{{$task->task_type}}</span></p>
                                    </div>
                                    <div>
                                        <p>Due Date: <span>{{$task->due_date}}</span></p>
                                    </div>
                                    <div>
                                        <p>Time: <span>{{$task->time}}</span></p>
                                    </div>
                                </div>
                                <div class="task-info-footer">
                                    <div>
                                        <form action="">
                                            <a href="">
                                                <i class="bi bi-journal-arrow-up"></i> Update
                                            </a>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="">
                                            <a href="">
                                                <i class="bi bi-file-earmark-x"></i> Delete
                                            </a>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
                <div class="new-task">
                    <div class="shadow">
                        add task
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

