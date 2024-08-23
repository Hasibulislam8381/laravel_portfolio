@extends('layouts.backend.master')
@section('title', 'All Blogs')
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
                                <h4 class="text-center">Active Blogs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter text</th>
                                                <th>Auther Name</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeBlogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $blog->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->alt_text }}</td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->slug }}</td>
                                                    <td>{{ Str::limit($blog->description, 20, '...') }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.blog.edit', $blog->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.blog.status', $blog->id) }}"
                                                            class=" btn {{ $blog->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $blog->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.blog.trash', $blog->id) }}"
                                                            class="mt-2 btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft blogs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter Text</th>
                                                <th>Auther Name</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftBlogs as $blog)
                                            
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $blog->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->alt_text }}</td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->slug }}</td>
                                                    <td>{{ Str::limit($blog->description, 20, '...') }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.blog.edit', $blog->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.blog.status', $blog->id) }}"
                                                            class=" btn {{ $blog->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $blog->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.blog.trash', $blog->id) }}"
                                                            class="mt-2 btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed blogs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter Text</th>
                                                <th>Auther</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedBlogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $blog->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->alt_text }}</td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->slug }}</td>
                                                    <td>{{ Str::limit($blog->description, 20, '...') }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.blog.reStore', $blog->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.blog.delete', $blog->id) }}"
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
                                        {{ $trashedBlogs->links() }}
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

