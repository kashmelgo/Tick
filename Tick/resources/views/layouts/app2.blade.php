<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tick</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style2.css')}}" rel="stylesheet">
  <script src="{{asset('js/main.js')}}"></script>


</head>

<body>

    @yield('header')

    @yield('login-modal')

    @yield('landing-page')

    @yield('login-page')

    @yield('signup-page')

    @yield('content')

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

  <script>


    $('#editTaskModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var task = $(event.relatedTarget).data('mytask')
    var subject = button.data('mysubject')
    var due_date = button.data('mydue')
    var time = button.data('mytime')
    var task_type = button.data('mytasktype')
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #task').val(task);
    modal.find('.modal-body #subject').val(subject);
    modal.find('.modal-body #due_date').val(due_date);
    modal.find('.modal-body #time').val(time);
    modal.find('.modal-body #task_type').val(task_type);
    modal.find('.modal-body #tasks_id').val(id);
    })


    $('#editListModal').on('show.bs.modal', function (event) {


    var button = $(event.relatedTarget)
    var id = $(event.relatedTarget).data('id')
    var list = $(event.relatedTarget).data('listname')

    var modal = $(this)
    modal.find('.modal-body #list').val(list);
    modal.find('.modal-body #task_id').val(id);
    })


</script>

</body>

</html>
