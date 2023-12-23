@extends('layout.web')
@section('style')
@endsection

@section('content')

    <body>
        <div class="cust_login">
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
                            <form action="{{ route('customer.login') }}" method="POST" id="loginForm" class="row">
                                @csrf
                                <h5 class="text-center">Customer Request Monitoring System</h5>
                                <div class="form-group col-12">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="text" placeholder="Enter your mobile no." value="{{ old('mobile_no') }}"
                                        name="mobile_no" id="mobile_no" class="form-control">
                                </div>
                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100 loginbtn">Next
                                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="13" height="12"
                                            viewBox="0 0 13 12" fill="none">
                                            <path
                                                d="M7.33333 1.86694L11.5 6.24194M11.5 6.24194L7.33333 10.6169M11.5 6.24194L1.5 6.24194"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <a href="{{ url('/') }}">
                                        <button type="button" class="btn btn-default">Go Back</button>
                                    </a>
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
