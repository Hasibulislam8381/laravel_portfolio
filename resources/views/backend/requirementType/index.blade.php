@extends('layouts.backend.master')
@section('title', 'All partner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
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
                                <h4 class="text-center">Active Requirement(Add photo and Featured type only if Want to view
                                    What You want) </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Requirement Name</th>
                                                <th>Photo</th>
                                                <th>Featured Type</th>
                                                <th>Parent Id</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ $requirement->name }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="60px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->featured_type }}</td>
                                                    <td>{{ $requirement->parent_id ? $requirement->parent_id : 'parent' }}
                                                    </td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->name }}','{{ $requirement->slug }}','{{ $requirement->parent_id }}','{{ $requirement->featured_type }}','{{ $requirement->m_title }}','{{ $requirement->m_keyword }}','{{ $requirement->m_description }}','{{ $requirement->m_photo }}','{{ $requirement->m_alt_text }}','{{ $requirement->custom_header }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.requirementType.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.requirementType.trash', $requirement->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeRequirement->links() }}
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
                                                <th>Requirement Name</th>
                                                <th>Photo</th>
                                                <th>Featured Type</th>
                                                <th>Parent Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ $requirement->name }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="60px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->featured_type }}</td>
                                                    <td>{{ $requirement->parent_id ? $requirement->parent_id : 'parent' }}
                                                    </td>

                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->name }}','{{ $requirement->parent_id }}','{{ $requirement->featured_type }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.requirementType.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.requirementType.trash', $requirement->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftRequirement->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Partners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Requirement name</th>
                                                <th>Photo</th>
                                                <th>Featured Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ $requirement->name }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="60px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->featured_type }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.requirementType.reStore', $requirement->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.requirementType.delete', $requirement->id) }}"
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
                                        {{ $trashedRequirement->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card m_top">
                    <div class="card-header">
                        <h4>Add Requirement Type</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.requirementType.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group">
                                <b>Requirement Type:</b>
                                <input type="text" name="name" class=" form-control"
                                    placeholder="Add Requirement type" value="{{ old('name') }}">
                            </div>
                            <!--<div class=" form-group">-->
                            <!--    <b>Select Parent:</b>-->
                            <!--    <select name="parent_id" id="" class="form-control">-->
                            <!--        <option selected disabled>Select Parent*</option>-->
                            <!--        @foreach ($parent as $parents)
    -->
                            <!--            <option value="{{ $parents->id }}">{{ $parents->name }}</option>-->
                            <!--
    @endforeach-->
                            <!--    </select>-->
                            <!--</div>-->
                            <div class="form-group">
                                <div class=" form-group col-lg-6">
                                    <b>Photo(300*300)</b>
                                    <input type="file" name="photo" class=" form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" mt-3 form-group col-lg-6">
                                    <b>Is it Featured?(It will Display in Home)</b>
                                    <select name="featured_type" class="form-control" id="">
                                        <option selected disabled>Select*</option>
                                        <option value="featured">Featured</option>
                                        <option value="not_featured">Not Featured</option>
                                    </select>
                                </div>
                            </div>
                            
                             <!--<div class="form-group mt-3">-->
                             <!--       <div class=" form-group">-->
                             <!--           <b>Meta Photo:</b>-->
                             <!--           <input type="file" name="meta_photo" class=" form-control" id="photoInput">-->
                             <!--           (16*9 ratio recomended)-->
                             <!--           <img id="previewImage" class="mt-3" src="#" alt="Preview"-->
                             <!--               style="display: none; max-width: 80px; max-height: 80px;">-->
                             <!--       </div>-->
                             <!--       <div class="form-group mt-3">-->
                             <!--           <b>Alter text:</b>-->
                             <!--           <input type="text" name="m_alt_text" class="form-control mt-2"-->
                             <!--               placeholder="Alter Text" value="{{ old('alt_text') }}">-->
                             <!--       </div>-->
                             <!--       <div class="form-group mt-3">-->
                             <!--           <b>Meta Title:</b>-->
                             <!--           <input type="text" name="m_title" class="form-control mt-2"-->
                             <!--               placeholder="Enter Meta Title" value="{{ old('m_title') }}">-->
                             <!--       </div>-->
                             <!--   </div>-->
                             <!--   <div class="form-group">-->
                             <!--       <div class="form-group mt-3">-->
                             <!--           <b>Meta Keyword:</b>-->
                             <!--           <input type="text" name="m_keyword" class="form-control mt-2"-->
                             <!--               placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">-->
                             <!--       </div>-->
                             <!--       <div class="form-group mt-3">-->
                             <!--           <b>Meta Description:</b>-->
                             <!--           <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ old('m_description') }}</textarea>-->
                             <!--       </div>-->
                             <!--       <div class="form-group mt-3">-->
                             <!--           <b>Header text:</b>-->
                             <!--           <textarea name="header_text" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ old('m_description') }}</textarea>-->
                             <!--       </div>-->
                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function updatedata(id, name, slug, parent_id, featured_type,m_title,m_keyword,m_description,m_photo,m_alt_text,custom_header) {
        $("#id").val(id);
        $("#name").val(name);
        $("#slug").val(slug);
        $("#parent_id").val(parent_id);
        $("#featured_type").val(featured_type);
        
        $("#m_title").val(m_title);
        $("#m_keyword").val(m_keyword);
         $("#m_description").val(m_description);
          $('#edit_image').attr('src', m_photo);
        $("#m_alt_text").val(m_alt_text);
        // $("#m_title").val(m_title);
        
        $("#custom_header").val(custom_header);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Requirement type Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.requirementType.update', $requirement->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <b>Requirement Name:</b>
                        <input type="text" name="name" id="name" class=" form-control"
                            placeholder="Enter name">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>
                    {{-- <!--<div class=" form-group">-->
                    <!--    <b>Select Parent:</b>-->
                    <!--    <select name="parent_id" id="" class="form-control">-->
                    <!--        <option selected disabled> Select Parent</option>-->
                    <!--        @foreach ($parent as $parents)
-->
                    <!--            <option value="{{ $parents->id }}">{{ $parents->name }}</option>-->
                    <!--
                    @endforeach-->
                    <!--    </select>-->
                    <!--</div>--> --}}
                    <div class="mt-3 form-group">
                        <b>Slug:</b>
                        <input class="form-control" type="text" name="slug" id="slug">
                    </div>
                    <div class=" form-group">
                        <b>Photo(300*300):</b>
                        <input type="file" name="photo" class=" form-control">
                        <img src="{{ $requirement->photo }}" width="60" alt="{{ $requirement->photo }}">
                    </div>
                    <div class=" mt-3 form-group col-lg-6">
                        <b>Is it Featured?(It will Display in Home)</b>
                        <select name="featured_type" class="form-control" id="">
                            <option selected disabled>Select*</option>
                            <option value="featured">Featured</option>
                            <option value="not_featured">Not Featured</option>
                        </select>
                    </div>
                    <!--<div class="mt-3 form-group">-->
                    <!--    <b>Meta title:</b>-->
                    <!--    <input class="form-control" type="text" name="m_title" id="m_title">-->
                    <!--</div>-->
              
                                
                    <!--<div class="mt-3 form-group">-->
                    <!--    <b>Meta Keyword:</b>-->
                    <!--    <input class="form-control" type="text" name="m_keyword" id="m_keyword">-->
                    <!--</div>-->
                    <!-- <div class="form-group mt-3">-->
                    <!--                    <b>Meta Description:</b>-->
                    <!--                    <textarea name="m_description" id="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1"></textarea>-->
                    <!--                </div>-->
                    <!-- <div class=" form-group mt-3">-->
                    <!--        <b>Meta Photo:</b>-->
                    <!--        <input type="file" name="m_photo" class=" form-control" id="edit_image">-->
                    <!--        <img src="{{ $requirement->m_photo }}" class="mt-3" width="60" alt="">-->
                    <!--        <img id="previewImage" class="mt-3" src="#" alt="Preview"-->
                    <!--            style="display: none; max-width: 80px; max-height: 80px;">-->
                    <!--    </div>-->
                    <!--          <div class="mt-3 form-group">-->
                    <!--    <b>Meta Alter text:</b>-->
                    <!--    <input class="form-control" type="text" name="m_alt_text" id="m_alt_text">-->
                    <!--</div>-->
                                
                                 
                                   
                    <!--                <div class="form-group mt-3">-->
                    <!--                    <b>Header text:</b>-->
                    <!--                    <textarea name="custom_header" id="custom_header" class="form-control mt-2" placeholder="Enter Meta Description" rows="1"></textarea>-->
                    <!--                </div>-->

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
