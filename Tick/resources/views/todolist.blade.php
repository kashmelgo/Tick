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
    <div id="todolist-title">
        <h3>Your Lists</h3>
    </div>
    <div id="todolist-content">
        <a href="">
            <div class="add-floating shadow">
                <div><i class="bi bi-plus"></i></div>
            </div>
        </a>
        <div id="todolist-page">
            <div class="listCard shadow">
                <div class="listCard-heading">
                    <h5>List Name</h5>
                    <a href="">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                </div>

                <div class="listCard-body">
                    <a href="">
                        <div class="add-task-floating">
                            <div class="shadow-sm"><i class="bi bi-plus"></i></div>
                        </div>
                    </a>
                    <div id="tasklist">
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Sleep</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Eat</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Study</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Rest</label>
                        </div>
                        <div class="task-done">
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Done</label>
                        </div>
                        <div class="tasklist-footer"></div>
                    </div>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="listCard-heading">
                    <h5>List Name</h5>
                    <a href="">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                </div>

                <div class="listCard-body">
                    <a href="">
                        <div class="add-task-floating">
                            <div class="shadow-sm"><i class="bi bi-plus"></i></div>
                        </div>
                    </a>
                    <div id="tasklist">
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Sleep</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Eat</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Study</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Rest</label>
                        </div>
                        <div class="task-done">
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Done</label>
                        </div>
                        <div class="tasklist-footer"></div>
                    </div>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="listCard-heading">
                    <h5>List Name</h5>
                    <a href="">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                </div>

                <div class="listCard-body">
                    <a href="">
                        <div class="add-task-floating">
                            <div class="shadow-sm"><i class="bi bi-plus"></i></div>
                        </div>
                    </a>
                    <div id="tasklist">
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Sleep</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Eat</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Study</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Rest</label>
                        </div>
                        <div class="task-done">
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Done</label>
                        </div>
                        <div class="tasklist-footer"></div>
                    </div>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="listCard-heading">
                    <h5>List Name</h5>
                    <a href="">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                </div>

                <div class="listCard-body">
                    <a href="">
                        <div class="add-task-floating">
                            <div class="shadow-sm"><i class="bi bi-plus"></i></div>
                        </div>
                    </a>
                    <div id="tasklist">
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Sleep</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Eat</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Study</label>
                        </div>
                        <div class="task">
                            <i class="bi bi-dash-circle"></i>
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Rest</label>
                        </div>
                        <div class="task-done">
                            <i class="bi bi-check-circle-fill"></i>
                            <label for="">Done</label>
                        </div>
                        <div class="tasklist-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

