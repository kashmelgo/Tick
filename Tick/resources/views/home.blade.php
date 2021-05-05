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
    <div id="main-title">
        <h3>Dashboard</h3>
    </div>
    <div id="main-content">
        <div class="main-content-list">
            <div class="listCard shadow">
                <div class="preview">
                    <div class="preview-list-task">

                    </div>
                    <a href="">
                        <div class="preview-view shadow-sm">Preview</div>
                    </a>
                    <a href="">
                        <div class="preview-open shadow-sm">Open</div>
                    </a>
                </div>
                <div class="preview-title">
                    <p>To-do List</p>
                    <a href="" class="preview-title-icon">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="preview">
                    <a href="">
                        <div class="preview-view shadow-sm">Preview</div>
                    </a>
                    <a href="">
                        <div class="preview-open shadow-sm">Open</div>
                    </a>
                </div>
                <div class="preview-title">
                    <p>To-do List</p>
                    <a href="" class="preview-title-icon">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="preview">
                    <a href="">
                        <div class="preview-view shadow-sm">Preview</div>
                    </a>
                    <a href="">
                        <div class="preview-open shadow-sm">Open</div>
                    </a>
                </div>
                <div class="preview-title">
                    <p>To-do List</p>
                    <a href="" class="preview-title-icon">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
            </div>
            <div class="listCard shadow">
                <div class="preview">
                    <a href="">
                        <div class="preview-view shadow-sm">Preview</div>
                    </a>
                    <a href="">
                        <div class="preview-open shadow-sm">Open</div>
                    </a>
                </div>
                <div class="preview-title">
                    <p>To-do List</p>
                    <a href="" class="preview-title-icon">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content-planner ">
            <div class="content-planner shadow text-center">
                Planner Preview
            </div>
        </div>
    </div>
@endsection


