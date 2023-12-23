<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SCS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts
  ============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
    <!--datatable CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTable.min.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- educate icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/educate-custon-icon.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu-vertical.css') }}">

    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/form/all-type-forms.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
@yield('style')

@yield('content')


<!-- jquery
  ============================================ -->
<script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
<!-- bootstrap JS
            ============================================ -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
<!-- wow JS
            ============================================ -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- price-slider JS
            ============================================ -->
<script src="{{ asset('assets/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
            ============================================ -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- DataTable JS
    ============================================ -->
<script src="{{ asset('assets/js/jquery.dataTable.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable-custom.js') }}"></script>

<!-- owl.carousel JS
            ============================================ -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
            ============================================ -->
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
            ============================================ -->
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
            ============================================ -->
<script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- metisMenu JS
            ============================================ -->
<script src="{{ asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- tab JS
            ============================================ -->
<script src="{{ asset('assets/js/tab.js') }}"></script>
<!-- icheck JS
            ============================================ -->
<script src="{{ asset('assets/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/js/icheck/icheck-active.js') }}"></script>
<!-- plugins JS
            ============================================ -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- main JS
            ============================================ -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- modernizr JS
  ============================================ -->
<script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('script')


</html>
