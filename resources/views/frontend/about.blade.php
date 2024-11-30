@extends('frontend.layouts.app')


@section('breadcrumb')
<div class="breadcrumb__area breadcrumb__overlay breadcrumb__height fix p-relative"
         data-background="assets/img/breadcurmb/breadcurmb-1-10.jpg">
         <div class="breadcrumb-shap d-none d-xxl-block">
            <img src="assets/img/breadcurmb/img-2.png" alt="img">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-5 col-md-5">
                  <div class="breadcrumb__content z-index">
                     <div class="breadcrumb__section-title-box">
                        <h3 class="breadcrumb__title">About</h3>
                     </div>
                     <div class="breadcrumb__list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i>/</i></span>
                        <span>About</span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-md-7">
                  <div class="breadcrumb-img z-index-3">
                     <div class="breadcrumb-img mt-140">
                        <img src="assets/img/breadcurmb/img.png" alt="img">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection