@extends('layouts.backend.master')
@section('title', 'All Banner')
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
                                <h4 class="text-center">Active Faq</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeFaq as $faq)
                                                <tr>
                                                    <td>{{ $faq->id }}</td>
                                                    <td>{{ $faq->question }}</td>
                                                    <td>{!! Str::limit($faq->answer, 200) !!}</td>
                                                    <td class="td_btn">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $faq->id }}','{{ $faq->question }}','{{ $faq->answer }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.faq.status', $faq->id) }}"
                                                            class=" btn {{ $faq->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $faq->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.faq.trash', $faq->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeFaq->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Faq</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                              
                                                <th>Question</th>
                                                <th>Answer</th>
                                       
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftFaq as $faq)
                                            
                                                <tr>
                                                    <td>{{ $faq->id }}</td>
                                                    
                                                    <td>{{ $faq->question }}</td>
                                                    <td>{!! Str::limit($faq->answer, 200) !!}</td>
                                               
                                                 
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $faq->id }}','{{ $faq->question }}','{{ $faq->answer }}')"
                                                            class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.faq.status', $faq->id) }}"
                                                            class=" btn {{ $faq->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $faq->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.faq.trash', $faq->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftFaq->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Faq</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                
                                                <th>Question</th>
                                                <th>Answer</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedFaq as $faq)
                                                <tr>
                                                    <td>{{ $faq->id }}</td>
                                                   
                                                    <td>{{ $faq->question }}</td>
                                                    <td>{!! $faq->answer !!}</td>
                                              
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.faq.reStore', $faq->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.faq.delete', $faq->id) }}"
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
                                        {{ $trashedFaq->links() }}
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
    function updatedata(id,question,answer) {
        $("#id").val(id);
        $("#question").val(question);
        CKEDITOR.instances['editor'].setData(answer)
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Faq Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.faq.update', $faq->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-3">
                        <div class=" form-group">
                            <b>Question:</b>
                            <input type="text" name="question" id="question" class=" form-control"
                                placeholder="Question">
                                <input type="hidden" name="id" id="id">
                        </div>
                        <div class=" form-group">
                            <b>Answer:</b>
                            <textarea name="answer" id="editor" class="form-control" rows="7"></textarea>
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

