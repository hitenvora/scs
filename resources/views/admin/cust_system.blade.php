@extends('layout.web')
@section('style')
    <style>
        .sb-title {
            position: relative;
            top: -12px;
            font-family: Roboto, sans-serif;
            font-weight: 500;
        }

        .sb-title-icon {
            position: relative;
            top: -5px;
        }

        .card-container {
            display: flex;
            height: 500px;
            width: 600px;
        }

        .panel {
            background: white;
            width: 300px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .half-input-container {
            display: flex;
            justify-content: space-between;
        }

        .half-input {
            max-width: 120px;
        }

        .map {
            width: 300px;
        }

        h2 {
            margin: 0;
            font-family: Roboto, sans-serif;
        }

        input {
            height: 30px;
        }

        input {
            border: 0;
            border-bottom: 1px solid black;
            font-size: 14px;
            font-family: Roboto, sans-serif;
            font-style: normal;
            font-weight: normal;
        }

        input:focus::placeholder {
            color: white;
        }

        .button-cta {
            height: 40px;
            width: 40%;
            background: #3367d6;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
            font-family: Roboto, sans-serif;
            border: 0;
            border-radius: 3px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.48);
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <body>
        <div class="cust_login system_page">
            <div class="error-page-int">
                <div class="text-center m-b-md custom-login">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            <div class="row">
                                <h5 class="text-center">Customer Request Monitoring System</h5>
                                <ul class="d-flex system_menu">
                                    <li>
                                        <a class="cust_box flex-column active" data-bs-toggle="modal"
                                            data-bs-target="#sample_tab">
                                            <div class="flex-shrink-0 bgc-purple">
                                                <svg class="svg-purple1" xmlns="http://www.w3.org/2000/svg" width="30"
                                                    height="30" viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_212_4398)">
                                                        <path
                                                            d="M25.9173 7.77781L19.9996 6.08706L18.3089 0.169434H6.47363C5.07295 0.169434 3.9375 1.30489 3.9375 2.70556V26.4888C3.9375 27.8895 5.07295 29.0249 6.47363 29.0249H23.3811C24.7818 29.0249 25.9173 27.8895 25.9173 26.4888V7.77781Z" />
                                                        <path
                                                            d="M8.16373 15.4425C8.63062 15.4425 9.00911 15.064 9.00911 14.5971C9.00911 14.1302 8.63062 13.7517 8.16373 13.7517C7.69685 13.7517 7.31836 14.1302 7.31836 14.5971C7.31836 15.064 7.69685 15.4425 8.16373 15.4425Z"
                                                            fill="#FFF5F5" />
                                                        <path
                                                            d="M8.16373 18.8241C8.63062 18.8241 9.00911 18.4456 9.00911 17.9787C9.00911 17.5118 8.63062 17.1333 8.16373 17.1333C7.69685 17.1333 7.31836 17.5118 7.31836 17.9787C7.31836 18.4456 7.69685 18.8241 8.16373 18.8241Z"
                                                            fill="#FFF5F5" />
                                                        <path
                                                            d="M8.16373 22.2056C8.63062 22.2056 9.00911 21.8272 9.00911 21.3603C9.00911 20.8934 8.63062 20.5149 8.16373 20.5149C7.69685 20.5149 7.31836 20.8934 7.31836 21.3603C7.31836 21.8272 7.69685 22.2056 8.16373 22.2056Z"
                                                            fill="#FFF5F5" />
                                                        <path class="svg-purple2"
                                                            d="M25.9176 7.77781V26.4888C25.9176 27.8895 24.7822 29.0249 23.3815 29.0249H14.9277V0.169434H18.3092L20 6.08706L25.9176 7.77781Z" />
                                                        <path
                                                            d="M20.0003 15.4425H11.5465C11.0793 15.4425 10.7012 15.0644 10.7012 14.5971C10.7012 14.1298 11.0793 13.7517 11.5465 13.7517H20.0003C20.4676 13.7517 20.8457 14.1298 20.8457 14.5971C20.8457 15.0644 20.4676 15.4425 20.0003 15.4425ZM20.0003 18.824H11.5465C11.0793 18.824 10.7012 18.4459 10.7012 17.9786C10.7012 17.5113 11.0793 17.1332 11.5465 17.1332H20.0003C20.4676 17.1332 20.8457 17.5113 20.8457 17.9786C20.8457 18.4459 20.4676 18.824 20.0003 18.824ZM20.0003 22.2055H11.5465C11.0793 22.2055 10.7012 21.8274 10.7012 21.3601C10.7012 20.8928 11.0793 20.5147 11.5465 20.5147H20.0003C20.4676 20.5147 20.8457 20.8928 20.8457 21.3601C20.8457 21.8274 20.4676 22.2055 20.0003 22.2055Z"
                                                            fill="#FFF5F5" />
                                                        <path
                                                            d="M14.9277 22.2055H20C20.4673 22.2055 20.8454 21.8274 20.8454 21.3601C20.8454 20.8928 20.4673 20.5147 20 20.5147H14.9277V22.2055ZM14.9277 18.824H20C20.4673 18.824 20.8454 18.4459 20.8454 17.9786C20.8454 17.5113 20.4673 17.1332 20 17.1332H14.9277V18.824ZM14.9277 15.4425H20C20.4673 15.4425 20.8454 15.0644 20.8454 14.5971C20.8454 14.1298 20.4673 13.7517 20 13.7517H14.9277V15.4425Z"
                                                            fill="#E3E7EA" />
                                                        <path
                                                            d="M25.917 7.77781H19.9993C19.0694 7.77781 18.3086 7.01697 18.3086 6.08706V0.169434C18.5284 0.169434 18.7482 0.253971 18.9003 0.423102L25.6633 7.1861C25.8324 7.33821 25.917 7.55801 25.917 7.77781Z"
                                                            class="svg-purple3" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_212_4398">
                                                            <rect width="28.8555" height="28.8555" fill="white"
                                                                transform="translate(0.5 0.169434)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <h6>Sample Collection Request</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="cust_box flex-column" data-bs-toggle="modal" data-bs-target="#more_tab">
                                            <div class="flex-shrink-0 bgc-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                                    viewBox="0 0 56 56" fill="none">
                                                    <path
                                                        d="M31.4063 12H16.5521C14.5888 12 13 13.5888 13 15.5521V35.5729C13 37.5362 14.5888 39.125 16.5521 39.125H25.0642C24.3473 37.611 23.9766 35.9564 23.9792 34.2812C23.9792 32.7958 24.2633 31.375 24.8058 30.0704C25.0642 29.4117 25.3871 28.7787 25.7617 28.1975C26.5963 26.8982 27.6861 25.7821 28.965 24.9167C29.6238 24.4646 30.3213 24.09 31.0704 23.8058C32.3033 23.2912 33.6226 23.0151 34.9583 22.9921V15.5521C34.9583 13.5888 33.3696 12 31.4063 12Z"
                                                        class="svg-success1" />
                                                    <path
                                                        d="M31.0833 23.6248C31.0833 23.6894 31.0833 23.754 31.0704 23.8057C30.3213 24.0898 29.6238 24.4644 28.965 24.9165H18.1667C17.4563 24.9165 16.875 24.3353 16.875 23.6248C16.875 22.9144 17.4563 22.3332 18.1667 22.3332H29.7917C30.5021 22.3332 31.0833 22.9144 31.0833 23.6248ZM25.7617 28.1973C25.3871 28.7786 25.0642 29.4115 24.8058 30.0703C24.7542 30.0832 24.6896 30.0832 24.625 30.0832H18.1667C17.4563 30.0832 16.875 29.5019 16.875 28.7915C16.875 28.0811 17.4563 27.4998 18.1667 27.4998H24.625C25.1158 27.4998 25.555 27.784 25.7617 28.1973ZM23.3333 19.7498H18.1667C17.8241 19.7498 17.4956 19.6138 17.2533 19.3715C17.0111 19.1293 16.875 18.8007 16.875 18.4582C16.875 18.1156 17.0111 17.7871 17.2533 17.5448C17.4956 17.3026 17.8241 17.1665 18.1667 17.1665H23.3333C23.6759 17.1665 24.0044 17.3026 24.2467 17.5448C24.4889 17.7871 24.625 18.1156 24.625 18.4582C24.625 18.8007 24.4889 19.1293 24.2467 19.3715C24.0044 19.6138 23.6759 19.7498 23.3333 19.7498Z"
                                                        fill="#F1F9FF" />
                                                    <path
                                                        d="M35.2812 43C30.4737 43 26.5625 39.0888 26.5625 34.2812C26.5625 29.4737 30.4737 25.5625 35.2812 25.5625C40.0888 25.5625 44 29.4737 44 34.2812C44 39.0888 40.0888 43 35.2812 43Z"
                                                        class="svg-success2" />
                                                    <path
                                                        d="M35.2799 39.125C34.9374 39.125 34.6088 38.9889 34.3666 38.7467C34.1244 38.5044 33.9883 38.1759 33.9883 37.8333V30.7292C33.9883 30.3866 34.1244 30.0581 34.3666 29.8158C34.6088 29.5736 34.9374 29.4375 35.2799 29.4375C35.6225 29.4375 35.9511 29.5736 36.1933 29.8158C36.4355 30.0581 36.5716 30.3866 36.5716 30.7292V37.8333C36.5716 38.1759 36.4355 38.5044 36.1933 38.7467C35.9511 38.9889 35.6225 39.125 35.2799 39.125Z"
                                                        fill="white" />
                                                    <path
                                                        d="M38.8333 35.5731H31.7292C31.3866 35.5731 31.0581 35.437 30.8158 35.1948C30.5736 34.9525 30.4375 34.624 30.4375 34.2814C30.4375 33.9388 30.5736 33.6103 30.8158 33.3681C31.0581 33.1258 31.3866 32.9897 31.7292 32.9897H38.8333C39.1759 32.9897 39.5044 33.1258 39.7467 33.3681C39.9889 33.6103 40.125 33.9388 40.125 34.2814C40.125 34.624 39.9889 34.9525 39.7467 35.1948C39.5044 35.437 39.1759 35.5731 38.8333 35.5731Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <h6>More</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="cust_box flex-column" data-bs-toggle="modal"
                                            data-bs-target="#update_detail">
                                            <div class="flex-shrink-0 bgc-sky">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                                    viewBox="0 0 56 56" fill="none">
                                                    <path
                                                        d="M41.9708 40.2427V40.2546C38.2745 43.6066 33.3678 45.6484 27.9859 45.6484C22.603 45.6484 17.6963 43.6066 14 40.2546V40.2427C14 34.6675 17.2623 29.8551 21.9813 27.6091C23.7549 29.3781 25.8315 30.3312 27.9859 30.3312C30.1412 30.3312 32.2169 29.3781 33.9913 27.6091C38.7104 29.8551 41.9708 34.6675 41.9708 40.2427Z"
                                                        class="svg-sky" />
                                                    <path
                                                        d="M27.9869 10C32.2591 10 35.7229 13.4628 35.7229 17.735C35.7229 22.0082 32.2591 27.8516 27.9869 27.8516C23.7147 27.8516 20.251 22.0082 20.251 17.735C20.251 13.4628 23.7147 10 27.9869 10Z"
                                                        fill="#FCD09F" />
                                                </svg>
                                            </div>
                                            <h6>Update Customer</h6>
                                        </a>
                                    </li>
                                </ul>
                                <div class="col-12">
                                    <a class="btn-left d-flex align-items-center justify-content-center gap-3"
                                        href="{{ route('cust_login') }}">
                                        <span class="d-flex back-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z">
                                                </path>
                                            </svg>
                                        </span>
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="sample_tab" tabindex="-1" aria-labelledby="sample_tab" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="personalmodalLabel"></h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="POST" id="send_sample_request" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 mb-3">
                                <label for="inputtitle1" class="form-label">Sample Collection Date</label>
                                <input class="form-control" type="date" id="sample_date" name="sample_date"
                                    placeholder="Enter date">
                                <span class="text-danger" id="sample_date_error"></span>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="inputtitle1" class="form-label">No. of Sample</label>
                                <input class="form-control" type="number" id="sample_no" name="sample_no"
                                    placeholder="Enter No. of Sample">
                                <span class="text-danger" id="sample_no_error"></span>
                            </div>
                            <div class="col-lg-12 mt-2 mb-3">
                                <div class="contact_list">
                                    <h6>Sample Collection Form</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-6 mb-3">
                                            <label for="inputtitle1" class="form-label">Company Name</label>
                                            <input class="form-control" type="text" id="company_name"
                                                name="company_name" placeholder="Enter Company Name">
                                            <span class="text-danger" id="company_name_error"></span>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="inputtitle1" class="form-label">Mobile No.</label>
                                            <input class="form-control" type="number" id="mobile" name="mobile"
                                                placeholder="Enter Mobile No.">
                                            <span class="text-danger" id="mobile_error"></span>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Address</label>
                                            <div class="input-group address_info">
                                                <textarea type="text" class="form-control w-100" id="address" name="address" value="A-12,abc soc,surat-395006"
                                                    placeholder="Enter Address" aria-label="Map  location" aria-describedby="basic-addon2">
                                                </textarea>

                                                <span class="input-group-text" id="basic-addon2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35"
                                                        viewBox="0 0 25 35" fill="none" data-bs-toggle="modal"
                                                        data-bs-target="#location">
                                                        <path
                                                            d="M24.2458 8.54433L24.2408 8.54808C24.3458 8.83808 24.4433 9.13183 24.5271 9.43183C24.4421 9.13183 24.3508 8.83433 24.2458 8.54433ZM12.5009 0.288086L3.66211 3.95058L8.74085 9.02808C9.73767 8.04894 11.0802 7.50204 12.4774 7.5059C13.8747 7.50976 15.2141 8.06408 16.2055 9.04871C17.1969 10.0334 17.7603 11.369 17.7737 12.7662C17.7871 14.1634 17.2494 15.5096 16.2771 16.5131L23.7508 9.03808L24.2408 8.54808C23.3717 6.13062 21.7778 4.04018 19.6768 2.56193C17.5757 1.08369 15.0698 0.289631 12.5009 0.288086Z"
                                                            fill="#4285F4" />
                                                        <path
                                                            d="M12.5 18.0919C11.4501 18.0916 10.4238 17.7802 9.55074 17.1969C8.67769 16.6137 7.99704 15.7849 7.59473 14.8151C7.19242 13.8453 7.0865 12.778 7.29034 11.7481C7.49417 10.7181 7.99863 9.77166 8.74 9.02821L3.66126 3.94946C2.49875 5.10886 1.57684 6.48658 0.948515 8.00344C0.320193 9.52029 -0.00215074 11.1464 1.07992e-05 12.7882C1.07992e-05 18.2957 2.83126 21.7469 6.16251 25.2882C6.38626 25.5169 6.57125 25.7694 6.7825 26.0069L16.2325 16.5557C15.2403 17.5412 13.8984 18.0939 12.5 18.0932V18.0919Z"
                                                            fill="#FFBA00" />
                                                        <path
                                                            d="M12.5 0.288086C9.18481 0.288086 6.00539 1.60505 3.66119 3.94925C1.31698 6.29345 2.44003e-05 9.47287 2.44003e-05 12.7881C-0.00272693 14.2546 0.227214 15.7123 0.681274 17.1068L16.7438 1.04434C15.3839 0.54732 13.9478 0.291399 12.5 0.288086Z"
                                                            fill="#0066DA" />
                                                        <path
                                                            d="M13.626 33.9004C14.7613 30.7411 16.4699 27.8185 18.666 25.2792C22.2472 21.6417 24.9997 18.2955 24.9997 12.788C24.9969 11.3398 24.7414 9.90328 24.2447 8.54297L6.78223 26.0055C8.79247 28.2908 10.3194 30.9594 11.271 33.8504C11.3511 34.0965 11.5058 34.3116 11.7135 34.4659C11.9213 34.6202 12.172 34.706 12.4307 34.7115C12.6895 34.717 12.9435 34.6419 13.1577 34.4966C13.3718 34.3512 13.5355 34.1429 13.626 33.9004Z"
                                                            fill="#00AC47" />
                                                        <path opacity="0.5"
                                                            d="M6.16292 25.288C6.38667 25.5168 6.57167 25.7693 6.78292 26.0068C6.57167 25.7693 6.38542 25.5168 6.16292 25.288Z"
                                                            fill="#0066DA" />
                                                        <path
                                                            d="M11.4955 34.2496C11.5205 34.2809 11.5505 34.3021 11.578 34.3296C11.5505 34.3021 11.5205 34.2796 11.4955 34.2496ZM11.2718 33.8509C11.0159 33.0975 10.7284 32.3655 10.4093 31.6546C10.7243 32.3671 11.0168 33.0971 11.2718 33.8509ZM11.9093 34.5709C11.8805 34.5584 11.8518 34.5459 11.8243 34.5296C11.8518 34.5459 11.8805 34.5571 11.9093 34.5709ZM17.1405 27.1921C16.828 27.6259 16.5555 28.0821 16.2743 28.5346C16.5543 28.0821 16.8293 27.6271 17.1405 27.1921ZM13.8093 33.4684C14.1018 32.7292 14.4168 32.003 14.7543 31.2896C14.4155 32.0021 14.1018 32.7296 13.8093 33.4684Z"
                                                            fill="white" />
                                                        <path
                                                            d="M3.66127 3.95068C2.49891 5.10993 1.57709 6.48745 0.948769 8.00408C0.320452 9.52071 -0.00197238 11.1465 2.44003e-05 12.7882C-0.00272693 14.2547 0.227214 15.7124 0.681274 17.1069L8.75002 9.03818L3.66127 3.95068Z"
                                                            fill="#EA4435" />
                                                    </svg>

                                                </span>
                                            </div>
                                            <span class="text-danger" id="address_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Upload Document</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="image" name="image">
                                </div>
                                <span class="text-danger" id="image_error"></span>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" id="save_info"
                                    name="save_info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="more_tab" tabindex="-1" aria-labelledby="more_tab" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="personalmodalLabel">More</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="email-form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 mb-3">
                                <label for="inputtitle1" class="form-label">Select</label>
                                <select class="form-select" name="more_selection" id="more_selection">
                                    <option value="">Select Option</option>
                                    <option value="Report Reprint">Report Reprint</option>
                                    <option value="Report Correction">Report Correction</option>
                                    <option value="Sample Return Request">Sample Return Request</option>
                                    <option value="Technical Assistance">Technical Assistance</option>
                                    <option value="Accounting Assistance">Accounting Assistance</option>
                                    <option value="Complaint">Complaint</option>
                                    <option value="Request For Document">Request For Document</option>
                                </select>
                                <span class="text-danger" id="more_selection_error"></span>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="inputtitle1" class="form-label">Remark / Lab Id</label>
                                <input class="form-control" type="text" id="remark" name="remark"
                                    placeholder="Enter Remark / lab id">
                                <span class="text-danger" id="remark_error"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Upload Document</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                </div>
                                <span class="text-danger" id="upload_img_error"></span>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="update_detail" tabindex="-1" aria-labelledby="update_detail" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="personalmodalLabel">Update Customer Details</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="row" id="sign_up_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sign_up_id" id="sign_up_id" value="">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer Name</label>
                                <input type="text" placeholder="Enter Customer Name" name="cust_name" id="cust_name"
                                    class="form-control" value="{{ $customer->cust_name }}">
                                <span class="text-danger" id="cust_name_error"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" placeholder="Enter City" name="city" id="city"
                                    class="form-control" value="{{ $customer->city }}">
                                <span class="text-danger" id="city_error"></span>
                                {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea type="text" placeholder="Enter Address" name="address" id="address" class="form-control">{{ $customer->address }}</textarea>
                                <span class="text-danger" id="address_error"></span>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="form-label">GST No.</label>
                                <input type="text" placeholder="Enter GST NO." name="gst_no" id="gst_no"
                                    class="form-control" value="{{ $customer->gst_no }}">
                                <span class="text-danger" id="gst_no_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Sample Frequencies</label>
                                <select class="form-select" name="sample_frequencies_id" id="sample_frequencies_id"
                                    value="{{ $customer->sample_frequencies_id ?? 'None' }}">
                                    <option value="">Select Sample Frequencies</option>
                                    @foreach ($SampleFrequencies as $value)
                                        <option value="{{ $value['id'] }}"
                                            @if ($customer->sample_frequencies_id == $value['id']) selected @endif>{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="sample_frequencies_id_error"></span>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Google Map Location</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="g_map_location" id="g_map_location"
                                        placeholder="Enter Map location" aria-label="Map location"
                                        aria-describedby="basic-addon2" value="{{ $customer->g_map_location }}">
                                    <span class="text-danger" id="g_map_location_error"></span>
                                    <a href="https://www.google.com/maps/" target="_blank">
                                        <span class="input-group-text user-select" id="basic-addon2">
                                            <img class="img-fluid me-1" src="{{ asset('assets/img/map-icon.png') }}"
                                                alt="map">
                                            Select Location
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="contact_list" id="contect">
                                    <h6>Contact List</h6>
                                    <table class="table sign_up_table">
                                        <thead>
                                            <tr>
                                                <th>Contact Person Name</th>
                                                <th>Mobile No.</th>
                                                <th>Email Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customersname as $contact)
                                                <tr>
                                                    <td>
                                                        <input type="text" placeholder="Enter contact person name"
                                                            title="Enter contact person name" name="person_name[]"
                                                            id="person_name" class="form-control border-0 p-0"
                                                            value="{{ $contact->person_name }}">
                                                        <span class="text-danger" id="person_name_error"></span>
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Enter mobile no."
                                                            title="Enter mobile no." name="mobile_no[]" id="mobile_no"
                                                            class="form-control border-0 p-0"
                                                            value="{{ $contact->mobile_no }}">
                                                        <span class="text-danger" id="mobile_error"></span>

                                                    </td>
                                                    <td style="min-width: 166px";>
                                                        <input type="email" placeholder="Enter email id"
                                                            title="Enter email id" name="email_id[]" id="email_id"
                                                            class="form-control border-0 p-0"
                                                            value="{{ $contact->email_id }}">
                                                        <span class="text-danger" id="email_error"></span>
                                                    </td>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-light-warning px-3" id="add-contact">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337" stroke="#802B81"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg> Add
                                    </a>
                                    <div class="col-lg-6 edit-form">
                                        <label for="inputtitle1" class="form-label">Is Active</label>
                                        <select class="form-select" name="is_active" id="is_active">
                                            <option value="1">Is active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="text-danger" id="is_active_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary loginbtn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- map added --}}
        <div class="modal fade" id="location" tabindex="-1" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header align-items-center mb-3">
                        <h2 class="modal-title mb-0" id="label">location</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="map-canvas"></div>

                        <div class="modal-body">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6583232.455855462!2d74.40831572851275!3d16.64335452247996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1693823367525!5m2!1sen!2sin"
                                width="760" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <script>
                                function initMap() {
                                    const CONFIGURATION = {
                                        "ctaTitle": "Checkout",
                                        "mapOptions": {
                                            "center": {
                                                "lat": 37.4221,
                                                "lng": -122.0841
                                            },
                                            "fullscreenControl": true,
                                            "mapTypeControl": false,
                                            "streetViewControl": true,
                                            "zoom": 11,
                                            "zoomControl": true,
                                            "maxZoom": 22,
                                            "mapId": ""
                                        },
                                        "mapsApiKey": "YOUR_API_KEY_HERE",
                                        "capabilities": {
                                            "addressAutocompleteControl": true,
                                            "mapDisplayControl": true,
                                            "ctaControl": true
                                        }
                                    };
                                    const componentForm = [
                                        'location',
                                        'locality',
                                        'administrative_area_level_1',
                                        'country',
                                        'postal_code',
                                    ];

                                    const getFormInputElement = (component) => document.getElementById(component + '-input');
                                    const map = new google.maps.Map(document.getElementById("gmp-map"), {
                                        zoom: CONFIGURATION.mapOptions.zoom,
                                        center: {
                                            lat: 37.4221,
                                            lng: -122.0841
                                        },
                                        mapTypeControl: false,
                                        fullscreenControl: CONFIGURATION.mapOptions.fullscreenControl,
                                        zoomControl: CONFIGURATION.mapOptions.zoomControl,
                                        streetViewControl: CONFIGURATION.mapOptions.streetViewControl
                                    });
                                    const marker = new google.maps.Marker({
                                        map: map,
                                        draggable: false
                                    });
                                    const autocompleteInput = getFormInputElement('location');
                                    const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
                                        fields: ["address_components", "geometry", "name"],
                                        types: ["address"],
                                    });
                                    autocomplete.addListener('place_changed', function() {
                                        marker.setVisible(false);
                                        const place = autocomplete.getPlace();
                                        if (!place.geometry) {
                                            // User entered the name of a Place that was not suggested and
                                            // pressed the Enter key, or the Place Details request failed.
                                            window.alert('No details available for input: \'' + place.name + '\'');
                                            return;
                                        }
                                        renderAddress(place);
                                        fillInAddress(place);
                                    });

                                    function fillInAddress(place) { // optional parameter
                                        const addressNameFormat = {
                                            'street_number': 'short_name',
                                            'route': 'long_name',
                                            'locality': 'long_name',
                                            'administrative_area_level_1': 'short_name',
                                            'country': 'long_name',
                                            'postal_code': 'short_name',
                                        };
                                        const getAddressComp = function(type) {
                                            for (const component of place.address_components) {
                                                if (component.types[0] === type) {
                                                    return component[addressNameFormat[type]];
                                                }
                                            }
                                            return '';
                                        };
                                        getFormInputElement('location').value = getAddressComp('street_number') + ' ' +
                                            getAddressComp('route');
                                        for (const component of componentForm) {
                                            // Location field is handled separately above as it has different logic.
                                            if (component !== 'location') {
                                                getFormInputElement(component).value = getAddressComp(component);
                                            }
                                        }
                                    }

                                    function renderAddress(place) {
                                        map.setCenter(place.geometry.location);
                                        marker.setPosition(place.geometry.location);
                                        marker.setVisible(true);
                                    }
                                }
                            </script>

                            <div class="card-container">
                                <div class="panel">
                                    <div>
                                        <img class="sb-title-icon"
                                            src="https://fonts.gstatic.com/s/i/googlematerialicons/location_pin/v5/24px.svg"
                                            alt="">
                                        <span class="sb-title">Address Selection</span>
                                    </div>
                                    <input type="text" placeholder="Address" id="location-input" />
                                    <input type="text" placeholder="Apt, Suite, etc (optional)" />
                                    <input type="text" placeholder="City" id="locality-input" />
                                    <div class="half-input-container">
                                        <input type="text" class="half-input" placeholder="State/Province"
                                            id="administrative_area_level_1-input" />
                                        <input type="text" class="half-input" placeholder="Zip/Postal code"
                                            id="postal_code-input" />
                                    </div>
                                    <input type="text" placeholder="Country" id="country-input" />
                                    <button class="button-cta">Checkout</button>
                                </div>
                                <div class="map" id="gmp-map"></div>
                            </div>
                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cABC"
                                async defer></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-canvas"></div>


    </body>
@endsection


@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-contact');
            const contactFieldsContainer = document.getElementById('contect');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `<table class="table sign_up_table">
                                <tr>
                                    <td id="contect" >
                                        <input type="text" placeholder="Enter contact person name"
                                            title="Enter contact person name" name="person_name[]"
                                            id="person_name" class="form-control border-0 p-0">
                                        <span class="text-danger" id="person_name_error"></span>

                                    </td>
                                    <td>
                                        <input type="number" placeholder="Enter mobile no."
                                            title="Enter mobile no." name="mobile_no[]" id="mobile_no"
                                            class="form-control border-0 p-0">
                                        <span class="text-danger" id="mobile_no_error"></span>

                                    </td>
                                    <td>
                                        <input type="email" placeholder="Enter email id"
                                            title="Enter email id" name="email_id[]" id="email_id"
                                            class="form-control border-0 p-0">
                                        <span class="text-danger" id="email_id_error"></span>
                                    </td>
                                </tr>
                        </table>
                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                contactFieldsContainer.appendChild(newContactField);
            });
        });




        var token = "{{ csrf_token() }}";
        $('#send_sample_request').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');


            $.ajax({
                type: 'POST',
                url: "{{ route('send_sample_request') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#ajaxModel').modal('hide');
                        toastr.success(data.msg);
                        setTimeout(
                            function() {
                                window.location.href = "{{ route('cust_system') }}";
                            }, 2000);
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });

        $('#sign_up_form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('customer_edit') }}",
                data: $(this).serialize(),
                success: function(response) {
                    toastr.success(response.msg);
                    setTimeout(
                        function() {
                            window.location.href = "{{ route('cust_system') }}";
                        }, 2000);
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            var dataId = key.replace('.', '_');
                            $("#" + dataId + "_error").text(val[0]);
                        });
                    }
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        });


        // $('#sign_up_form').submit(function(e) {
        //             e.preventDefault();
        //         $.ajax({
        //     type: 'POST',
        //     url: '{{ route('customer_edit') }}',
        //     headers: {
        //                     'X-CSRF-Token': csrftoken,
        //                 },
        //     data: {
        //         sign_up_id: sign_up_id,
        //         // custmoer_id: custmoer_id,
        //         city: city,
        //         address: address,
        //         gst_no: gst_no,
        //         sample_frequencies_id: sample_frequencies_id,
        //         g_map_location: g_map_location,
        //         is_active: is_active,
        //         person_name: person_name,
        //         mobile_no: mobile_no,
        //         email_id: email_id,

        //         // Add other data you need to update here
        //     },
        //     success: function(response) {
        //         if (response.status === 200) {
        //             // Success, handle the response as needed
        //         } else {
        //             // Error occurred, handle the error
        //         }
        //     },
        //     error: function(xhr, textStatus, errorThrown) {
        //         // Handle AJAX error
        //     }
        // });
        // });

        $('#email-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('cust_system_email') }}',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            var dataId = key.replace('.', '_');
                            $("#" + dataId + "_error").text(val[0]);
                        });
                    }
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
