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
    <div class="container-fluid p-5 h-100">
        @foreach ($profile as $profile)
            <div class="container-fluid profile-head m-0 p-0">
                <div class="row mx-5 mb-3">

                <div class="col-3 text-center">
                        <i class="fas fa-user-circle  profile-picture text-secondary"></i>
                    </div>
                    <div class="col-9 p-0 m-0">
                        <div class="container m-0 p-0">
                            <p class="profile-name  text-capitalize">{{$profile->fname}} {{$profile->lname}}</p>
                        </div>
                        <hr>
                        <div class="container m-0 p-0 text-secondary profile-info">
                            <div class="d-flex flex-row">
                                <p class="mr-5 my-0"><i class="fas fa-calendar-day mr-3"></i>{{$profile->birthdate}}</p>
                                <p class="mr-5 my-0"><i class="fas fa-venus-mars mr-3"></i>{{$profile->gender}}</p>
                                <p class="mr-5 my-0"><i class="fas fa-graduation-cap mr-3"></i>{{$profile->educational_attainment}}</p>
                            </div>
                            <p class="m-0"><i class="fas fa-map-marker-alt mr-3 text-capitalize"></i> {{$profile->street}} {{$profile->barangay}} {{$profile->town}}, {{$profile->province}} {{$profile->postal_code}}</p>
                            <p class="m-0"><i class="fas fa-mobile-alt mr-3"></i> {{$profile->contact_num}}</p>
                            <p class="m-0"><i class="fas fa-at mr-3"></i>{{$profile->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mt-2 mb-3">
                    <button class="btn btn btn-outline-dark rounded" data-toggle="modal" data-target="#editprofile">Edit Profile</button>
                </div>
                <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/profile/edit" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="fname" type="text" class="form-control text-capitalize" value="{{$profile->fname}}"  name="fname" required autocomplete="fname" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control text-capitalize"  value="{{$profile->lname}}" name="lname" required autocomplete="lname" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                                        <div class="col-md-6 ">
                                            <input id="birthdate" type="date" value="{{$profile->birthdate}}" class="form-control" name="birthdate">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                        <div class="col-md-6 ">
                                            <select id="gender" class="form-control" name="gender" required>
                                                @if ($profile->gender=="Male")
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                @else
                                                    <option value="Male">Male</option>
                                                    <option value="Female" selected>Female</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="attainment" class="col-md-4 col-form-label text-md-right">{{ __('Educational Attainment') }}</label>

                                        <div class="col-md-6 ">
                                            <select id="attainment" class="form-control" name="attainment" required>
                                                @if ($profile->educational_attainment=="Highschool")
                                                    <option value="Highschool" selected>Highschool</option>
                                                    <option value="College">College</option>
                                                @else
                                                <option value="Highschool">Highschool</option>
                                                <option value="College" selected>College</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                        <div class="col-md-6">
                                            <input id="contact" type="number" class="form-control" name="contact" value="{{$profile->contact_num}}" required>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <div class="container px-5">
                                            <label class="col-form-label text-md-right">{{ __('Complete Address :') }}</label>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                                            <div class="col-md-6">
                                                <input id="street" type="text" class="form-control text-capitalize" name="street" value="{{$profile->street}}"  required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Barangay') }}</label>

                                            <div class="col-md-6">
                                                <input id="barangay" type="text" class="form-control text-capitalize" name="barangay" value="{{$profile->barangay}}" required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Town/City') }}</label>

                                            <div class="col-md-6">
                                                <input id="town" type="text" class="form-control text-capitalize" name="town" value="{{$profile->town}}" required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                                            <div class="col-md-6">
                                                <input id="province" type="text" class="form-control text-capitalize" name="province" value="{{$profile->province}}" required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                                            <div class="col-md-6">
                                                <input id="postal" type="number" class="form-control w-50" name="postal" value="{{$profile->postal_code}}" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            <div class="row mx-5 mb-3 profile-bottom d-flex justify-content-between">
                <div class="col-4 p-1">
                    <div class="container bg-light h-100 card p-2 text-light text-center shadow">
                        <div class="container bg-light shadow card mb-2 h-50 p-3 text-dark text-center">
                            Task Statistics
                        </div>
                        <div class="container bg-light shadow card p-3 h-50 text-dark text-center">
                            Planner records
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-1">
                    <div class="level container-fluid bg-light card-top card mb-3 p-3 text-dark shadow text-center">
                        <h5> Level and Experience </h5>
                        <div class="progress w-100 position-relative flex">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{($account->experience / $level->experience_needed) * 100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{($account->experience / $level->experience_needed) * 100}}%">
                                <span> <p class="justify-content-center position-absolute w-100">{{($account->experience / $level->experience_needed) * 100}} %</p> </span>
                            </div>

                        </div>
                        <h6></span>Level {{$account->level_id}}</span></h6>
                        {{-- <div class="box justify-content-center">
                            <div class="percent">
                                <svg>
                                    <circle cx="70" cy="70" r="70"></circle>
                                    <circle cx="70" cy="70" r="70"></circle>
                                </svg>
                                <div class="level number">
                                    <h2>insert<span>%</span></h2>
                                </div>
                                <h1 class="level progress">Level 1</h1>
                            </div>
                        </div> --}}
                    </div>
                    <div class="container bg-light shadow card-bottom card p-2 text-light text-center">
                            <div class="container bg-light card mb-2 h-75 p-3 text-dark shadow text-center">
                                Theme Used
                            </div>
                            <div class="container bg-light shadow p-0 card h-25 text-dark text-center">
                                <button class="btn btn-light shadow w-100 h-100">Theme Shop</button>
                            </div>
                    </div>
                </div>
                <div class="col-4 p-1">
                    <div class="container bg-dark shadow h-100 card p-3 text-light text-center">
                        User Settings
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
