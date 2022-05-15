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
                <div class="list-of-tasks shadow p-5">
                    <div class="list-of-tasks-content">

                        @foreach ($tasks as $task)
                            <div class="task" onclick="test('task-info-{{$task->tasks_id}}')">


                                @if ($task->status == "done")
                                    <div class="task-name done" data-toggle="tooltip" data-placement="right" data-html="true" title="Due Date: {{$task->due_date}}">
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
                                    <div class="task-name unfinished" data-toggle="tooltip" data-placement="top" data-html="true" title="Due Date: {{$task->due_date}}">

                                        <form action="{{route('todolist-markAsDone',$task->tasks_id)}}" method="post">

                                            @csrf
                                            <a onclick="this.parentNode.submit();" >
                                                <div>
                                                    <i class="bi bi-dash-circle"></i>
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                            </a>
                                        </form>
                                        <label for="">{{$task->task}}</label>
                                    </div>
                                @endif

                            <script>
                                $(function () {
                                   $('[data-toggle="tooltip"]').tooltip()
                                })
                            </script>

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

                </div>

                <div class="new-task">
                    <div class="new-task-content shadow">
                            <button class="btn" data-toggle="modal" data-target="#add-new-task">Add Task</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade add-task-modal" id="add-new-task" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6>Add New Task"</h6>
                    </div>

                        <form action="{{ route('todolist-new-task.newTask') }}" method="POST" role="form">
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
    </div>
@endsection

