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
            <div class="tab active">
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
        <p>Planners</p>
        <a href="{{route('admin-planners')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-check-all"></i> Show All</div>
            </div>
        </a>
    </div>
    <div class="admin-sidebar-tab">
        <p>Themes</p>
        <a href="{{route('admin-themes')}}">
            <div class="tab">
                <div class="tab-color"></div>
                <div class="tab-text"><i class="bi bi-brush"></i> View Themes</div>
            </div>
        </a>
    </div>

@endsection

@section('pageContent')
    <div id="admin-user-nav">
        <p>All User</p>
        <form method="postt" action="{{route('admin-users')}}" style="flex: 0%">
            @csrf
            <button class="user-buttons user-all p-2" onclick="userFilter($user_type)" style="float:left;" name="user_type" value="0" type="submit">
                <i class="bi bi-people"></i>All
            </button>
            <button class="user-buttons user-admin p-2" onclick="userFilter($user_type)" style="float:left;" name="user_type" value="1"  type="submit">
                <i class="bi bi-people"></i>Admin
            </button>
            <button class="user-buttons user-student p-2" onclick="userFilter($user_type)" style="float:left;" name="user_type" value="2"  type="submit">
                <i class="bi bi-people"></i>User
            </button>
        </form>


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
                    <div class="col-sm-8"><h2>User <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <form method="GET" action="{{route('searchUsers')}}">
                            <div class="search-box d-flex">
                                <button type ="submit" class="btn material-icons"></button>
                                <input type="text" name="searchusers" class="form-control" placeholder="Search…">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->user_type}}</td>
                        <td>
                            {{-- <a href="#" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><i class="material-icons"></i></a> --}}
                            <form method="post" action="{{ route('deleteUser', $user->id) }}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-warning" type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$users->links()}}
        </div>

    </div>

@endsection


