@extends('layouts.frontend.master')
@section('content')
    
<div class="bostami-page-content-wrap">

    <!-- page title -->
    <div class="section-wrapper pl-60 pr-60 pt-60">
        <div class="bostami-page-title-wrap mb-15">
            <h2 class="page-title">resume</h2>
        </div>
    </div>

    <div class="section-wrapper pl-60 pr-60 mb-60">
        <div class="row">

            <!-- education -->
            <div class="col-xl-6 col-lg-7">
                <div class="bostami-section-title-wrap mb-20">
                    <h4 class="section-title"><i style="padding-right: 8px" class="fa-solid fa-user-graduate"></i>Education</h4>
                </div>

                <div class="bostami-card-wrap">
                    <div class="bostami-card-item bg-prink mb-20">
                        <span class="card-subtitle">2018-2022</span>
                        <h6 class="card-title">BSC in CSE <span>-IUBAT University,</span></h6>
                        <p class="card-text">Dhaka,Bangladesh</p>
                    </div>

                    <div class="bostami-card-item bg-catkrill mb-20">
                        <span class="card-subtitle">2016-2017</span>
                        <h6 class="card-title">Higher Secondary School Certificate<span>- Mohipur Govt. Collage</span></h6>
                        <p class="card-text">Panchbibi,Joypurhat</p>
                    </div>

                    <div class="bostami-card-item bg-prink">
                        <span class="card-subtitle">2014-2015</span>
                        <h6 class="card-title">Secondary School Certificate <span>-Banglahili Pilot School And Collage,</span></h6>
                        <p class="card-text">Los Angeles, CA</p>
                    </div>
                </div>



            </div>

            <!-- education -->
            <div class="col-xl-6 col-lg-5">
                <div class="bostami-section-title-wrap mb-20">
                    <h4 class="section-title"><i style="padding-right: 8px" class="fa-solid fa-briefcase"></i>experience</h4>
                </div>

                <div class="bostami-card-item bg-catkrill  mb-20">
                    <span class="card-subtitle">2023 - Present</span>
                    <h6 class="card-title">Jr. Software Developer</h6>
                    <p class="card-text">Techdyno Bd Ltd.</p>
                </div>

                <div class="bostami-card-item bg-prink mb-20">
                    <span class="card-subtitle">2023(Mar-Oct)</span>
                    <h6 class="card-title">Intern Fullstack Laravel Developer</h6>
                    <p class="card-text">Techdyno Bd Ltd.</p>
                </div>

                <div class="bostami-card-item bg-catkrill ">
                    <span class="card-subtitle">2022(Aug-Dec)</span>
                    <h6 class="card-title">Intern Php Developer</h6>
                    <p class="card-text">Pioneer Alpha.</p>
                </div>

            </div>

        </div>
    </div>

    <div class="section-wrapper bg-light-white-2 pt-70 pb-60 pl-60 pr-60">
        <div class="row">

            <!-- skill -->
            <div class="col-xl-6 col-lg-7">
                <div class="bostami-section-title-wrap mb-20">
                    <h4 class="section-title">Working Skills</h4>
                </div>

                <div class="skill-bar-wrap">

                    <div class="skill-bar-item mb-30">
                        <div class="title-wrap">
                            <h5 class="title">Web Design</h5>
                            <span class="count">98%</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-line progress-bg-1" style="width: 98%%;">
                            </div>
                        </div>
                    </div>

                    <div class="skill-bar-item mb-30">
                        <div class="title-wrap">
                            <h5 class="title">Mobile App</h5>
                            <span class="count">55%</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-line progress-bg-2" style="width: 55%;">
                            </div>
                        </div>
                    </div>

                    <div class="skill-bar-item mb-30">
                        <div class="title-wrap">
                            <h5 class="title">Illustrator</h5>
                            <span class="count">65%</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-line progress-bg-3" style="width: 65%;">
                            </div>
                        </div>
                    </div>

                    <div class="skill-bar-item">
                        <div class="title-wrap">
                            <h5 class="title">Photoshope</h5>
                            <span class="count">72%</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-line progress-bg-4" style="width: 72%;">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- gk -->
            <div class="col-xl-6 col-lg-5">
                <div class="bostami-section-title-wrap mb-20">
                    <h4 class="section-title">Knowledges</h4>
                </div>

                <div class="knowledeges-item-wrap">
                    <span class="gk-item">Digital Design</span>
                    <span class="gk-item">Marketing</span>
                    <span class="gk-item">Communication</span>
                    <span class="gk-item">Social Media</span>
                    <span class="gk-item">Time Management</span>
                    <span class="gk-item">Flexibility</span>
                    <span class="gk-item">Print</span>
                </div>

            </div>

        </div>



    </div>

    <!-- footer copyright -->
    <div class="footer-copyright text-center pt-25 pb-25">
        <span>©{{ $generalInfo->copyright_text }}</span>
    </div>

</div>
</div>
@endsection