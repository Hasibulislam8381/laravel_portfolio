@extends('layouts.backend.master')
@section('title', 'All explores')
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
                                <h4 class="text-center">Active Corporate Housing</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeExplore as $explore)
                                                <tr>
                                                    <td>{{ $explore->id }}</td>
                                                    <td>
                                                        <img src="{{ $explore->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $explore->title }}</td>
                                                    <td>{{ $explore->sub_title }}</td>
                                                    <td>{{ Str::limit($explore->description, 20, '...') }}</td>
                                                    <td>{{ $explore->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $explore->id }}','{{ $explore->title }}','{{ $explore->sub_title }}','{{ $explore->description }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.exploreArea.status', $explore->id) }}"
                                                            class=" btn {{ $explore->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $explore->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.exploreArea.trash', $explore->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeExplore->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Corporate Housing</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                          <tr>
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">

                                        @foreach ($draftExplore as $explore)
                                            <tr>
                                                <td>{{ $explore->id }}</td>
                                                <td>
                                                    <img src="{{ $explore->photo }}" width="80px" alt=""
                                                        style="padding: 0!important">
                                                </td>
                                                <td>{{ $explore->title }}</td>
                                                <td>{{ $explore->sub_title }}</td>
                                                <td>{{ Str::limit($explore->description, 20, '...') }}</td>
                                                <td>{{ $explore->status }}</td>
                                                <td class="td_btn">

                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                        onclick="updatedata('{{ $explore->id }}','{{ $explore->title }}','{{ $explore->sub_title }}','{{ $explore->description }}')"
                                                        class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.exploreArea.status', $explore->id) }}"
                                                            class=" btn {{ $explore->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $explore->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.exploreArea.trash', $explore->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftExplore->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Corporate Housing</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                          <tr>
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">

                                        @foreach ($draftExplore as $explore)
                                            <tr>
                                                <td>{{ $explore->id }}</td>
                                                <td>
                                                    <img src="{{ $explore->photo }}" width="80px" alt=""
                                                        style="padding: 0!important">
                                                </td>
                                                <td>{{ $explore->title }}</td>
                                                <td>{{ $explore->sub_title }}</td>
                                                <td>{{ Str::limit($explore->description, 20, '...') }}</td>
                                                <td>{{ $explore->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.exploreArea.reStore', $explore->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.exploreArea.delete', $explore->id) }}"
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
                                        {{ $draftExplore->links() }}
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
<script>
    function updatedata(id, title, sub_title, description) {
        $("#id").val(id);
        $("#title").val(title);
        $("#sub_title").val(sub_title);
       
        $("#description").val(description);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit explore Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.exploreArea.update', $explore->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <b>Title:</b>
                        <input type="text" name="title" id="title" class=" form-control"
                            placeholder="Enter Why Rents Title" value="{{ $explore->title }}">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>
                    <div class="row mt-3">

                        <div class=" form-group col-lg-6">
                            <b>Photo(1600x416):</b>
                            <input type="file" name="photo" class=" form-control" id="photoInput">
                            <img src="{{ $explore->photo }}" width="60" class="mt-3" alt="" >
                            <img id="previewImage" class="mt-3" src="#" alt="Preview" style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                        <div class="form-group col-lg-6">
                          <b>Sub Title:</b>
                          <input type="text" name="sub_title" id="sub_title" class=" form-control"
                              placeholder="Enter Sub Title">
                        </div>

                    </div>

                    <div class="form-group mt-3">
                        <b>Description:</b>
                        <textarea name="description" id="description" class=" form-control " rows="7" placeholder="Enter Why Rent Description">{{ $explore->description }}</textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
