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
        <a>
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text" data-toggle="modal" data-target="#add-list-modal-home"><i class="bi bi-plus-circle"></i> New List</div>
            </div>
        </a>
    </div>
    
    <div class="sidebar-tab">
        <p>Shop</p>
        <a href="{{ route('themes') }}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-brush"></i> Theme</div>
            </div>
        </a>
    </div>

    <div class="modal fade" id="add-list-modal-home" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>

                <form action="{{route('todolist-add.createListHome')}}" method="POST" role="form">
                    @csrf

                    <div class="modal-body">
                        <div class="add-list-form">
                            <label for="list_name">New List:</label>
                            <input type="text" name="list_name" placeholder="e.g. TodoList">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div class="add-list-submit">
                            <input class="btn" type="submit" value="Create">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('pageContent')
    @php
        echo '<script type="text/javascript">
              loadTheme('.$theme.');
            </script>';  
    @endphp
    <div id="todolist-title">
        <h3>My Lists</h3>
    </div>
    <div id="todolist-content">

        <div class="add-floating">
            <button class=" shadow"  data-toggle="modal" data-target="#add-list-modal"><i class="bi bi-plus"></i></button>
        </div>

        <div class="modal fade" id="add-list-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header"> </div>

                    <form action="{{route('todolist-add.createList')}}" method="POST" role="form">
                        @csrf

                        <div class="modal-body">
                            <div class="add-list-form">
                                <label for="list_name">New List:</label>
                                <input type="text" name="list_name" placeholder="e.g. TodoList">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div class="add-list-submit">
                                <input class="btn" type="submit" value="Create">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div id="todolist-page">

            @foreach ($lists as $list)

                <div class="listCard shadow">
                    <div class="listCard-heading">
                        <h5>{{$list->list_name}}</h5>
                        <a href="" data-toggle="modal" data-target="#rename-{{$list->task_id}}">
                            <i class="bi bi-pen"></i>
                        </a>
                        <a href="" data-toggle="modal" data-target="#delete-{{$list->task_id}}">
                            <i class="bi bi-trash2"></i>
                        </a>
                    </div>

                    <div class="listCard-body">

                        <form action="{{route('todolist-tasks',$list->list_id)}}" method="get">
                            @csrf
                            <a onclick="this.parentNode.submit();" class="open-list">
                                <div class="open-task-floating">
                                    <div class="shadow"><i class="bi bi-view-list"></i></div>
                                </div>
                            </a>
                        </form>
                        <button class="add-task"   data-toggle="modal" data-target="#{{$list->list_name}}{{$list->task_id}}">
                            <div class="add-task-floating">
                                <div class="shadow"><i class="bi bi-plus"></i></div>
                            </div>
                        </button>


                        <div id="tasklist">

                            @php
                                $task_num = 0;
                                foreach ($tasks as $task) {
                                    if ($task->task_id === $list->task_id)
                                        $task_num+=1;
                                }

                                if ($task_num==0) {
                                    echo "
                                    <div id='no-task'>
                                        <p>No Task</p>
                                    </div>
                                    ";
                                }
                            @endphp


                            @foreach ($tasks as $task)

                                @if ($task->task_id === $list->task_id)
                                    @if ($task->status === "done")
                                    <form action="{{ route('todolist-finishTask', $task->tasks_id)}}" method="POST">
                                        <div class="task-done">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <label for="">{{$task->task}}</label>
                                        </div>
                                    </form>

                                    @else
                                        <form action="{{ route('todolist-finishTask', $task->tasks_id)}}" method="post">
                                            @csrf
                                            <a onclick="this.parentNode.submit();">
                                                <div class="task">
                                                    <i class="bi bi-dash-circle"></i>
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    <label for="">{{$task->task}}</label>
                                                </div>
                                            </a>
                                        </form>
                                    @endif
                                @endif

                            @endforeach

                            <div class="tasklist-footer"></div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        @foreach ($lists as $list)
            <div class="modal fade add-task-modal" id="{{$list->list_name}}{{$list->task_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6>Add Task in "{{$list->list_name}}"</h6>
                        </div>

                            <form action="{{ route('todolist-add-task.createTask') }}" method="POST" role="form">
                                @csrf

                                <div class="modal-body">
                                    <div class="add-task-form">
                                        <label for="task">Task Name</label>
                                        <input type="text" name="task" placeholder="e.g. TodoList">
                                    </div>
                                    <div class="add-task-form">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" placeholder="e.g. Programming">
                                    </div>
                                    <div class="add-task-form">
                                        <label for="due_date">Due Date</label>
                                        <input type="date" name="due_date" placeholder="e.g. TodoList">
                                    </div>
                                    <div class="add-task-form">
                                        <label for="time">Time</label>
                                        <input type="time" name="time" placeholder="e.g. TodoList">
                                    </div>
                                    <div class="add-task-form">
                                        <label for="list_name">Task Type  :</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="task_type" id="inlineRadio1" value="Assignment">
                                                <label class="form-check-label" for="inlineRadio1"> Assignment</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="task_type" id="inlineRadio2" value="Project">
                                                <label class="form-check-label" for="inlineRadio2"> Project</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="task_id" value="{{$list->task_id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div class="add-task-submit">
                                        <input class="btn" type="submit" value="Add">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade add-task-modal" id="rename-{{$list->task_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="renameList" method="get" role="form">
                            @csrf

                            <div class="modal-body">
                                <div class="add-task-form">
                                    <label for="task">Rename to:</label>
                                    <input type="text" name="new_name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="task_id" value="{{$list->task_id}}">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div class="add-task-submit">
                                    <input class="btn" type="submit" value="Rename">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade add-task-modal" id="delete-{{$list->task_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                            <form action="deleteList" method="get" role="form">
                                @csrf

                                <div class="modal-body">
                                    <div class="add-task-form">
                                        <label for="task" class="w-100 font-weight-bold">Delete "{{$list->list_name}}" ?</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="task_id" value="{{$list->task_id}}">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div class="add-task-submit">
                                        <input class="btn" type="submit" value="Remove">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

