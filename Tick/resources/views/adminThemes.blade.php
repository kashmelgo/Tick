@extends('layouts.adminFormat')

@section('sidebar')
    <div class="admin-sidebar-tab">
        <p>Overview</p>
        <a href="/home">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-house"></i> Dashboard</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Users</p>
        <a href="{{route('admin-users')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-people"></i> All Users</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>To-Do Lists</p>
        <a href="{{route('admin-todolists')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    
    <div class="admin-sidebar-tab">
        <p>Themes</p>
        <a href="{{route('admin-themes')}}">
            <div class="tab active">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-brush"></i> View Themes</div>
            </div>
        </a>
    </div>

@endsection

@section('pageContent')
<div id="admin-theme-nav">

    {{-- <div class="user-buttons user-admin" onclick="userFilter(1)">
        <i class="bi bi-person"></i>Admin
    </div>
    <div class="user-buttons user-student" onclick="userFilter(2)">
        <i class="bi bi-person-badge"></i>Student
    </div> --}}
</div>

<div id="admin-user-view">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>Theme <b>Details</b></h2></div>
                <div class="col-sm-4">
                    <div class="add-floating">
                        <button class=" shadow"  data-toggle="modal" data-target="#add-theme-modal"><i class="bi bi-plus"></i></button>
                    </div>
                    <form method="GET" action="{{route('searchThemes')}}">
                        <div class="search-box d-flex">
                            <button type ="submit" class="btn material-icons"></button>
                            <input type="text" name="searchthemes" class="form-control" placeholder="Search Theme">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Theme Color<i class="fa fa-sort"></i></th>
                    <th>Points Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                <tr>
                    <td>{{$theme->theme_id}}</td>
                    <td>{{$theme->theme_name}}</td>
                    <td>{{$theme->cost}}</td>
                    <td class="d-flex">
                        {{-- <a href="#" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><i class="material-icons"></i></a> --}}
                        <form method="post" action="{{ route('deleteTheme', $theme->theme_id) }}">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-dark" type="submit" value="Delete" />
                        </form>
                        <button class="mx-2 my-0 btn btn-dark"  data-toggle="modal" data-target="#edit-theme-modal-{{$theme->theme_id}}">Edit</button>
                    </td>
                </tr>

                <div class="modal fade" id="edit-theme-modal-{{$theme->theme_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-dark"> </div>

                            <form action="{{route('editTheme', $theme->theme_id)}}" method="POST" role="form">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group my-3">
                                        <input class="form-control form-control-sm my-2" type="text" value = {{$theme->theme_name}} readonly>
                                        <input class="form-control form-control-sm my-2" type="text" name="themename" value = "" placeholder="New Theme Name">
                                        <input class="form-control form-control-sm my-2" type="number" value = {{$theme->cost}} readonly>
                                        <input class="form-control form-control-sm my-2" type="number" name="themecost" value = "" placeholder="New Theme Cost">
                                    </div>
                                </div>
                                <div class="modal-footer bg-dark">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                    <div class="add-list-submit">
                                        <input class="btn btn-success" type="submit" value="Confirm Edit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </tbody>
        </table>
        {{$themes->links()}}
    </div>

    <div class="modal fade" id="add-theme-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-dark"> </div>

                <form action="{{route('createTheme')}}" method="POST" role="form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group my-3">
                            <input class="form-control form-control-sm my-2" type="text" name="themename" value = "" placeholder="Theme Name">
                            <input class="form-control form-control-sm my-2" type="number" name="themecost" value = "" placeholder="Theme Cost">
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <div class="add-list-submit">
                            <input class="btn btn-success" type="submit" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


