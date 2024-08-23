@extends('layouts.backend.master')
@section('title', 'All Sub Area Bottom')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Draft</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Active Bottom Sub Area</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="table">
                                            @foreach ($activeSarea as $subArea)
                                                <tr>
                                                    <td>{{ $subArea->id }}</td>
                                                    <td>
                                                        <img src="{{ $subArea->photo }}" width="60" alt="{{ $subArea->alt_text }}">
                                                    </td>
                                                    <td>{{ $subArea->title }}</td>
                                                    <td>{!! Str::limit($subArea->description, 250) !!}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.subArea.editBottom',$subArea->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.subArea.status', $subArea->id) }}"
                                                            class=" btn {{ $subArea->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $subArea->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.subArea.trash', $subArea->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeSarea->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Bottom Sub Area</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftSarea as $subArea)
                                                <tr>
                                                    <td>{{ $subArea->id }}</td>
                                                    <td>
                                                        <img src="{{ $subArea->photo }}" width="60" alt="{{ $subArea->alt_text }}">
                                                    </td>
                                                    <td>{{ $subArea->title }}</td>
                                                    <td>{!! Str::limit($subArea->description, 250) !!}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.subArea.editBottom',$subArea->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.subArea.status', $subArea->id) }}"
                                                            class=" btn {{ $subArea->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $subArea->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.subArea.trash', $subArea->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftSarea->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Bottom Sub Area</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">
                                            @foreach ($trashedSarea as $subArea)
                                                <tr>
                                                    <td>{{ $subArea->id }}</td>
                                                    <td>
                                                        <img src="{{ $subArea->photo }}" width="60" alt="{{ $subArea->alt_text }}">
                                                    </td>
                                                    <td>{{ $subArea->title }}</td>
                                                    <td>{!! Str::limit($subArea->description, 250) !!}</td>

                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.subArea.reStore', $subArea->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.subArea.delete', $subArea->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedSarea->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
