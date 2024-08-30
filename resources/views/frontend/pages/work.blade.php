@extends('layouts.frontend.master')
@section('content')
<div class="bostami-page-content-wrap">

    <!-- page title -->
    <div class="section-wrapper pl-60 pr-60 pt-60">
        <div class="bostami-page-title-wrap mb-15">
            <h2 class="page-title">Portfolio</h2>
        </div>
    </div>

    <div class="section-wrapper pr-60 pl-60 mb-60">
        <div class="row">

            <div class="col-12">
                <ul class="fillter-btn-wrap buttonGroup isotop-menu-wrapper mb-30 text_left">

                    <li class="fillter-btn is-checked " data-filter="*">All</li>
                 @foreach($project_types as $type)
                    <li class="fillter-btn" data-filter=".{{ strtolower(str_replace(' ', '-', $type->name)) }}">{{ $type->name }}</li>
                @endforeach
                    
                </ul>
            </div>

            <div class="col-12">
                <div id="fillter-item-active" class="fillter-item-wrap">
                    <div class="grid-sizer"></div>

                    @foreach($works as $project)
                    @php
                        $types = App\Models\RequirementType::where('id', $project->project_type_id)->pluck('name');
                        $classes = strtolower(implode(' ', $types->map(fn($name) => str_replace(' ', '-', $name))->toArray()));
                    @endphp
                    <div class="isotop-item {{ $classes }}">
                        <div class="fillter-item bg-catkrill">
                            <a class="img" href="{{ $project->url }}" target="_blank">
                                <img src="{{ $project->photo }}" alt="{{ $project->alt_text }}">
                            </a>
                            <span class="item-subtitle">{{ $project->language }}</span>
                            <h6 class="item-title">
                                <a href="{{ $project->url }}" target="_blank">{{ $project->name }}</a>
                            </h6>
                        </div>
                    </div>
                @endforeach


                   

                </div>

            </div>

        </div>
    </div>

    <!-- footer copyright -->
    <div class="footer-copyright text-center bg-light-white-2 pt-25 pb-25">
        <span>© 2024 All Rights Reserved by <a href="https://themeforest.net/user/elite-themes24"
                target="_blank" rel="noopener noreferrer">elite-themes24</a>.</span>
    </div>

</div>
</div>

{{-- portfolio modal --}}

<div class="modal portfolio-modal-box fade" id="portfolio-1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>

            <div class="modal-body">

                <h6 class="blog-title">
                    Chul urina
                </h6>

                <div class="portfolio-modal-table">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="portfolio-modal-table-text">
                                <i class="fa-regular fa-file-lines"></i>
                                Project : <span>Website</span>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="portfolio-modal-table-text">
                                <i class="fa-regular fa-user "></i>
                                Client : <span>Envato</span>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="portfolio-modal-table-text">
                                <i class="fa-solid fa-code"></i>
                                Langages : <span> Photoshop, Figma</span>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="portfolio-modal-table-text">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                Preview : <a href="#">www.envato.com</a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="h1-modal-paragraph">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga consequatur delectus porro
                        sapiente molestias, magni quasi sed, enim corporis omnis doloremque soluta inventore
                        dolorum conseqr quo obcaecati rerum sit non. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Fuga consequatur delectus porro sapiente molestias, magni quasi sed,
                        enim corporis omnis doloremque soluta inventore dolorum consequuntur quo obcaecati rerum
                        sit non.</p>

                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga consequatur delectus porro
                        sapiente molestias, magni quasi sed, enim corporis omnis doloremque soluta inventore
                        dolorum consetur quo obcaecati rerum sit non. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Fuga consequatur delectus porro sapiente molestias, magni quasi sed,
                        sit amet consectetur adipisicing elit. Fuga consequatur delectus porro sapiente
                        molestias, magni quasi sed, enim corporis omnis doloremque soluta inventore dolorum
                        consequuntur.</p>

                </div>
                <div class="h1-modal-img">
                    <img src="assets/img/work/portfolio-modal-img-1.jpg" alt="">
                </div>

            </div>

        </div>
    </div>
</div>
{{-- portfolio modal --}}
@endsection