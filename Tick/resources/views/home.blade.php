@extends('layouts.mainFormat')

@section('sidebar')
    <div class="sidebar-tab">
        <p>Overview</p>
        <a href="{{ route('home') }}">
            <div class="tab active">
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
    <div id="main-title">
        <h3>Dashboard</h3>
    </div>
    <div id="main-content">
        <div class="main-content-list">

            @foreach ($lists as $list)
                @php
                    $alltask = 0;
                    $donetask = 0;
                    $progress = 0;
                    foreach ($tasks as $task) {
                        if ($task->task_id === $list->task_id){
                            $alltask+=1;
                            if($task->status === 'done')
                                $donetask+=1;
                        }   
                    }
                    if($alltask>0)
                        $progress = round(($donetask/$alltask)*100,2);
                @endphp
                <div class="listCard shadow">
                    <div class="preview">
                        <div class="preview-list-task">
                            @if ($alltask > 0)
                                <h2 for="">{{$progress}}%</h2>
                            @else
                                <h2 for="">-   -</h2>
                            @endif
                            <div class="status-progress">
                                <div class="progress" style="width: {{$progress}}%"></div>
                            </div>
                        </div>
                        <a>
                            <div class="preview-view shadow-sm" data-toggle="modal" data-target="#previewList-{{$list->list_id}}">Preview</div>
                        </a>
                        <a  href="">
                            <div class="preview-open shadow-sm" onclick="event.preventDefault();
                            document.getElementById('openList-{{$list->list_id}}').submit();">Open</div>
                        </a>

                        <form id="openList-{{$list->list_id}}" action="{{route('todolist-tasks',$list->list_id)}}" method="GET" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="preview-title">
                        <p>{{$list->list_name}}</p>
                    </div>
                </div>

                <div class="modal fade " id="previewList-{{$list->list_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="previewTask-name">
                                    <p>{{$list->list_name}}</p>
                                </div>
                                <div class="previewTask-control-buttons">
                                    <button data-dismiss="modal">Close</button>
                                    <button onclick="event.preventDefault();
                                    document.getElementById('openList-{{$list->list_id}}').submit();">Open</button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    @foreach ($tasks as $task)
                                        @if ($task->task_id == $list->task_id)
                                            @if ($task->status == "unfinished")
                                                <li>
                                                    <p><strong>{{$task->task}}</strong></p>
                                                </li>
                                            @else
                                                <li>
                                                    <p class="finished-task"><del>{{$task->task}}</del></p>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
    </div>
@endsection


