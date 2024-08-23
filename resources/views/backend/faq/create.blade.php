@extends('layouts.backend.master')
@section('title', 'Create Banner')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
                <h1 class="m-0">FAQ</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Faq</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.faq.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              
                                
                                <div class="row mt-3">
                                    <div class=" form-group">
                                        <b>Question:</b>
                                        <input type="text" name="question" class=" form-control"
                                            placeholder="question" value="{{ old('question') }}">
                                    </div>
                                    <div class=" form-group mt-3">
                                      <b>Answer:</b>
                                      <textarea name="answer" id="editor" class=" form-control " rows="7" placeholder="Description">{{ old('answer') }}</textarea>
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
