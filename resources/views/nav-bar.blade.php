<!DOCTYPE html>
<html>
  <head>
    <title>CRUD</title>
    <meta charset="UTF-8">
    <meta name="description" content="Lara">
    <meta name="keywords" content="Lara">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/nav.css')?>" type="text/css"> 
    <link rel="icon" href="{{asset('images/favicon1.png')}}" sizes="256x256">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- custome js -->
    <script src="{{asset('js/nav.js')}}"></script>
    <style>
      .bg {
        background-image: url("{{asset('images/welcome.jpg')}}");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      header {
        background: #f5b335;
        height: 40px;
        position: fixed;
        top: 0;
        transition: top 0.2s ease-in-out;
        width: 100%;
        z-index: 100;
      }
      .nav-up {
        top: -100px;
      }
    </style>
  </head>
  <body>
  <header class="nav-down">
    <ul class="menu" id="navbar">
      <li><a href="/">Home</a></li>
      <li><a href="customers">Customer</a></li>
      <li><a href="students">Student</a></li>
      <li><a href="register">Register</a></li>
    </ul>
  </header>

  <script>
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();
    $(window).scroll(function(event) {
        didScroll = true;
    });
    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();
        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta) return;
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('header').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up').addClass('nav-down');
            }
        }
        lastScrollTop = st;
    }
  </script>
