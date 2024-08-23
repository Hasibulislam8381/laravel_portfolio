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
                <ul class="fillter-btn-wrap buttonGroup isotop-menu-wrapper mb-30">
                    <li class="fillter-btn is-checked " data-filter="*">All</li>
                    <li class="fillter-btn" data-filter=".mockup">Mockup</li>
                    <li class="fillter-btn" data-filter=".design"> Graphic Design</li>
                    <li class="fillter-btn" data-filter=".logo"> logo</li>
                </ul>
            </div>

            <div class="col-12">
                <div id="fillter-item-active" class="fillter-item-wrap">
                    <div class="grid-sizer"></div>

                    <!-- signle item -->
                    <div class=" isotop-item mockup logo">
                        <div class="fillter-item bg-prink">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-1.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#portfolio-1">Chul
                                    urina</a>
                            </h6>
                        </div>
                    </div>

                    <!-- signle item -->
                    <div class=" isotop-item design mockup">
                        <div class="fillter-item bg-catkrill">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-2.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#portfolio-1">Aura
                                    Dione</a>
                            </h6>
                        </div>
                    </div>

                    <!-- signle item -->
                    <div class=" isotop-item logo mockup">
                        <div class="fillter-item bg-catkrill ">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-3.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#portfolio-1">T-Shirt Design</a>
                            </h6>
                        </div>
                    </div>

                    <!-- signle item -->
                    <div class=" isotop-item mockup">
                        <div class="fillter-item bg-prink">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-4.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#portfolio-1">Packaging Box</a>
                            </h6>
                        </div>
                    </div>

                    <!-- signle item -->
                    <div class="isotop-item design logo">
                        <div class="fillter-item bg-prink">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-5.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#portfolio-1">Modern Bag Design</a>
                            </h6>
                        </div>
                    </div>

                    <!-- signle item -->
                    <div class="isotop-item mockup design">
                        <div class="fillter-item bg-catkrill">
                            <a class="img" href="#" data-bs-toggle="modal"
                                data-bs-target="#portfolio-1">
                                <img src="{{ asset('public/frontend/img/work/work-img-6.png') }}" alt="">
                            </a>
                            <span class="item-subtitle">Travel Landing , UX/UI </span>
                            <h6 class="item-title">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#portfolio-1">Chul
                                    urina</a>
                            </h6>
                        </div>
                    </div>

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
                    <i class="far fa-times"></i>
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