@extends('layouts.main')

@section('content')
    <div class="container-fluid p-5 h-100">
        <div class="container-fluid profile-head m-0 p-0">
            <div class="row mx-5 mb-3">
                <div class="col-3 text-center">
                    <i class="fas fa-user-circle  profile-picture text-secondary"></i>
                </div>
                <div class="col-9 p-0 m-0">
                    <div class="container m-0 p-0">
                        <p class="profile-name">Student Name</p>
                    </div>
                    <hr>
                    <div class="container m-0 p-0 text-secondary profile-info">
                        <div class="d-flex flex-row">
                            <p class="mr-5 my-0"><i class="fas fa-calendar-day mr-3"></i>Birthdate</p>
                            <p class="mr-5 my-0"><i class="fas fa-venus-mars mr-3"></i>Gender</p>
                            <p class="mr-5 my-0"><i class="fas fa-graduation-cap mr-3"></i>Educational Attainment</p>
                          </div>
                        <p class="m-0"><i class="fas fa-map-marker-alt mr-3"></i> Address</p>
                        <p class="m-0"><i class="fas fa-mobile-alt mr-3"></i> Contact Number</p>
                        <p class="m-0"><i class="fas fa-at mr-3"></i>Email</p>
                    </div>
                </div>
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
                        <div class="container bg-dark card p-3 h-25 text-light text-center">
                            Theme Shop
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