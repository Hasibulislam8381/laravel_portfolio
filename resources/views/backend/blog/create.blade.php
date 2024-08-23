@extends('layouts.backend.master')
@section('title', 'Create Blog')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </nav>
                <h1 class="m-0">Blogs</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add blog Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <b>Title:</b>
                                    <input type="text" name="title" class=" form-control"
                                        placeholder="Enter Blog Title">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <b>Auther Name:</b>
                                        <input type="text" name="auther" class=" form-control"
                                            placeholder="Enter Auther Name">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <b>Photo(1280x705):</b>
                                        <input type="file" name="photo" class=" form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview" style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <b>Meta Photo:</b>
                                        <input type="file" name="meta_photo" class=" form-control" id="photoInput">
                                        (16*9 ratio recomended)
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview" style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <b>Alter Text:</b>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <b>Date:</b>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class=" form-group mt-3">
                                    <b>Description:</b>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Blog Description"></textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <b>Meta Title:</b>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Meta Keyword:</b>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Meta Description:</b>
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
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
