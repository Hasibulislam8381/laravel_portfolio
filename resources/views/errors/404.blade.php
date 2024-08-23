
@extends('layouts.frontend.master')
@section('content')
<main id="content">
<section class="pt-9 pb-10">
<div class="container" style="padding-top:60px">
<div class="text-center mb-15">
<img src="{{ asset('public/frontend/img/error/page-404.jpg') }}" alt="Page 404" class="mb-5">
<h1 class="fs-30 lh-16 text-dark font-weight-600 mb-5">Oops! That page can’t be found.</h1>
<p class="mb-8">It looks like nothing was found at this location. Maybe try one of the links below or a
search?</p> 
<a href="https://rents.com.bd/area/gulshan" class="custom-btn" style="margin-top:20px;" tabindex="0">Gulshan</a>
<a href="https://rents.com.bd/area/banani" class="custom-btn" style="margin-top:20px;" tabindex="0">Banani</a>
<a href="https://rents.com.bd/area/baridhara-diplomatic-zone" class="custom-btn" style="margin-top:20px;" tabindex="0">Baridhara Diplomatic Zone</a>
<a href="https://rents.com.bd/area/tejgaon" class="custom-btn" tabindex="0">Tejgaon</a>
<a href="https://rents.com.bd/property-type/furnished-apartment-rents-in-dhaka" class="custom-btn" style="margin-top:20px;" tabindex="0">Furnished Apartment</a>
<a href="https://rents.com.bd/property-type/apartment-rent-in-dhaka" class="custom-btn" style="margin-top:20px;" tabindex="0">Residential Apartment</a>
<a href="https://rents.com.bd/property-type/office-space-rent-in-dhaka" class="custom-btn" style="margin-top:20px;" tabindex="0">Office Space</a>
<a href="https://rents.com.bd/property-type/luxury-apartment-rent-in-dhaka" class="custom-btn" style="margin-top:20px;" tabindex="0">Luxury Apartment</a>
</section>
</main>

@endsection