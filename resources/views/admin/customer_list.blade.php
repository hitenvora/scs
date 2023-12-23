@extends('layout.layout')
@section('style')
@endsection

@section('content')
@section('nav-title')
    Customer List
@endsection
@include('navbar.navbar')

<body>
    <div class="mg-b-23">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table id="customer-table-id" class="customer-table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>GST No.</th>
                                        <th class="text-center">Google Map Location</th>
                                        <th>Sample Frequency</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cusomer_view" tabindex="-1" aria-labelledby="cusomer_view" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="personalmodalLabel">Customer Name</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="cust_details">
                        <tbody>
                            <tr>
                                <th>Customer Name :</th>
                                <td><span class="view-name"></span></td>
                            </tr>
                            <tr>
                                <th>City :</th>
                                <td><span class="view-city"></span></td>

                            </tr>
                            <tr>
                                <th>Address :</th>
                                <td><span class="view-address"></span></td>

                            </tr>
                            <tr>
                                <th>Google Map Location :</th>
                                <td>
                                    <a href="" class="view-map-location" target="_blank">View Location</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Sample Frequency :</th>
                                <td><span class="view-sample_frequency"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="contact_list">
                        <h6>Contact List</h6>
                        <div class="table_data p-0">
                            <table class="table sign_up_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email Id</th>
                                    </tr>
                                </thead>
                                <tbody id="contactData">
                                    <tr>

                                    </tr>
                                </tbody>
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
    var dataTable = $('.customer-table').DataTable({
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
            url: "{{ route('get_customer_list') }}",
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
                data: 'cust_name',
                name: 'cust_name'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'gst_no',
                name: 'gst_no'
            },
            {
                data: 'map_icon',
                name: 'map_icon'
            },
            {
                data: 'sample_frequency_name',
                name: 'sample_frequency_name'
            },
            {
                data: 'eye_icon',
                name: 'eye_icon'
            },
        ],
        'columnDefs': [
            {
                "targets": 5,
                "className": "text-center",
            },
            {
                "targets": 7,
                "className": "text-center",
                "width": "4%"
            }
        ],
        drawCallback: function() {},
        initComplete: function(response) {}
    });

    function viewSell(id) {
        $('span[id$="_error"]').text('');
        $('.view-name').text('');
        $('.view-city').text("");
        $('.view-address').text("");
        $('.view-map-location').attr('href', "");
        $('.view-sample_frequency').text("");
        $.ajax({
            type: 'GET',
            url: "{{ url('admin/get-customer-details') }}/" + id,
            headers: {
                'X-CSRF-Token': token,
            },
            dataType: "json",
            success: (data) => {
                console.log('id', id);
                $('.view-name').text(data.data.cust_name);
                $('.view-city').text(data.data.city);
                $('.view-address').text(data.data.address);
                $('.view-map-location').attr('href', data.data.g_map_location);
                // $('.view-g_map_location ').text(data.data.g_map_location);
                $('.view-sample_frequency').text(data.data.sample_frequency.name);
                var contactDataHtml = '';
                if (data.data.contact && data.data.contact.length > 0) {
                    $.each(data.data.contact, function(index, contact) {
                        contactDataHtml += '<tr>' +
                            '<td>' + contact.person_name + '</td>' +
                            '<td>' + contact.mobile_no + '</td>' +
                            '<td>' + contact.email_id + '</td>' +
                            '</tr>';
                    });
                } else {
                    contactDataHtml = '<tr><td colspan="3">No contact data available.</td></tr>';
                }
                $('#contactData').html(contactDataHtml);
                $('.modal-title').text('View Custmoer');
                $('.edit-form').show();
                // set edit value
                $('#cusomer_view').modal('show');
            },
            error: function(response) {
                toastr.error(response.msg);
            }
        });
    }
</script>
@endsection
