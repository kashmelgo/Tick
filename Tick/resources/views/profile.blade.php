@extends('layouts.main')

@section('content')
    <div class="container-fluid p-5 h-100">
        <div class="container-fluid profile-head m-0 p-0">
            <div class="row mx-5 mb-3">
               @foreach ($profile as $profile)
               <div class="col-3 text-center">
                    <i class="fas fa-user-circle  profile-picture text-secondary"></i>
                </div>
                <div class="col-9 p-0 m-0">
                    <div class="container m-0 p-0">
                        <p class="profile-name">{{$profile->fname}} {{$profile->lname}}</p>
                    </div>
                    <hr>
                    <div class="container m-0 p-0 text-secondary profile-info">
                        <div class="d-flex flex-row">
                            <p class="mr-5 my-0"><i class="fas fa-calendar-day mr-3"></i>{{$profile->birthdate}}</p>
                            <p class="mr-5 my-0"><i class="fas fa-venus-mars mr-3"></i>{{$profile->gender}}</p>
                            <p class="mr-5 my-0"><i class="fas fa-graduation-cap mr-3"></i>{{$profile->educational_attainment}}</p>
                        </div>
                        <p class="m-0"><i class="fas fa-map-marker-alt mr-3"></i> {{$profile->street}} {{$profile->barangay}} {{$profile->town}}, {{$profile->province}} {{$profile->postal_code}}</p>
                        <p class="m-0"><i class="fas fa-mobile-alt mr-3"></i> {{$profile->contact_num}}</p>
                        <p class="m-0"><i class="fas fa-at mr-3"></i>{{$profile->email}}</p>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="container d-flex justify-content-center mt-2 mb-3">
                <button class="btn btn btn-outline-dark rounded">Edit Profile</button>
            </div>
        </div>
        <div class="row mx-5 mb-3 profile-bottom d-flex justify-content-between">
            <div class="col-4 p-1">
                <div class="container bg-secondary h-100 card p-2 text-light text-center">
                    <div class="container bg-dark card mb-2 h-50 p-3 text-light text-center">
                        Task Statistics
                    </div>
                    <div class="container bg-dark card p-3 h-50 text-light text-center">
                        Planner records
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                <div class="container bg-secondary card-top card mb-3 p-3 text-light text-center">
                    Level and Experience
                </div>
                <div class="container bg-secondary card-bottom card p-2 text-light text-center">
                        <div class="container bg-dark card mb-2 h-75 p-3 text-light text-center">
                            Theme Used
                        </div>
                        <div class="container bg-secondary p-0 card h-25 text-light text-center">
                            <button class="btn btn-dark w-100 h-100">Theme Shop</button>
                        </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="container bg-secondary h-100 card p-3 text-light text-center">
                    User Settings
                </div>
            </div>
        </div>
    </div>
@endsection