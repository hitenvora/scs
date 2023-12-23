@extends('layout.web')
@section('style')
@endsection

@section('content')

    <body>
        <div class="all-content-wrapper">
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-1 col-3 logo-main">
                                <a href="{{ url('/') }}"><img class="main-logo"
                                        src="{{ asset('assets/img/logo/logo1.png') }}" alt="" /></a>
                            </div>

                            <div class="col-md-11 col-9">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                                                class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                <div class="d-flex gap-3 align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('assets/img/profile.png') }}" alt="" />
                                                    </div>
                                                    <div class="flex-grow-1 d-flex flex-column">
                                                        <h5 class="admin-name m-0">Olivia Rhye</h5>
                                                        <span>SMS</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu">
                                                <li><a href="{{ 'profile' }}"><span
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
                                        <div class="col-lg-4">
                                            <div class="breadcome-heading d-flex align-items-center">
                                                <a class="d-flex back-btn bg-white" href="{{ 'list-of-route' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <h3>Shapar Route List</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-b-23">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table id="product-table-id" class="product-table">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Company Name</th>
                                                <th class="text-center">Contact No.</th>
                                                <th class="text-center">Map Location</th>
                                                <th class="text-center">Set Order</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a class="name_text" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#company_view">XYZ</a>
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('assets/img/wp.png') }}" alt="map">
                                                </td>
                                                <td>
                                                    <a href="#" class="location">
                                                        <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex set_order">
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M10.375 5.16667L6 1M6 1L1.625 5.16667M6 1L6 11"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Up
                                                        </a>
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M1.625 6.83333L6 11M6 11L10.375 6.83333M6 11L6 1"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Down
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a class="name_text" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#company_view">ABC</a>
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('assets/img/wp.png') }}" alt="map">
                                                </td>
                                                <td>
                                                    <a href="#" class="location">
                                                        <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex set_order">
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M10.375 5.16667L6 1M6 1L1.625 5.16667M6 1L6 11"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Up
                                                        </a>
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M1.625 6.83333L6 11M6 11L10.375 6.83333M6 11L6 1"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Down
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a class="name_text" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#company_view">PQR</a>
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('assets/img/wp.png') }}" alt="map">
                                                </td>
                                                <td>
                                                    <a href="#" class="location">
                                                        <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex set_order">
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M10.375 5.16667L6 1M6 1L1.625 5.16667M6 1L6 11"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Up
                                                        </a>
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M1.625 6.83333L6 11M6 11L10.375 6.83333M6 11L6 1"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Down
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a class="name_text" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#company_view">LMN</a>
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('assets/img/wp.png') }}" alt="map">
                                                </td>
                                                <td>
                                                    <a href="#" class="location">
                                                        <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex set_order">
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M10.375 5.16667L6 1M6 1L1.625 5.16667M6 1L6 11"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Up
                                                        </a>
                                                        <a href="#" class="btn btn-light">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none">
                                                                <path d="M1.625 6.83333L6 11M6 11L10.375 6.83333M6 11L6 1"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>Down
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade m-width" id="company_view" tabindex="-1" aria-labelledby="company_view"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="personalmodalLabel">Customer Details
                            </h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row" method="post" id="list_route">
                                @csrf
                                <input type="hidden" name="list_route_id" id="list_route_id" value="">
                                <div class="col-xl-12 d-flex gap-5">
                                    <div class="form-check checkbox">
                                        <input class="form-check-input" id="solid3" type="checkbox">
                                        <label class="form-check-label ms-2 mt-1" for="solid3">Sample Collected</label>
                                    </div>
                                    <div class="form-check checkbox">
                                        <input class="form-check-input" id="solid3" type="checkbox" checked="">
                                        <label class="form-check-label ms-2 mt-1" for="solid3">Sample Not
                                            Available</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="inputtitle1" class="form-label">Change Route</label>
                                    <select class="form-select" name="route_list_id" id="route_list_id">
                                        <option value="">Select Route List</option>
                                        @foreach ($routeList as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                 
                                    <span class="text-danger" id="route_error"></span>

                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Upload Document</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control w-100" id="document" name="document">
                                        <span class="input-group-text" id="basic-addon2">
                                            Choose File
                                        </span>
                                    </div>
                                    <span class="text-danger" id="document_error"></span>
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
        </div>
    </body>
@endsection


@section('script')
    <script>
        var token = "{{ csrf_token() }}";
        $('#list_route').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('list_of_route_insert') }}",
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
                                window.location.href = "{{ route('list_route') }}";
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

        $(document).on('click', '.name_text', function() {
            var sampleId = $(this).data("id");
            console.log('sampleId=', sampleId);
            $("#list_route_id").val(sampleId);
            $('#company_view').modal('show');
        });

        var token = "{{ csrf_token() }}";
        var dataTable = $('.product-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                search: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="#5E5873" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                searchPlaceholder: "Search",
                oPaginate: {
                    sNext: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    sPrevious: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                },
            },
            ajax: {
                url: "{{ route('list_route_get') }}",
                data: function(d) {
                    d._token = token;
                },
                type: 'POST',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'contect_icon',
                    name: 'contect_icon'
                },
                // {
                //     data: 'sample_collected_date',
                //     name: 'sample_collected_date'
                // },

                // {
                //     data: 'address',
                //     name: 'address'
                // },
                // {
                //     data: 'mobile',
                //     name: 'mobile'
                // },
                {
                    data: 'map_icon',
                    name: 'map_icon'
                },
                // {
                //     data: 'dropdown',
                //     name: 'dropdown'
                // },
                // {
                //     data: 'eye_icon',
                //     name: 'eye_icon'  
                // },
                // {
                //     data: 'email_id',
                //     name: 'email_id'
                // },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}

        });
    </script>
@endsection
