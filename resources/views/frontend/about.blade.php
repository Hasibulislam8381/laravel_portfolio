

<div class="bostami-page-content-wrap">

    <!-- page title -->
    <div class="section-wrapper pl-60 pr-60 pt-60">
        <div class="bostami-page-title-wrap mb-15">
            <h2 class="page-title">about</h2>
            <p>{{ $about->mission }}</p> 
        </div>
    </div>

    <!-- what-do -->
    <div class="section-wrapper pl-60 pr-60">

        <div class="bostami-section-title-wrap mt-30 mb-20">
            <h3 class="section-title">What I do!</h3>
        </div>

        <div class="bostami-what-do-wrap mb-30">
            <div class="row">

                <!-- single item -->
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="bostami-what-do-item bg-prink">
                        <div class="icon">
                            <i class="fa-solid fa-code"></i>
                          
                        </div>
                        <div class="text">
                            <h4 class="title">Web Development</h4>
                            <p>I build dynamic and responsive web applications using PHP, Laravel, Vue.js, and MySQL. My focus is on creating user-centric solutions with efficient coding practices and a collaborative approach.</p>


                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="bostami-what-do-item bg-catkrill">
                        <div class="icon">
                            <i class="fa-solid fa-table-cells"></i>
                        </div>
                        <div class="text">
                            <h4 class="title">Softer Tasting</h4>
                            <p>I am committed to delivering user-friendly and visually appealing solutions. My approach ensures that every interaction is both functional and enjoyable, prioritizing smooth and intuitive user experiences.</p>


                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="bostami-what-do-item  bg-catkrill">
                        <div class="icon">
                            <i class="fa-solid fa-camera-retro"></i>
                        </div>
                        <div class="text">
                            <h4 class="title">Ui/Ux Design</h4>
                            <p>I craft intuitive and engaging user interfaces with a focus on user experience. My designs prioritize usability, aesthetics, and accessibility to ensure seamless and enjoyable interactions.</p>

                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="bostami-what-do-item bg-prink bg-blue">
                        <div class="icon">
                            <i class="fa-solid fa-swatchbook"></i>
                        </div>
                        <div class="text">
                            <h4 class="title">Bug Fixing</h4>
                            <p>I identify and resolve bugs efficiently, ensuring your applications run smoothly and reliably. My focus is on diagnosing issues quickly and implementing effective solutions to enhance performance and user satisfaction.</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- client -->
    <div class="section-wrapper bg-light-white-2 pt-45 pb-60 pl-60 pr-60">

        <div class="bostami-section-title-wrap text-center mb-50">
            <h3 class="section-title">clinet</h3>
        </div>

        <div class="bostami-client-slider">
            <div class="swiper-container client_slide_active">
                <div class="swiper-wrapper">
                   @forelse ($partners as $partner)              
                    <!-- single item -->
                    <div class="swiper-slide">
                        <img class="bostami-client-slider-logo"
                            src="{{ $partner->photo }}" alt="">
                    </div>
                    @empty
                       
                   @endforelse

                  

                </div>
            </div>
        </div>

    </div>

    <!-- footer copyright -->
    <div class="footer-copyright text-center pt-25 pb-25">
        <span>© 2024 All Rights Reserved by <a href="https://themeforest.net/user/elite-themes24"
                target="_blank" rel="noopener noreferrer">elite-themes24</a>.</span>
    </div>

</div>
</div>
<!-- about-page-end -->
       