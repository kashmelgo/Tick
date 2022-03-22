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
                        <div class="add-floating">
                            <button class=" shadow"  data-toggle="modal" data-target="#add-admin-modal"><i class="bi bi-plus"></i></button>
                        </div>
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
                        <th>User ID</th>
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
                        <td class="d-flex">
                            {{-- <a href="#" class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><i class="material-icons"></i></a> --}}
                            <form method="post" action="{{ route('deleteUser', $user->id) }}">
                                @method('DELETE')
                                @csrf
                                <input class="m-1 btn btn-warning" type="submit" value="Delete" />
                            </form>
                            <button class="m-1 btn btn-primary"  data-toggle="modal" data-target="#edit-user-modal-{{$user->id}}">Edit</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit-user-modal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header"> </div>

                                <form action="{{route('editUser', $user->id)}}" method="POST" role="form">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="add-list-form">
                                            <label for="admin_name">Name</label>
                                            <input type="text" name="name" value = {{$user->name}}>
                                        </div>
                                        <div class="add-list-form">
                                            <label for="admin_name">Email</label>
                                            <input type="text" name="email" value = {{$user->email}}>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <div class="add-list-submit">
                                            <input class="btn btn-primary" type="submit" value="Confirm Edit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            </table>
            {{$users->links()}}
        </div>

        <div class="modal fade" id="add-admin-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header"> </div>

                    <form action="{{route('adminUsers.createAdmin')}}" method="POST" role="form">
                        @csrf
                        <div class="modal-body">
                            <div class="add-list-form">
                                <label for="admin_name">Admin Name</label>
                                <input type="text" name="adminname" placeholder="e.g. John Doe">
                            </div>
                            <div class="add-list-form">
                                <label for="admin_name">Admin Email</label>
                                <input type="text" name="adminemail" placeholder="e.g. admin@gmail.com">
                            </div>
                            <div class="add-list-form">
                                <label for="admin_name">Password</label>
                                <input type="password" name="adminpassword">
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
    </div>



@endsection


