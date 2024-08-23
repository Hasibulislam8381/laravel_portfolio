@extends('layouts.backend.master')
@section('title', 'Create Banner')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </nav>
                <h1 class="m-0">Banner</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Banner</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <b>Title:</b>
                                    <input type="text" name="title" class=" form-control"
                                        placeholder="Enter Why Rents Title" value="{{ old('title') }}">
                                </div>
                               
                                <div class="row mt-3">
                                    
                                    <div class=" form-group col-lg-6">
                                        <b>Photo(1200x500):</b>
                                        <input type="file" name="photo" class=" form-control">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <b>Alter Text:</b>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    <div class=" form-group mt-3">
                                      <b>Description:</b>
                                      <textarea name="short_des" class=" form-control " rows="7" placeholder="Enter Banner Description">{{ old('short_des') }}</textarea>
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
