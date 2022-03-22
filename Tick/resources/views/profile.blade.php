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
    <div id="profile">
        <div class="profile-main">
            <div class="profile-content shadow-sm">
                <div class="profile-picture"></div>
                <div class="profile-details">
                    @foreach ($profile as $profile)
                        <div class="username">
                            <p>{{$profile->fname}} {{$profile->lname}}</p>
                        </div>
                        <div class="user-details">
                            <div class="user-details-item">
                                <div class="user-details-info">
                                    @if ($profile->gender == "Male")
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16" style="color: rgb(0, 132, 255)">
                                            <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                                        </svg> {{$profile->gender}}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16" style="color: rgb(240, 51, 83)">
                                            <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                                        </svg> {{$profile->gender}}
                                    @endif
                                </div>
                            </div>
                            <div class="user-details-item">
                                <div class="user-details-info">
                                    <i class="bi bi-envelope" style="color: rgb(0, 211, 46)"></i>
                                    <p>{{$profile->email}}</p>
                                    <form action="" method="post">
                                        <input type="email" name="update-email">
                                    </form>
                                </div>
                                <div class="user-details-edit">
                                    <i class="bi bi-pencil-square editBtn" onclick="showUpdateInfo(0)"> Edit</i>
                                </div>
                                <div class="user-details-edit-onhover">
                                    <i class="bi bi-check-square-fill update-info"></i>
                                    <i class="bi bi-x-square-fill cancel-info" onclick="closeUpdateInfo()"></i>
                                </div>
                            </div>

                            <div class="user-details-item">
                                <div class="user-details-info">
                                    <i class="bi bi-envelope" style="color: rgb(207, 207, 0)"></i>
                                    <p>{{$profile->contact_num}}</p>
                                    <form action="" method="post">
                                        <input type="number" name="update-contact">
                                    </form>
                                </div>
                                <div class="user-details-edit">
                                    <i class="bi bi-pencil-square editBtn" onclick="showUpdateInfo(1)"> Edit</i>
                                </div>
                                <div class="user-details-edit-onhover">
                                    <i class="bi bi-check-square-fill update-info"></i>
                                    <i class="bi bi-x-square-fill cancel-info" onclick="closeUpdateInfo()"></i>
                                </div>
                            </div>
                            <div class="user-details-item">
                                <div class="user-details-info">
                                    <i class="bi bi-calendar-event" style="color: red"></i> {{$profile->birthdate}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="stats-content">
                <div class="stats-content-level shadow">
                    <?php
                    $exp = $sidebarexperience;
                    foreach ($sidebarlevel as $level) {
                        $exp_needed = $level->experience_needed;
                        $mylevel = $level->level -1;
                    }

                    $expbar = ($exp/$exp_needed)*100;
                    echo "
                        <div class='content-level'>
                            <p>Your Level</p>
                            <div class='level-container shadow'>
                                <p>$mylevel</p>
                            </div>
                        </div>
                        <div class='content-experience'>
                            <div class='experience-container shadow'>
                                <div class='experience-container-progress' style='width: $expbar%''></div>
                            </div>
                        </div>
                    ";

                    if ($taskCount == 0) {
                        $taskDoneRatio = 0;
                    } else {
                        $taskDoneRatio = round(($taskDone/$taskCount)*100);
                    }

                    $taskNotDoneRatio = 100 - $taskDoneRatio;
                ?>
                </div>
                <div class="stats-content-task shadow">
                    <div class="overall-task">
                        <div class="content-level">
                            <p>Overall Completed Task(s)</p>
                            <div class="level-container shadow">
                                <p>{{$taskDoneRatio}}%</p>
                            </div>
                        </div>
                        <div class="content-experience">
                            <div class="experience-container shadow">
                                <div class="experience-container-progress-done" style="width: {{$taskDoneRatio}}%"></div>
                                <div class="experience-container-progress-unfinish" style="width: {{$taskNotDoneRatio}}%"></div>
                            </div>
                        </div>
                        <div class="content-experience-legend">
                            <ul>
                                <li>Done - {{$taskDone}}</li>
                                <li>Total Task - {{$taskCount}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="overall-task-stats">
                        <div class="overall-list-stats">
                            <div class="content-level">
                                <p>Active List(s)</p>
                                <div class="level-container shadow">
                                    @php
                                        echo "<p>$listnum</p>"
                                    @endphp

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
