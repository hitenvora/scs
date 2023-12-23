@extends('layout.layout')

@section('content')
    @include('navbar.navbar')

    <body>
        <div class="all-content-wrapper">
            <div class="header-advance-area">
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="breadcome-heading">
                                                <h3>Add Routes</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                            <a class="btn btn-primary ms-3 add-route">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327"
                                                        stroke="white" stroke-width="1.67" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                Add Routes
                                            </a>
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
                                        <table id="add_route-table-id" class="add_route-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
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

                <div class="modal fade order-modal" id="ajaxModel" tabindex="-1" aria-labelledby="suppliertabs"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="suppliertabs">Add Route</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="add-route-form">
                                    @csrf
                                    <input type="hidden" name="route_id" id="route_id">
                                    <div class="col-lg-8">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name">
                                        <span class="text-danger" id="name_error"></span>
                                    </div>
                                    <div class="col-12 text-center" style="margin-top: 30px">
                                        <button type="submit" class="btn btn-primary loginbtn h-100" id="btn_save_client"
                                            name="sub_client">Save</button>
                                    </div>
                                </form>
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

        $('.edit-form').hide();
        $(document).on('click', '.add-route', function() {
            $('.modal-title').text('Add Route');
            $('#route_id').val('');
            $("#add-route-form")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        $('#add-route-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('route_list_insert') }}",
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
                        if ($('#route_id').val() == '') {
                            toastr.success("Route List added successfully.");
                        } else {
                            toastr.success("Route List updated successfully.");
                        }
                        dataTable.draw();
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


        var dataTable = $('.add_route-table').DataTable({
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
                url: "{{ route('route_list_get') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });


        function editroute(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('route-list-edit') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Route');
                    $("#add-route-form")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#route_id').val(data.data.id);
                    $('#name').val(data.data.name);
                    // Show edit modal
                    $('#ajaxModel').modal('show');
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }


        function daletetabledata(id) {
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this data!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
                backdrop: 'static', // Prevents clicking outside the modal to dismiss
            }).then(function(result) {
                if (result.isConfirmed) { // Check if the "Yes, I am sure!" button was clicked
                    _data = {};
                    _data['id'] = id;
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('route_list_delete') }}",
                        headers: {
                            'X-CSRF-Token': token,
                        },
                        data: _data,
                        dataType: "json",
                        success: (data) => {
                            dataTable.draw();
                        },
                        error: function(response) {}
                    });
                } else {
                    swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
