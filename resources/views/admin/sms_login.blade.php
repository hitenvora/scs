@extends('layout.web')
@section('style')
@endsection

@section('content')

    <body>
        <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->
        <div class="error-pagewrap">
            <div class="error-page-int">
                <div class="text-center m-b-md custom-login">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
                            @include('layout.flash-message')
                            <form action="{{ route('sms_login_submit') }}" id="loginForm" method="post" class="row">
                                @csrf
                                <h5 class="text-center">Login to your account</h5>
                                <div class="form-group col-12">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="number" placeholder="Enter your mobile no." name="mobile_no"
                                        value="{{ old('mobile_no') }}" id="mobile_no" class="form-control">
                                </div>
                                <span class="text-danger" id="mobile_no_error"></span>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group position-relative col-12">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" title="Enter password" placeholder="Enter your password"
                                        name="password" id="password" class="form-control">

                                    <svg class="eye" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M12 19C10.3599 19.0204 8.7367 18.6665 7.254 17.965C6.10469 17.4042 5.07265 16.6298 4.213 15.683C3.30243 14.7041 2.58547 13.5617 2.1 12.316L2 12L2.105 11.684C2.59082 10.4394 3.30624 9.29728 4.214 8.31701C5.07334 7.37032 6.10504 6.59587 7.254 6.03501C8.73671 5.3336 10.3599 4.97962 12 5.00001C13.6401 4.97966 15.2633 5.33363 16.746 6.03501C17.8953 6.59574 18.9274 7.3702 19.787 8.31701C20.6993 9.29456 21.4165 10.4374 21.9 11.684L22 12L21.895 12.316C20.3262 16.3998 16.3742 19.0694 12 19ZM12 7.00001C8.59587 6.89334 5.47142 8.8751 4.117 12C5.4712 15.1251 8.59579 17.107 12 17C15.4041 17.1064 18.5284 15.1247 19.883 12C18.5304 8.87359 15.4047 6.89109 12 7.00001ZM12 15C10.5573 15.0096 9.30937 13.9974 9.02097 12.5838C8.73256 11.1702 9.48427 9.75003 10.8154 9.19367C12.1465 8.63731 13.6852 9.10014 14.4885 10.2985C15.2919 11.4969 15.1354 13.0961 14.115 14.116C13.5563 14.6813 12.7948 14.9996 12 15Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-12">
                                    <button class="btn btn-primary d-block w-100 loginbtn" type="submit">Login</button>
                                    <p class="mt-4 mb-0 text-center">Don’t have an account? <a
                                            href="{{ route('sms_signup') }}"><b>Sign Up</b></a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
@endsection
