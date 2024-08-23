@extends('layouts.backend.master')
@section('title', 'Edit Sub Area')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Content</li>
                    </ol>
                </nav>
                <h1 class="m-0">Content</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Content Section</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.content.update', $content->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group col-lg-6">
                                    <label for="requirement_types_id">Requirement Type</label>
                                    <select name="requirement_types_id" id="requirement_types_id" class="form-control">
                                        <option selected disabled>Select Propertytype</option>
                                        @foreach ($requirementType as $requirementTypes)
                                            <option @if ($requirementTypes->id == $content->requirement_types_id) selected @endif
                                                value="{{ $requirementTypes->id }}">{{ $requirementTypes->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="id" id="id">
                                </div>

                                <div class=" form-group col-lg-6">
                                    <label>Area:</label>
                                    <select name="sub_area_id" id="sub_area_id" class="form-control">
                                        <option selected disabled>Select Area</option>
                                        @foreach ($subarea as $areas)
                                            <option @if ($areas->id == $content->sub_area_id) selected @endif
                                                value="{{ $areas->id }}">{{ $areas->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" mt-3 form-group col-md-6">
                                    <b>Title</b>
                                    <input class="form-control" type="text" value="{{ $content->title }}" name="title">
                                </div>
                                <div class=" mt-3 form-group col-lg-12">
                                    <b>Content:</b>
                                    <textarea name="content" id="editor" class=" form-control " rows="7" placeholder="Description">{!! $content->content !!}</textarea>
                                </div>




                                <div class="form-group mt-3">
                                    <div class=" form-group col-lg-4">
                                        <b>Meta Photo:</b>
                                        <input type="file" name="meta_photo" class=" form-control" id="photoInput">
                                        (16*9 ratio recomended)

                                        <img src="{{ $content->meta_photo }}" class="mt-3" width="60" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group mt-3 col-lg-4">
                                        <b>Alter text:</b>
                                        <input type="text" name="alt_text" class="form-control mt-2"
                                            placeholder="Alter Text" value="{{ $content->alt_text }}">
                                    </div>
                                    <div class="form-group mt-3 col-lg-4">
                                        <b>Meta Title:</b>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $content->m_title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group mt-3 col-lg-4">
                                        <b>Meta Keyword:</b>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ $content->m_keyword }}">
                                    </div>
                                    <div class="form-group mt-3 col-lg-4">
                                        <b>Meta Description:</b>
                                        <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{!! $content->m_description !!}</textarea>
                                    </div>
                                    <div class="form-group mt-3 col-lg-4">
                                        <b>Header text:</b>
                                        <textarea name="header_text" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{!! $content->header_text !!}</textarea>
                                    </div>
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
