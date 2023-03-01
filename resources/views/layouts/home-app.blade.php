<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>AdminWrap Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">

    <link href="{{asset('assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/pages/dashboard1.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/colors/default.css')}}" id="theme" rel="stylesheet">
</head>

<body class=" card-no-border">
    <div class="container mt-3 d-flex justify-content-end">
        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <div id="main-wrapper">



        @yield('content')

    </div>

    <script src="{{asset('assets/node_modules/jquery/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/c3-master/c3.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard1.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>