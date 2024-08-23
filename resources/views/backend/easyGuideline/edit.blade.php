@extends('layouts.backend.master')
@section('title', 'Edit Easy Guideline')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dividened History</li>
                    </ol>
                </nav>
                <h1 class="m-0">Dividenened History</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Dividened History</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.easyGuideline.update', $easyGuideline->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-3">
                        <div class=" form-group">
                            <b>Title:</b>
                            <input type="text" name="title" id="title" class=" form-control"
                                value="{{$easyGuideline->title}}" placeholder="title">
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class=" form-group">
                            <b>Description:</b>
                            <textarea name="description" id="editor" class="form-control" rows="7">{!! $easyGuideline->description !!}</textarea>
                        </div>


                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    
       <script>
        CKEDITOR.replace('editor');
    </script>

@endsection
