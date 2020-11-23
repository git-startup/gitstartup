@include('layouts.header')

<body class="w3-light-grey">

  <!-- Navigation Bar -->
  @include('layouts.nav')
  <!-- Header -->


<div class="container text-center mvp_list">

  @if(!Auth::check())
    <div class="alert alert-danger w3-center" style="margin-top: 50px;">
      الرجاء قم <a class="w3-text-blue" href="/login">بتسجيل دخولك</a> لتتمكن من الاستفادة من خدمات الموقع
    </div>
  @endif

  <div class="row">

    <!-- profile and other things -->
    <div class="col-md-3" id="social_card">
      <div class="w3-padding w3-card w3-white"  style="height: 400px!important;">
        @if(Auth::check())
          <a  class="" href="/profile/{{ Auth::user()->username }}"> <p>{{ Auth::user()->username }}</p>
            <img src="{{ asset(Auth::user()->image) }}" class="w3-circle" height="55" width="55" alt="{{ Auth::user()->name }}">
          </a>
        @else
        <a  class="" href="#"> <p>اهلا بك </p>
          <img src="{{ asset('site/images/logo/user-placeholder.jpg') }}" class="w3-circle" height="55" width="55" alt="user Avatar">
        </a>
        @endif
        <!-- search mvp by type section -->
        <div>
          <h4 class=""> ابحث  عن <i class="fa fa-search w3-large w3-center"></i> </h4>
          <p>
            <?php
              $classes = ['success','primary','warning','danger'];
              $i = 0;
            ?>
            @foreach($mvp_type as $type)
              <a href="{{ route('mvp.search',['type' => $type->slug]) }}" class="badge badge-<?php echo $classes[$i] ?> btn"> {{ $type->name }} </a>
              <?php
                if(isset($classes[$i+1])){
                    $i++;
                }else $i = 0;
              ?>
            @endforeach
          </p>
        </div>
      </div>
    </div>

    <!-- to make margin -->
    <div class="col-md-1"></div>

    <div class="col-md-8">

      @if(Auth::check())
        @if(Auth::user()->type == 2)
          <div class="w3-margin-bottom w3-right-align">
            <a href="{{ route('mvp.add') }}" class="w3-card w3-white btn"><i class="fa fa-plus"></i> اضافة نموذج جديد</a>
          </div>
        @endif
      @endif

      @if($mvps->count())
        @foreach($mvps as $mvp)
            <div class="w3-card w3-margin-bottom w3-white w3-padding text-right">
              <div class="">
                <h3 style="position: relative; top: 5px;"><a href="/mvp/{{ $mvp->slug }}" class="w3-text-blue">{{ $mvp->name }}</a></h3>

                  <div class="">
                    <p class="user_text text-right w3-margin-top">{{ mb_substr($mvp->description,0,100,'utf-8') }}...</p>
                  </div>

                  <div id="carousel_{{ $mvp->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php $count = 0 ?>
                      @foreach($mvp->images as $image)
                      <?php if($count == 0) : ?>
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}" height="300" alt="صور المشروع">
                        </div>
                      <?php else : ?>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}" height="300" alt="صور المشروع">
                        </div>
                      <?php endif; ?>
                      <?php $count += 1 ?>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev w3-opacity-off" href="#carousel_{{ $mvp->id }}" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w3-opacity-off" href="#carousel_{{ $mvp->id }}" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a> <br>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="w3-margin">
              {!! $mvps->render() !!}
            </div>

          @else
            <div class="w3-card col-md-12 w3-padding w3-right-align w3-white">
              <p class="alert alert-info"> لا توجد نتائج لعرضها حاليا </p>
              <img src="{{ asset('site/images/undraw/search.svg') }}" width="100%" height="300" alt="">
            </div>
        @endif
     </div>
   </div>


 </div>

<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Footer -->
@include('layouts.footer')
