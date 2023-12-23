@extends('layout.layout')
@section('style')
@endsection

@section('content')

@section('nav-title')
    Collection Pending
@endsection

@include('navbar.navbar')

<body>
    <div class="mg-b-23">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table id="collection-pending-list-table-id" class="collection-pending-list-table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Sample collection date</th>
                                        <th>No. of samples</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Mobile No.</th>
                                        <th>G-Map Location</th>
                                        <th>Route</th>
                                        <th>Upload Document</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>28/08/2023</td>
                                        <td>50</td>
                                        <td>
                                            <a class="name_text" href="#">XYZ</a>
                                        </td>
                                        <td>-</td>
                                        <td>+91 1238541122</td>
                                        <td>
                                            <a href="#" class="location">
                                                <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                            </a>
                                        </td>
                                        <td>Metoda Route</td>
                                        <td>
                                            <a title="View" href="{{ asset('assets/img/sample.png') }}"
                                                target="_blank">
                                                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>28/08/2023</td>
                                        <td>50</td>
                                        <td>
                                            <a class="name_text" href="#">XYZ</a>
                                        </td>
                                        <td>-</td>
                                        <td>+91 1238541122</td>
                                        <td>
                                            <a href="#" class="location">
                                                <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                            </a>
                                        </td>
                                        <td>Metoda Route</td>
                                        <td>
                                            <a title="View" href="{{ asset('assets/img/sample.png') }}"
                                                target="_blank">
                                                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>28/08/2023</td>
                                        <td>50</td>
                                        <td>
                                            <a class="name_text" href="#">XYZ</a>
                                        </td>
                                        <td>-</td>
                                        <td>+91 1238541122</td>
                                        <td>
                                            <a href="#" class="location">
                                                <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                            </a>
                                        </td>
                                        <td>Metoda Route</td>
                                        <td>
                                            <a title="View" href="{{ asset('assets/img/sample.png') }}"
                                                target="_blank">
                                                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>28/08/2023</td>
                                        <td>50</td>
                                        <td>
                                            <a class="name_text" href="#">XYZ</a>
                                        </td>
                                        <td>-</td>
                                        <td>+91 1238541122</td>
                                        <td>
                                            <a href="#" class="location">
                                                <img src="{{ asset('assets/img/map-icon.png') }}" alt="map">
                                            </a>
                                        </td>
                                        <td>Metoda Route</td>
                                        <td>
                                            <a title="View" href="{{ asset('assets/img/sample.png') }}"
                                                target="_blank">
                                                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
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
    </div>

</body>
@endsection

@section('script')
<script>
    var token = "{{ csrf_token() }}";
    var dataTable = $('.collection-pending-list-table').DataTable({
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
            url: "{{ route('get_collection_pending_list') }}",
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
                data: 'sample_date',
                name: 'sample_date'
            },
            {
                data: 'sample_no',
                name: 'sample_no'
            },
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'mobile',
                name: 'mobile'
            },
            {
                data: 'map_icon',
                name: 'map_icon'
            },
            {
                data: 'route_name',
                name: 'route_name'
            },
            {
                data: 'eye_icon',
                name: 'eye_icon'
            },
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
