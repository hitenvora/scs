@extends('layout.layout')
@section('style')
@endsection

@section('content')

@section('nav-title')
    Unassigned List
@endsection

@include('navbar.navbar')

<body>
    <div class="mg-b-23">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table id="unssigned-list-table-id" class="unssigned-list-table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Sample Collection Date</th>
                                        <th>No. of Sample </th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Mobile No.</th>
                                        <th>G-Map Location</th>
                                        <th>Assign Route</th>
                                        <th>Upload Document</th>
                                    </tr>
                                </thead>
                                {{-- <div class="col-sm-6 mb-3">
                                    <label class="form-label">Sample Frequency</label>
                                    <select class="form-select" name="route_list" id="route_list">
                                        <option value="">Select Route List</option>
                                        @foreach ($route_list as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="sample_frequencies_id_error"></span>
                                </div> --}}
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
    var dataTable = $('.unssigned-list-table').DataTable({
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
            url: "{{ route('get_unassigned_list') }}",
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
                data: 'dropdown',
                name: 'dropdown'
            },
            {
                data: 'eye_icon',
                name: 'eye_icon'
            },
        ],
        drawCallback: function() {},
        initComplete: function(response) {}

    });


    $(document).on('change', '.route-list', function() {
        console.log('route-list change');
        // Get the selected value from the dropdown
        var selectedValue = $(this).val();
        var recordId = $(this).data('id');

        // Make an Ajax request to update the column
        $.ajax({
            url: '{{ route('update_column') }}', // Define your route
            method: 'POST',
            headers: {
                'X-CSRF-Token': token,
            },
            data: {
                selectedValue: selectedValue,

            },
        });
    });


    // $(document).ready(function() {
    //     $('#route_list').on('change', function() {
    //         // Get the selected value from the dropdown
    //         var selectedValue = $(this).val();

    //         // Make an Ajax request to update the column
    //         $.ajax({
    //             url: '{{ route('update_column') }}', // Define your route
    //             method: 'POST',
    //             data: {
    //                 selectedValue: selectedValue
    //             },
    //             success: function(response) {
    //                 // Handle success (e.g., show a success message)
    //                 console.log('Column updated successfully');
    //             },
    //             error: function(xhr, status, error) {
    //                 // Handle errors (e.g., show an error message)
    //                 console.error('Error updating column:', error);
    //             }
    //         });
    //     });
    // });
</script>
@endsection
