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
    <div id="todolist-tasks-title">

        @foreach ($list as $list)
        <p>List Name : <span>{{$list->list_name}}</span></p>
        @endforeach

        <a href="{{ route('todolist') }}">
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
                                @endif



                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="list-side">
                <div class="list-side-upper">

                    <div class="list-status">
                        <?php
                            $taskCount = 0;
                            $doneCount = 0;
                            $unfinishedCount = 0;

                            $projectCount = 0;
                            $assignmentCount = 0;
                            $projectDoneCount = 0;
                            $assignmentDoneCount = 0;
                            $projectUnfinishedCount = 0;
                            $assignmentUnfinishedCount = 0;

                            $isEmpty = true;
                            $projectIsEmpty = true;
                            $assignmentIsEmpty = true;

                            $progress = 0;
                            $projectProgress = 0;
                            $assignmentProgress = 0;

                            foreach ($tasks as $task) {
                                $taskCount++;
                                $isEmpty = false;
                                if ($task->task_type == "Project") {
                                    $projectIsEmpty = false;
                                    $projectCount++;
                                    if ($task->status == "done") {
                                        $doneCount++;
                                        $projectDoneCount++;
                                    } else {
                                        $unfinishedCount++;
                                        $projectUnfinishedCount++;
                                    }
                                }
                                if ($task->task_type == "Assignment") {
                                    $assignmentIsEmpty = false;
                                    $assignmentCount++;
                                    if ($task->status == "done") {
                                        $doneCount++;
                                        $assignmentDoneCount++;
                                    } else {
                                        $unfinishedCount++;
                                        $assignmentUnfinishedCount++;
                                    }
                                }
                            }

                            if ($isEmpty == false) {
                                $progress = round(($doneCount/$taskCount)*100,2);
                                if ($projectIsEmpty == false) {
                                    $projectProgress = round(($projectDoneCount/$projectCount)*100,2);
                                }
                                if ($assignmentIsEmpty == false) {
                                    $assignmentProgress = round(($assignmentDoneCount/$assignmentCount)*100,2);
                                }
                            }

                        ?>
                        <div class="shadow list-status-content">
                            <div class="status-bar">
                                <div class="status-bar-content">
                                    <div class="status-header">
                                        <p>My Progress</p>
                                    </div>
                                    <div class="status-progress">
                                        <div class="progress" style="width: {{$progress}}%"></div>
                                    </div>
                                    @if($isEmpty)
                                        <p class="progress-indicator">--</p>
                                    @elseif ($progress<100)
                                        <p class="progress-indicator">{{$progress}} %</p>
                                    @else
                                        <p class="progress-indicator">Completed</p>
                                    @endif
                                </div>
                            </div>
                            <div class="status-num">
                                <div class="overall-progress">
                                    <div class="overall-progress-done">
                                        <label>Finished Tasks</label>
                                        <p>{{$doneCount}}</p>
                                    </div>
                                    <div class="overall-progress-unfinished">
                                        <label>To Do Tasks</label>
                                        <p>{{$unfinishedCount}}</p>
                                    </div>
                                </div>
                                <div class="task-type-progress">
                                    <div class="project-progress">
                                        <label>Project Progress</label>
                                        @if ($projectIsEmpty)
                                            <p>--</p>
                                        @else
                                            <p>{{$projectProgress}} %</p>
                                        @endif
                                    </div>
                                    <div class="assignment-progress">
                                        <label>Assignment Progress</label>
                                        @if ($assignmentIsEmpty)
                                            <p>--</p>
                                        @else
                                            <p>{{$assignmentProgress}} %</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($tasks as $task)

                        <div class="task-info task-info-{{$task->tasks_id}}">
                            <div class="shadow">
                                <div class="task-info-title">
                                    <p><span>{{$task->task}}</span></p>
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
                                    @if ($task->status == "unfinished")
                                        <div>
                                            <button class="task-update" data-toggle="modal" data-target="#{{$task->tasks_id}}{{$task->updated_at}}">Update</button>
                                        </div>
                                    @endif
                                    <div>
                                        <form action="deleteListTask" method="GET">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$task->tasks_id}}">
                                            <button class="task-delete" type="submit">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="new-task">
                    <div class="new-task-content shadow">
                            <div class="new-task-header">
                                <p>Create new tasks for "{{$list->list_name}}"</p>
                            </div>
                            <form action="{{ route('todolist-add-task-insidelist.createTaskInsideList') }}" method="POST" role="form">
                                @csrf
                                <div class="new-task-body">
                                    <div class="new-name-content">
                                        <div class="new-task-name">
                                            <label for="task">Task Name</label>
                                            <input type="text" name="task" placeholder="e.g. TodoList">
                                        </div>
                                        <div class="new-task-subject">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject" placeholder="e.g. Programming">
                                        </div>
                                        <div class="new-task-date">
                                            <label for="due_date">Due Date</label>
                                            <input type="date" name="due_date">
                                        </div>
                                        <div class="new-task-time">
                                            <label for="time">Time</label>
                                            <input type="time" name="time">
                                        </div>
                                        <div class="new-task-type">
                                            <label>Task Type :</label>
                                            <div class="new-task-type-content">
                                                <div class="project-type">
                                                    <input type="radio"  class="new-task-class-radio1" name="task_type" id="project-type" value="Project">
                                                    <label for="">Project</label>
                                                </div>
                                                <div class="assignment-type">
                                                    <input type="radio"  class="new-task-class-radio2" name="task_type" id="assignment-type" value="Assignment">
                                                    <label for="">Assignment</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="new-task-footer">
                                    <div class="new-task-footer-content">
                                        <input type="hidden" name="task_id" value="{{$list->task_id}}">
                                        <div onclick="clearTask()">Clear</div>
                                        <button type="submit">Add Task</button>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>

                @foreach ($tasks as $task)
                    <div class="modal fade update-task-modal" id="{{$task->tasks_id}}{{$task->updated_at}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6>Update "{{$task->task}}"</h6>
                                </div>

                                    <form action="{{ route('todolist-add-task.updateTask') }}" method="POST" role="form">
                                        @csrf

                                        <div class="modal-body">
                                            <div class="add-task-form">
                                                <label for="task">Task Name</label>
                                                <input type="text" name="task" placeholder="e.g. TodoList" value="{{$task->task}}">
                                            </div>
                                            <div class="add-task-form">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" placeholder="e.g. Programming" value="{{$task->subject}}">
                                            </div>
                                            <div class="add-task-form">
                                                <label for="due_date">Due Date</label>
                                                <input type="date" name="due_date" placeholder="e.g. TodoList" value="{{$task->due_date}}">
                                            </div>
                                            <div class="add-task-form">
                                                <label for="time">Time</label>
                                                <input type="time" name="time" placeholder="e.g. TodoList" value="{{$task->time}}">
                                            </div>
                                            <div class="add-task-form">
                                                <label for="list_name">Task Type  :</label>
                                                <div>
                                                    @if ($task->task_type == "Project")
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="task_type" id="radioOne{{$task->tasks_id}}" value="Assignment">
                                                            <label class="form-check-label" for="inlineRadio1"> Assignment</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="task_type" id="radioTwo{{$task->tasks_id}}" value="Project" checked>
                                                            <label class="form-check-label" for="inlineRadio2"> Project</label>
                                                        </div>
                                                    @elseif($task->task_type == "Assignment")
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="task_type" id="radioOne{{$task->tasks_id}}" value="Assignment" checked>
                                                            <label class="form-check-label" for="inlineRadio1"> Assignment</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="task_type" id="radioTwo{{$task->tasks_id}}" value="Project">
                                                            <label class="form-check-label" for="inlineRadio2"> Project</label>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                            <input type="hidden" name="task_id" value="{{$task->tasks_id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <div class="add-task-submit">
                                                <input class="btn" type="submit" value="Update">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

