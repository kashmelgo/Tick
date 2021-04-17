<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tick') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#222629">
            <div class="container">
                <a class="navbar-brand text-light">
                    {{ config('app.name', 'Tick') }}
                </a>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header font-weight-bold">{{ __('Create Account (2/2)') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="/form"  enctype="multipart/form-data">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="fname" type="text" class="form-control"  placeholder="e.g. John" name="fname" required autocomplete="fname" autofocus>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control"  placeholder="e.g. Doe" name="lname" required autocomplete="lname" autofocus>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>
            
                                        <div class="col-md-6 ">
                                            <input id="birthdate" type="date" class="form-control w-75" name="birthdate">
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
            
                                        <div class="col-md-6 ">
                                            <select id="gender" class="form-control w-75" name="gender" required>
                                                <option value="" hidden>Select . . .</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="attainment" class="col-md-4 col-form-label text-md-right">{{ __('Educational Attainment') }}</label>
            
                                        <div class="col-md-6 ">
                                            <select id="attainment" class="form-control w-75" name="attainment" required>
                                                <option value="" hidden>Select . . .</option>
                                                <option value="HighSchool">Highschool</option>
                                                <option value="College">College</option>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="contact" type="number" class="form-control" name="contact" placeholder="09XXXXXXXXX" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="profile" type="file" class="form-control" name="profile">
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
                                                <input id="street" type="text" class="form-control" name="street"  required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Barangay') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="barangay" type="text" class="form-control" name="barangay"  required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Town/City') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="town" type="text" class="form-control" name="town"  required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="province" type="text" class="form-control" name="province"  required autofocus>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <label class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>
            
                                            <div class="col-md-6">
                                                <input id="postal" type="number" class="form-control w-50" name="postal"  required autofocus>
                                            </div>
                                        </div>
                                    </div>
            
                                    <hr>

                                    <div class="form-group  mt-4 mb-3">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success w-25 ">
                                                {{ __('Sign up') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
