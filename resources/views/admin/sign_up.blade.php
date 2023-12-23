@extends('layout.web')
@section('style')
@endsection

@section('content')

    <body>
        <div class="cust_login sign_up">
            <div class="error-page-int">
                <div class="text-center m-b-md custom-login">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="panel-body">
                            <form method="post" class="row" id="sign_up_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sign_up_id" id="sign_up_id">
                                <h5 class="text-center">Sign Up</h5>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" placeholder="Enter Customer Name" name="cust_name" id="cust_name"
                                        class="form-control">
                                    <span class="text-danger" id="cust_name_error"></span>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="tect" placeholder="Enter City" name="city" id="city"
                                        class="form-control">
                                    <span class="text-danger" id="city_error"></span>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea type="text" placeholder="Enter Address" name="address" id="address" class="form-control"></textarea>
                                </div>
                                <span class="text-danger" id="address_error"></span>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">GST No.</label>
                                    <input type="text" placeholder="Enter GST NO." name="gst_no" id="gst_no"
                                        class="form-control">
                                    <span class="text-danger" id="gst_no_error"></span>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Sample Frequency</label>
                                    <select class="form-select" name="sample_frequencies_id" id="sample_frequencies_id">
                                        <option value="">Select Sample Frequencies</option>
                                        @foreach ($SampleFrequencies as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="sample_frequencies_id_error"></span>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Google Map Location</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control b-r-6" placeholder="Enter Map location"
                                            aria-label="Map location" name="g_map_location" aria-describedby="basic-addon2">
                                        <a class="input-group-text user-select" id="show-map" data-bs-toggle="modal"
                                            data-bs-target="#location" onclick="initializeMap()">
                                            <img class="img-fluid me-1" src="{{ asset('assets/img/map-icon.png') }}"
                                                alt="map">
                                            Select Location
                                        </a>
                                    </div>
                                    <span class="text-danger" id="g_map_location_error"></span>
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
                                                <tr>
                                                    <td>
                                                        <input type="text" placeholder="Enter contact person name"
                                                            title="Enter contact person name" name="person_name[]"
                                                            id="person_name" class="form-control border-0 p-0">
                                                        <span class="text-danger" id="person_name_error"></span>
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Enter mobile no"
                                                            title="Enter mobile no." name="mobile_no[]" id="mobile_no"
                                                            class="form-control border-0 p-0">
                                                        <span class="text-danger" id="mobile_no_error"></span>
                                                    </td>
                                                    <td style="min-width: 166px;">
                                                        <input type="email" placeholder="Enter email id"
                                                            title="Enter email id" name="email_id[]" id="email_id"
                                                            class="form-control border-0 p-0">
                                                        <span class="text-danger" id="email_id_error"></span>
                                                    </td>
                                                </tr>
                                                </thead>
                                        </table>
                                        <a class="btn btn-light-warning px-3" id="add-contact">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                    stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg> Add
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('/') }}" style="margin: 0; margin-right: 10px;">
                                            <button type="button" class="btn btn-disabled loginbtn h-100">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary loginbtn h-100">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6583232.455855462!2d74.40831572851275!3d16.64335452247996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1693823367525!5m2!1sen!2sin"
                                width="760" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
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


        $('#sign_up_form').submit(function(e) {
            e.preventDefault();

            $(':input[type="submit"]').prop('disabled', true);

            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ url('insert-sign-up') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        if ($('#sign_up_id').val() == '') {
                            toastr.success("SignUp successfully.");
                            setTimeout(
                                function() {
                                    window.location.href = "{{ url('/') }}";
                                }, 2000);
                        } else {
                            toastr.success("Custmoer updated successfully.");
                        }
                        dataTable.draw();
                    } else {
                        toastr.error(data.msg);
                        $(':input[type="submit"]').prop('disabled', false);
                    }
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
