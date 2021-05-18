@extends('layouts.app2')

@section('header')
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Tick</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          @if (Route::has('login'))
              @auth
                  <a href="{{route('home')}}" class="signup-nav scrollto" >Session</a></li>
              @else
                  <button class="login scrollto" data-toggle="modal" data-target="#loginModal">Login</button>

                  @if (Route::has('register'))
                     <a href="{{route('register')}}" class="signup-nav scrollto" >Signup</a></li>
                  @endif
              @endauth
            @endif
        </ul>
      </nav>
    </div>
  </header>
@endsection

@section('login-modal')
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('login') }}" method="post">
          @csrf

          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Login Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="bi bi-x-circle-fill"></i>
            </button>
          </div>

          <div class="modal-body">
            <div class="container">
                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  
                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autofocus>
  
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
  
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
            </div>
          </div>

          <div class="modal-footer">
            <a class="btn instead-btn" href="{{route('register')}}">Create Account</a>
            <button type="submit" class="btn confirm-btn">{{ __('Login') }}</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection

@section('landing-page')

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Gamified To-Do List and Planner</h1>
          <h2>We are team of talented designers lorem ipsum dolor sit amet. </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{route('register')}}" class="signup scrollto">Create Account</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('images/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="content text-center">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua. 
            </p>
        </div>

      </div>
    </section>


    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4>To-Do List</h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4>Planner</h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4>Rewards</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4>Task Point System</h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section>


    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{asset('images/team.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Jacob Balane</h4>
                <span>Software Developer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="{{asset('images/team.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Kashmel Go</h4>
                <span>Software Developer</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{asset('images/team.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Renel Tan</h4>
                <span>Software Developer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>

  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Tick</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection

  
