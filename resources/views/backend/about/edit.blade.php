@extends('layouts.backend.master')
@section('title', 'Update About Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h1 class="m-0">About Us</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit About Us Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.about.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <b>Top Content:</b>
                                    <textarea name="top_content" class="form-control " rows="7">{{ $about->top_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <b>Mission:</b>
                                    <textarea name="mission" class="form-control " rows="7">{{ $about->mission }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <b>Vision:</b>
                                    <textarea name="vision" class=" form-control mt-2" rows="7" placeholder="Enter Vision">{{ $about->vision }}</textarea>
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
