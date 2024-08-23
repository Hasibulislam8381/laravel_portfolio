@extends('layouts.backend.master')
@section('title', 'All teams')
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
                                <h4 class="text-center">Active teams</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeTeam as $team)
                                                <tr>
                                                    <td>{{ $team->id }}</td>
                                                    <td>
                                                        <img src="{{ $team->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $team->name }}</td>
                                                    <td>{{ $team->designation }}</td>
                                                    <td>{{ $team->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $team->id }}','{{ $team->name }}','{{ $team->designation }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.team.status', $team->id) }}"
                                                            class=" btn {{ $team->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $team->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.team.trash', $team->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeTeam->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft teams</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                          <tr>
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">

                                        @foreach ($draftTeam as $team)
                                            <tr>
                                                <td>{{ $team->id }}</td>
                                                <td>
                                                    <img src="{{ $team->photo }}" width="80px" alt=""
                                                        style="padding: 0!important">
                                                </td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->designation }}</td>
                                                <td>{{ $team->status }}</td>
                                                <td class="td_btn">

                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                        onclick="updatedata('{{ $team->id }}','{{ $team->name }}','{{ $team->designation }}')"
                                                        class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.team.status', $team->id) }}"
                                                            class=" btn {{ $team->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $team->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.team.trash', $team->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftTeam->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Teams</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedTeam as $team)
                                                <tr>
                                                    <td>{{ $team->id }}</td>
                                                    <td>
                                                        <img src="{{ $team->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>{{ $team->name }}</td>
                                                    <td>{{ $team->designation }}</td>
                                                    <td>{{ $team->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.team.reStore', $team->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.team.delete', $team->id) }}"
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
                                        {{ $trashedTeam->links() }}
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
    function updatedata(id, name,designation) {
        $("#id").val(id);
        $("#name").val(name);
        $("#designation").val(designation);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit team Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.team.update', $team->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <b>Title:</b>
                        <input type="text" name="name" id="title" class=" form-control"
                            placeholder="Enter Name" value="{{ $team->name }}">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>
                    <div class="row mt-3">

                        <div class=" form-group col-lg-6">
                            <b>Photo(767x942):</b>
                            <input type="file" name="photo" class=" form-control" id="photoInput">
                            <img src="{{ $team->photo }}" width="60" class="mt-3" alt="">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                        <div class=" form-group col-lg-6">
                            <b>Designation:</b>
                            <input type="text" name="designation" id="designation" class="form-control"
                                placeholder="Enter Designation" value="{{ $team->designation }}">
                        </div>
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
