@extends('layouts.backend.master')
@section('title', 'Create Team')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
                    </ol>
                </nav>
                <h1 class="m-0">Team</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Team Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.team.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <b>Name:</b>
                                    <input type="text" name="name" class=" form-control"
                                        placeholder="Enter Name" value="{{ old('name') }}">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Photo(767x942):</b>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <b>Designation:</b>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="Enter Designation" value="{{ old('designation') }}">
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
@endsection
