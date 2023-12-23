@extends('layout.layout')
@section('style')
@endsection

@section('content')

    <body>
        <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">

            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-1 col-3 logo-main">
                                <a href="{{ url('/') }}"><img class="main-logo"
                                        src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
                            </div>

                            <div class="col-md-11 col-9">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                                                class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                <div class="d-flex gap-3 align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('assets/img/profile/user-4.png') }}" alt="" />
                                                    </div>
                                                    <div class="flex-grow-1 d-flex flex-column">
                                                        <h5 class="admin-name m-0">{{$user->name}}</h5>
                                                        <span>SMS</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu">
                                                <li><a href="{{ route('profile') }}"><span
                                                            class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                        Profile</a>
                                                </li>
                                                <li><a href="{{ route('cust_login') }}"><span
                                                            class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="breadcome-heading">
                                                <h3>Profile</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-23">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-info-inner mb-5">
                                <div class="profile-img">
                                    <img src="{{ asset('assets/img/profile/user-4.png') }}" alt="" />
                                </div>
                                <div class="profile-details-hr">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Name</b><br /> {{$user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Mobile</b><br /> {{$user->mobile}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Email ID</b><br /> fly@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Phone</b><br /> +01962067309</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="address-hr">
                                                <p><b>Address</b><br /> E104, catn-2, Chandlodia Ahmedabad Gujarat, UK.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <h3>500</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <h3>900</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                                <h3>600</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
@endsection

@section('script')
@endsection
