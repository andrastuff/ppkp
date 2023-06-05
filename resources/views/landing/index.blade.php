@extends('layouts.landing.app')
@section('content')
        <!-- hero area start -->
         <section class="hero__area hero__height p-relative d-flex align-items-center" data-background="{{ asset('assets/frontend/assets/img/hero/home-1/hero-bg.jpg') }}">
            <div class="hero__shape">
               <img class="hero-circle-1" src="{{ asset('assets/frontend/assets/img/icon/hero/home-1/circle-1.png') }}" alt="">
               <img class="hero-circle-2" src="{{ asset('assets/frontend/assets/img/icon/hero/home-1/circle-2.png') }}" alt="">
               <img class="hero-triangle-1" src="{{ asset('assets/frontend/assets/img/icon/hero/home-1/triangle-1.png') }}" alt="">
               <img class="hero-triangle-2" src="{{ asset('assets/frontend/assets/img/icon/hero/home-1/triangle-2.png') }}" alt="">
            </div>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-7 col-xl-6 col-lg-6">
                     <div class="hero__content pr-80">
                        <h4 class="hero__title wow fadeInUp" data-wow-delay=".3s"><?php echo $data['judul']; ?></h4>
                        <p class="wow fadeInUp" data-wow-delay=".5s"><?php echo $data['deskripsi']; ?></p>
                        <div class="hero__search wow fadeInUp" data-wow-delay=".7s">
                            
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-6 col-lg-6">
                     <div class="hero__thumb text-end ml-220">
                        <div class="hero__thumb-wrapper p-relative ">
                           <img class="hero-circle" src="{{ asset('assets/frontend/assets/img/hero/home-1/hero-circle.png') }}" alt="">
   
                           <div class="hero__thumb-shape shape-1">
                              <img src="{{ asset('assets/frontend/assets/img/hero/home-1/hero-1.png') }}" alt="">
                           </div>
                           <div class="hero__thumb-shape shape-2">
                              <img src="{{ asset('assets/frontend/assets/img/hero/home-1/hero-2.png') }}" alt="">
                           </div>
                           <div class="hero__thumb-shape shape-3">
                              <img src="{{ asset('assets/frontend/assets/img/hero/home-1/hero-3.png') }}" alt="">
                           </div>
                           <div class="hero__thumb-shape shape-4">
                              <img src="{{ asset('assets/frontend/assets/img/hero/home-1/hero-4.png') }}" alt="">
                           </div>
                           <div class="hero__thumb-shape shape-5">
                              <img src="a{{ asset('assets/frontend/ssets/img/hero/home-1/hero-5.png') }}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- hero area end -->
@endsection