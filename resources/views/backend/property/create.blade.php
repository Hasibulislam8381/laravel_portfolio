@extends('layouts.backend.master')
@section('title', 'Create Blog')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Property</li>
                    </ol>
                </nav>
                <h1 class="m-0">Property</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Property Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.properties.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title">
                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-6">
                                        <label>Photo(1170x785):</label>
                                        <input type="file" name="photo[]" class=" form-control" id="photoInput" multiple>
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Feature Photo(1170x785):</label>
                                        <input type="file" name="feature_photo" class=" form-control" id="photoInput">

                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Meta Photo(16x9 ratio recomended):</label>
                                        <input type="file" name="meta_photo" class=" form-control" id="photoInput">

                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text">
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Bedroom:</label>
                                        <input type="text" name="bedroom" class=" form-control" id="bedroom"
                                            placeholder="bedroom">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Bathroom:</label>
                                        <input type="text" name="bathroom" class=" form-control" placeholder="Bathroom">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Garage:</label>
                                        <input type="text" name="garage" class="form-control" placeholder="Garage">
                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Year Built:</label>
                                        <input type="text" name="year_built" class="form-control"
                                            placeholder="year_built">
                                    </div>

                                    <div class=" form-group col-lg-4">
                                        <label>Property Type:</label>

                                        <select id="requirement_type3" name="requirement_types_id[]"
                                            class="mt-1 form-control property_id select2" multiple="multiple">
                                            <option value="0">--Select Property-- </option>
                                            @foreach ($requirementType as $requirementTypes)
                                                <option value="{{ $requirementTypes->id }}">{{ $requirementTypes->name }}
                                                </option>
                                            @endforeach
                                        </select>



                                    </div>
                                    {{-- <!--<div class="form-group col-lg-4">-->
                                    <!--    <label>Area:</label>-->
                                    <!--    <select name="area_id" id="areaSelect" class="form-control">-->
                                    <!--        <option selected disabled>Select Area</option>-->
                                    <!--        @foreach ($area as $areas)
    -->
                                    <!--            <option value="{{ $areas->id }}">{{ $areas->name }}</option>-->
                                    <!--
    @endforeach-->
                                    <!--    </select>-->
                                    <!--</div>--> --}}
                                    <div class="form-group col-lg-4">
                                        <label>Area:</label>
                                        <select name="sub_area_id" id="areaSelect" class="form-control">
                                            <option selected disabled>Select Area</option>
                                            @foreach ($subarea as $areas)
                                                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">

                                    <!--<div class="form-group col-lg-4">-->
                                    <!--    <label>Sub Area:</label>-->
                                    <!--    <select name="sub_area_id" id="subAreaSelect" required class="form-control">-->

                                    <!--        <option value="">--Please Wait--</option>-->
                                    <!-- Sub area options will be populated dynamically based on the selected Area -->
                                    <!--    </select>-->
                                    <!--</div>-->

                                    <div class=" form-group col-lg-6">
                                        <label>Property Size:</label>
                                        <input type="text" name="property_size" class=" form-control" id="property_size"
                                            placeholder="property_size">

                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Property Purpose:</label>
                                        <input type="text" name="property_purpose" class="form-control"
                                            placeholder="property_purpose">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Interior:</label>
                                        <input type="text" name="interior" class=" form-control" id="interior"
                                            placeholder="interior">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Balcony:</label>
                                        <input type="text" name="balcony" class=" form-control" id="balcony"
                                            placeholder="balcony">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Registration Type:</label>
                                        <input type="text" name="registration_type" class="form-control"
                                            placeholder="registration_type">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Parking:</label>
                                        <input type="text" name="parking" class=" form-control" id="parking"
                                            placeholder="parking">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>House Rules:</label>
                                        <input type="text" name="house_rules" class=" form-control" id="house_rules"
                                            placeholder="house_rules">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Lift:</label>
                                        <input type="text" name="lift" class="form-control" placeholder="lift">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Fron Road Size:</label>
                                        <input type="text" name="front_road_size" class=" form-control"
                                            id="front_road_size" placeholder="Front Road Side">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Floor:</label>
                                        <input type="text" name="floor" class=" form-control" id="floor"
                                            placeholder="floor">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Common Area:</label>
                                        <input type="text" name="common_area" class="form-control"
                                            placeholder="Common Area">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Unit:</label>
                                        <input type="text" name="unit" class=" form-control" id="unit"
                                            placeholder="unit">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Nearby Landmark:</label>
                                        <input type="text" name="nearby_landmark" class=" form-control"
                                            id="nearby_landmark" placeholder="Nearby Landmark">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Unit Per Floor:</label>
                                        <input type="text" name="unit_per_floor" class="form-control"
                                            placeholder="Unit Per Floor">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Preferred Tenant:</label>
                                        <input type="text" name="preferred_tenant" class=" form-control"
                                            id="preferred_tenant" placeholder="preferred_tenant">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Total Units:</label>
                                        <input type="text" name="total_units" class=" form-control" id="total_units"
                                            placeholder="Total Units">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Gas:</label>
                                        <input type="text" name="gas" class="form-control" placeholder="Gas">
                                    </div>

                                    <div class="row mt-3">

                                        <div class=" form-group col-lg-4">
                                            <label>Price:</label>
                                            <input type="text" name="price" class=" form-control" id="price"
                                                placeholder="price">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Servant Room:</label>
                                            <input type="text" name="servant_room" class=" form-control"
                                                id="servant_room" placeholder="Servant room">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Servant Washroom:</label>
                                            <input type="text" name="servant_washroom" class="form-control"
                                                placeholder="servant washroom">
                                        </div>


                                    </div>
                                    <div class="row mt-3">

                                        <div class=" form-group col-lg-4">
                                            <label>Service Charge:</label>
                                            <input type="text" name="service_charge" class=" form-control"
                                                id="service_charge" placeholder="service charge">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Apartment Facing:</label>
                                            <input type="text" name="apartment_facing" class=" form-control"
                                                id="apartment_facing" placeholder="Apartment facing">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Garage Size:</label>
                                            <input type="text" name="garage_size" class="form-control"
                                                placeholder="Garage Size">
                                        </div>


                                    </div>
                                    <div class="row mt-3">

                                        <div class=" form-group col-lg-4">
                                            <label>Property Id:</label>
                                            <input type="text" name="property_id" class=" form-control"
                                                id="property_id" placeholder="Property Id">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Address:</label>
                                            <input type="text" name="address" class=" form-control" id="address"
                                                placeholder="address">

                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>City:</label>
                                            <input type="text" name="city" class="form-control"
                                                placeholder="city">
                                        </div>


                                    </div>
                                    <div class="row mt-3">

                                        <div class=" form-group col-lg-6">
                                            <label>Zip Code:</label>
                                            <input type="text" name="zip_code" class=" form-control" id="zip_code"
                                                placeholder="Zip Code">

                                        </div>

                                        <div class=" form-group col-lg-6">
                                            <label>Country:</label>
                                            <input type="text" name="country" class="form-control"
                                                placeholder="country">
                                        </div>


                                    </div>
                                    <div class="row mt-3">

                                        <div class=" form-group col-lg-6">
                                            <label>Features:</label>
                                            <textarea name="features" id="" class=" form-control"rows="3" placeholder="Features"></textarea>
                                            (Use , for separate)


                                        </div>

                                        <div class=" form-group col-lg-6">
                                            <label>Tags:</label>
                                            <textarea name="tags" id="" class=" form-control"rows="3" placeholder="Tags"></textarea>
                                            (Use , for separate)

                                        </div>


                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group col-lg-4">
                                            <label>Meta Title:</label>
                                            <input type="text" name="m_title" class="form-control mt-2"
                                                placeholder="Enter Meta Title" value="{{ old('m_title') }}">

                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Meta Keyword:</label>
                                            <input type="text" name="m_keyword" class="form-control mt-2"
                                                placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Meta Description:</label>
                                            <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ old('m_description') }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script>
        $(document).ready(function() {
            // Function to fetch and populate Sub Area dropdown based on the selected Area
            function populateSubAreas(areaId) {
                var subAreaSelect = $('#subAreaSelect');
                subAreaSelect.append('<option value="">Please Wait...</option>');
                $.ajax({
                    url: '/admin/properties/sub-area-ajax/' + areaId,
                    // Replace with your route URL to fetch sub areas
                    type: 'GET',
                    success: function(response) {

                        subAreaSelect.empty();
                        subAreaSelect.append(response);
                        // Clear existing options
                        // if (response.length > 0) {
                        //     // Add sub areas as options in the dropdown
                        //     $.each(response, function(index, subArea) {
                        //         subAreaSelect.append('<option value="' + subArea.id + '">' +
                        //             subArea.name + '</option>');
                        //     });
                        // } else {
                        //     // Show a default option if there are no sub areas for the selected area
                        //     subAreaSelect.append('<option value="">No Sub Areas Found</option>');
                        // }
                    },
                    error: function() {
                        console.error('Error fetching sub areas.');
                    }
                });
            }

            // Listen to changes in the Area dropdown
            $('#areaSelect').on('change', function() {
                var selectedAreaId = $(this).val();
                if (selectedAreaId) {

                    // If an area is selected, populate the Sub Area dropdown
                    populateSubAreas(selectedAreaId);
                } else {
                    // If no area is selected, clear the Sub Area dropdown
                    $('#subAreaSelect').empty();
                }
            });
        });
    </script>

@endsection
