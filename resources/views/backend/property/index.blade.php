@extends('layouts.backend.master')
@section('title', 'All partner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false" onclick="draft()">Draft</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false" onclick="trash()">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Active Property </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>slug</th>
                                                <th>Price</th>
                                                <th>Property Id</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table">


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Properties</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example_draft">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>slug</th>
                                                <th>Price</th>
                                                <th>Property Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">



                                        </tbody>

                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftRequirement->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Properties</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example_trash">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>slug</th>
                                                <th>Price</th>
                                                <th>Property Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {


            $('#example').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    "url": "/admin/properties",
                    "data": function(d) {
                        d.status = 'publish';
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                     {
                        data: 'slug',
                        name: 'slug',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'property_id',
                        name: 'property_id',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ],
                order: [
                    [0, 'desc'] // Order by the first column (id) in descending order
                ],


            });


        });

        function draft() {
            $('#example_draft').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "/admin/properties",
                    "data": function(d) {
                        d.status = 'draft';
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                     {
                        data: 'slug',
                        name: 'slug',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'property_id',
                        name: 'property_id',
                    },

                    {
                        data: 'action',
                        name: 'action',
                    },





                ]
            });
        }

        function trash() {
            $('#example_trash').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "/admin/properties",
                    "data": function(d) {
                        d.status = 'trash';
                    }

                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                     {
                        data: 'slug',
                        name: 'slug',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'property_id',
                        name: 'property_id',
                    },

                    {
                        data: 'action',
                        name: 'action',
                    },





                ]
            });
        }
    </script>
@endsection
