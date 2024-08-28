@extends('layouts.backend.master')
@section('title', 'Update General Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Info</li>
                    </ol>
                </nav>
                <h1 class="m-0">General Info</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit General Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.general_info.update', $generalInfo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <b>Logo:</b>
                                        <input type="file" name="logo" class="form-control mt-2">
                                        <img src="{{  $generalInfo->logo }}" class="mt-2"
                                            width="60" alt="Logo">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Favicon logo:</b>
                                        <input type="file" name="favicon_logo" class="form-control mt-2">
                                        <img src="{{  $generalInfo->favicon_logo }}"
                                            class="mt-2" width="60" alt="favicon_logo">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <b>Profile photo:</b>
                                        <input type="file" name="footer_logo" class="form-control mt-2">
                                        <img src="{{  $generalInfo->footer_logo }}"
                                            class="mt-2" width="60" alt="footer_logo" style="background: #00938a; padding:10px">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <b>Title:</b>
                                        <input type="text" name="site_name" class=" form-control mt-2"
                                            value="{{ $generalInfo->site_name }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Email:</b>
                                        <input type="text" name="email" class="form-control mt-2"
                                            value="{{ $generalInfo->email }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Phone:</b>
                                        <input type="text" name="phone" class=" form-control mt-2"
                                            value="{{ $generalInfo->phone }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Whatsapp:</b>
                                        <input type="text" name="whatsapp" class=" form-control mt-2"
                                            value="{{ $generalInfo->whatsapp }}">
                                            (Must Use Country Code)
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <b>Facebook:</b>
                                        <input type="text" name="facebook" class=" form-control mt-2"
                                            value="{{ $generalInfo->facebook }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Github:</b>
                                        <input type="text" name="github" class=" form-control mt-2"
                                            value="{{ $generalInfo->github }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>LinkedIn:</b>
                                        <input type="text" name="linkedin" class=" form-control mt-2"
                                            value="{{ $generalInfo->linkedin }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Youtube:</b>
                                        <input type="text" name="youtube" class=" form-control mt-2"
                                            value="{{ $generalInfo->youtube }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pdf_file">Upload PDF:</label>
                                    <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <b>Copyright Text:</b>
                                    <input type="text" name="copyright_text" class=" form-control mt-2"
                                        value="{{ $generalInfo->copyright_text }}">
                                </div>
                                <div class="form-group mt-2">
                                    <b>Address:</b>
                                    <textarea name="address" class="form-control " rows="7">{{ $generalInfo->address }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <b>Google Analytic Code:</b>
                                    <textarea name="google_analytic" class="form-control " rows="7">{{ $generalInfo->google_analytic }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <b>Footer Description:</b>
                                    <textarea name="footer_des" class=" form-control mt-2" rows="7" placeholder="Enter Footer Description">{{ $generalInfo->footer_des }}</textarea>
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
