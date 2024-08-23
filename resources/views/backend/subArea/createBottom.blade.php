@extends('layouts.backend.master')
@section('title', 'Create Sub Area')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Area</li>
                    </ol>
                </nav>
                <h1 class="m-0">Sub Area</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Sub Area Bottom Section</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.subArea.storeBottom') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <b>Title:</b>
                                        <input type="text" name="title" class=" form-control"
                                            placeholder="Enter Sub Area Title" value="{{ old('title') }}">
                                            
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="form-group mt-2 col-lg-6">
                                        <b>Alter Text:</b>
                                        <input type="text" name="alt_text" class=" form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    <!--<div class="form-group mt-2 col-lg-6">-->
                                    <!--    <b>Select Area:</b>-->
                                    <!--    <select name="area" id="" class="form-control">-->
                                    <!--        <option selected disabled>Select Area</option>-->
                                    <!--        @foreach ($subAreas->unique('name') as $area)-->
                                    <!--            <option value="{{ $area->name }}"> {{ $area->name }}</option>-->
                                    <!--        @endforeach-->
                                    <!--    </select>-->
                                    <!--</div>-->
                                </div>
                                
                                <div class="row">
                                    <div class="form-group mt-2 col-lg-6">
                                        <b>Photo(1368x622):</b>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    
                                </div>
                                <div class="form-group mt-3">
                                    <b>Description:</b>
                                    <textarea name="description" id="editor" class=" form-control " rows="7" placeholder="Description">{{ old('description') }}</textarea>
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
