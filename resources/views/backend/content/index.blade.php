@extends('layouts.backend.master')
@section('title', 'All partner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                <h4 class="text-center">Active Content</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Area Id</th>
                                                <th>Requirement Name</th>
                                                <th>Title</th>
                                               
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeContent as $content)
                                                <tr>
                                                    <td>{{ $content->id }}</td>
                                                    <td>{{ $content->subArea->name ?? 'Null' }}</td>
                                                    <td>{{ $content->requirement->name?? 'Null' }}</td>
                                                    <td>{{ $content->title ?? 'NULL' }}</td>
                                                 

                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.content.edit', $content->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.content.status', $content->id) }}"
                                                            class=" btn {{ $content->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $content->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.content.trash', $content->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeContent->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Requirement</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Area Id</th>
                                                <th>Requirement Name</th>
                                           
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftContent as $content)
                                                <tr>
                                                    <td>{{ $content->id }}</td>
                                                    <td>{{ $content->sub_area_id }}</td>
                                                    <td>{{ $content->requirement_types_id }}</td>
                                            

                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $content->id }}','{{ $content->sub_area_id }}','{{ $content->requirement_types_id }}','{{ mysql_escape($content->content) }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.content.status', $content->id) }}"
                                                            class=" btn {{ $content->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $content->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.content.trash', $content->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftContent->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Content</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Area Id</th>
                                                <th>Requirement Name</th>
                                           
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedContent as $content)
                                                <tr>
                                                    <td>{{ $content->id }}</td>
                                                    <td>{{ $content->sub_area_id }}</td>
                                                    <td>{{ $content->requirement_types_id }}</td>
                                                  
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.content.reStore', $content->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.content.delete', $content->id) }}"
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
                                        {{ $trashedContent->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection

<script>
    function updatedata(id, sub_area_id, requirement_types_id, content) {
        $("#id").val(id);
        $("#sub_area_id").val(sub_area_id);
        $("#requirement_types_id").val(requirement_types_id);
        CKEDITOR.instances['editor'].setData(content)
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" data-focus="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Content Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.content.update', $content->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group col-lg-6">
                        <label for="requirement_types_id">Requirement Type</label>
                        <select name="requirement_types_id" id="requirement_types_id" class="form-control">
                            <option selected disabled>Select Propertytype</option>
                            @foreach ($requirementType as $requirementTypes)
                                <option value="{{ $requirementTypes->id }}">{{ $requirementTypes->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" id="id">
                    </div>

                    <div class=" form-group col-lg-6">
                        <label>Area:</label>
                        <select name="sub_area_id" id="sub_area_id" class="form-control">
                            <option selected disabled>Select Area</option>
                            @foreach ($subarea as $areas)
                                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" mt-3 form-group col-lg-12">
                        <b>Content:</b>
                        <textarea name="content" id="editor" class=" form-control " rows="7" placeholder="Description">{{ old('description') }}</textarea>
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

{{-- <style>
    body {
        --ck-z-default: 100;
        --ck-z-modal: calc(var(--ck-z-default) + 999);
    }
</style> --}}
