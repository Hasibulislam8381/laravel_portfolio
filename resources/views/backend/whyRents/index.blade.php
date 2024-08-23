@extends('layouts.backend.master')
@section('title', 'All whyRents')
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
                                <h4 class="text-center">Active whyRents</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Alter text</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeWR as $whyRent)
                                                <tr>
                                                    <td>{{ $whyRent->id }}</td>
                                                    <td>
                                                        <img src="{{ $whyRent->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $whyRent->alt_text }}</td>
                                                    <td>{{ $whyRent->title }}</td>
                                                    <td>{{ $whyRent->slug }}</td>
                                                    <td>{{ Str::limit($whyRent->description, 20, '...') }}</td>
                                                    <td>{{ $whyRent->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $whyRent->id }}','{{ $whyRent->title }}','{{ $whyRent->slug }}','{{ $whyRent->description }}','{{ $whyRent->alt_text }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.whyRent.status', $whyRent->id) }}"
                                                            class=" btn {{ $whyRent->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $whyRent->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.whyRent.trash', $whyRent->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeWR->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft whyRents</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Alter Text</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftWR as $whyRent)
                                                <tr>
                                                    <td>{{ $whyRent->id }}</td>
                                                    <td>
                                                        <img src="{{ $whyRent->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>{{ $whyRent->alt_text }}</td>
                                                    <td>{{ $whyRent->title }}</td>
                                                    <td>{{ $whyRent->slug }}</td>
                                                    <td>{{ Str::limit($whyRent->description, 20, '...') }}</td>
                                                    <td>{{ $whyRent->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $whyRent->id }}','{{ $whyRent->title }}','{{ $whyRent->slug }}','{{ $whyRent->description }}','{{ $whyRent->alt_text }}')"
                                                            class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.whyRent.status', $whyRent->id) }}"
                                                            class=" btn {{ $whyRent->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $whyRent->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.whyRent.trash', $whyRent->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftWR->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed whyRents</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Alter Text</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedWR as $whyRent)
                                                <tr>
                                                    <td>{{ $whyRent->id }}</td>
                                                    <td>
                                                        <img src="{{ $whyRent->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>{{ $whyRent->alt_text }}</td>
                                                    <td>{{ $whyRent->title }}</td>
                                                    <td>{{ $whyRent->slug }}</td>
                                                    <td>{{ Str::limit($whyRent->description, 20, '...') }}</td>
                                                    <td>{{ $whyRent->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.whyRent.reStore', $whyRent->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.whyRent.delete', $whyRent->id) }}"
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
                                        {{ $trashedWR->links() }}
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
    function updatedata(id, title, slug, description, alt_text) {
        $("#id").val(id);
        $("#title").val(title);
        $("#slug").val(slug);
        $("#description").val(description);
        $("#alt_text").val(alt_text);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit whyRent Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.whyRent.update', $whyRent->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <b>Title:</b>
                        <input type="text" name="title" id="title" class=" form-control"
                            placeholder="Enter Why Rents Title" value="{{ $whyRent->title }}">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>
                    <div class="form-group mt-3">
                        <b>Slug:</b>
                        <input type="text" name="slug" id="slug" class=" form-control"
                            placeholder="Enter or Keep it Blank to autogenerate">
                    </div>
                    <div class="row mt-3">

                        <div class=" form-group col-lg-6">
                            <b>Photo(300x300):</b>
                            <input type="file" name="photo" class=" form-control">
                            <img src="{{ $whyRent->photo }}" width="60" class="mt-3" alt="{{ $whyRent->alt_text }}">
                        </div>
                        <div class=" form-group col-lg-6">
                            <b>Alter Text:</b>
                            <input type="text" name="alt_text" id="alt_text" class="form-control"
                                placeholder="Enter Alter Text" value="{{ $whyRent->alt_text }}">
                        </div>

                    </div>

                    <div class="form-group mt-3">
                        <b>Description:</b>
                        <textarea name="description" id="description" class=" form-control " rows="7" placeholder="Enter Why Rent Description">{{ $whyRent->description }}</textarea>
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
