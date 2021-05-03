@extends('layouts.main')

@section('content')
    <div class="container-fluid h-100 p-0">
        <div class="container-fluid pt-4 pb-1 dashboard-title">
            <p class="h1 font-weight-bold">Dashboard</p>
        </div>
        <hr class="mb-0 p-0">
        <div class="row">
            <div id="main-menu" class="col-12">
                <div class="container-fluid dashboard-upper wrapper p-2">
                    @foreach($lists as $list)
                    <div class="item mx-2 rounded shadow-sm">
                        <div class="card h-100 w-100 p-0">
                            <div class="container task-header rounded bg-dark text-light w-100">{{$list->list_name}}</div>
                            <div class="container task-body w-100 py-2 px-3" onclick="redirect(task_id)" style="cursor: pointer">
                                @foreach($tasks as $task)
                                    @if($task->task_id === $list->task_id)
                                        <p class="m-0">{{$task->task}}</p>
                                    @endif
                                @endforeach
                            </div> <!--change task_id-->
                            <div class="container p-2 task-footer w-100 d-flex flex-row-reverse">
                                <button class="btn btn-outline-secondary" onclick="openPreview()">Preview</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="container-fluid dashboard-lower pb-2 pr-0 w-100">
                    <div class="container h-100 w-100 shadow bg-light rounded m-0">
                        Planner Here
                    </div>
                </div>
            </div>
            <div id="preview" class="col-4 p-2" style="display: none">
                <div  class="container rounded shadow bg-light shadow h-100 rounded p-0">
                    <div class="container-fluid d-flex justify-content-between bg-dark" style="height: 55px">
                        <div class="text-light px-2 p-3"><p class="h5">Task Preview</p></div>
                        <div></div>
                        <div class="text-light px-2 p-3">
                            <i class="fas fa-times" onclick="closePreview()"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
