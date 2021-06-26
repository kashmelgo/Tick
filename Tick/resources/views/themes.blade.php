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
        <p>Planner</p>
        <a href="{{ route('planner.index') }}">
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
    <div class="sidebar-tab">
        <p>Shop</p>
        <a href="{{ route('themes') }}">
            <div class="tab active">
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
              loadTheme('.$selectedtheme.');
            </script>';  
    @endphp
    <div id="themes">
        <div class="theme-nav shadow-sm">
            <h1>Theme Shop</h1>
            <p></p>
            <p></p>
            <p></p>
            <div class="points-section">
                <i class="bi bi-star-fill"> <span>{{$points}}</span></i>
            </div>
        </div>
        <div class="theme-content">
            <div class="theme-list">
                @for ($i = 0; $i <= 3; $i++)
                    <div class="theme-items shadow">
                        <div class="theme-items-preview">
                            <div class="theme-items-preview-name">
                                <p>{{$themes[$i]['theme_name']}}</p>
                            </div>
                            @if ($themes[$i]['theme_status'] == "equipped")
                                <div class="theme-items-preview-equipped">
                                    <button><i class="bi bi-check2-all"></i> Equipped</button>
                                </div>
                            @endif
                            @if ($themes[$i]['theme_status'] == "notequipped")
                                <div class="theme-items-preview-notequipped">
                                    <button onclick="event.preventDefault();
                                    document.getElementById('equip-{{$themes[$i]['theme_id']}}').submit();"><i class="bi bi-palette-fill"></i> Equip</button>
                                </div>
                                <form id="equip-{{$themes[$i]['theme_id']}}" action="{{route('equiptheme')}}" method="get" class="d-none">
                                    @csrf
                                    <input type="hidden" name="theme_id" value="{{$themes[$i]['theme_id']}}">
                                </form>
                            @endif
                            @if ($themes[$i]['theme_status'] == null)
                                <div class="theme-items-preview-buy">
                                    <form action="/themes/buy" method="POST">
                                        @csrf
                                            <input type="hidden" name="theme_cost" value="{{$themes[$i]['theme_cost']}}">
                                            <input type="hidden" name="theme_id" value="{{$themes[$i]['theme_id']}}">
                                        @if ($points< $themes[$i]['theme_cost'])
                                            <button  style='pointer-events: none;background-color:rgb(255, 60, 60)'><i class='bi bi-star-fill'></i> {{$themes[$i]['theme_cost']}}</button>
                                            <p class="points-not-enough">Need more points!</p>
                                        @else
                                            <button type="submit" name="submit"><i class='bi bi-star-fill'></i> {{$themes[$i]['theme_cost']}}</button>
                                        @endif
                                    </form>
                                </div>
                            @endif
                            
                        </div>
                        <div class="theme-items-pallete shadow-sm" style="opacity: .8;background-color: {{$themes[$i]['theme_name']}}">

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
