@include ('layouts.header')
@include('layouts.alerts')

<body dir="rtl">


    <!-- Header area start   -->
    @include('layouts/home_nav')
    <!-- Header area End -->

    <!-- inrto start -->
    <section class="intro-area">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-top text-center w3-text-white wow bounceIn" data-wow-duration="1s" data-wow-delay=".5s" data-wow-offset="10" data-wow-iteration="1">
                <h2 class="custom-blue-color"> دعم تقني لفكرتك الناشئة </h2>
                <p class="w3-xxlarge">
                  تواصل ووظف واستفسر
                  <a href="#about-us" id='intro_read_more_btn' class="custom-bg w3-padding w3-small w3-hover-text-white"> تعرف على المزيد </a>
                </p>
              </div>
              <div class="w3-padding">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div id="home_signup">
                    <home_signup-app></home_signup-app>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end intro section -->

    <!-- owl-carousel slider Start -->
    <section class="" dir="ltr">
      <div class="carousel-slider owl-carousel text-center">
        <div class="single-slide w3-white w3-border">
            <div class="w3-container">
                <h5 class="w3-margin w3-large"> معلومات وتدوينات تقنية </h4>
                <span class="fa fa-code-fork custom-blue-color w3-xxlarge"></span>
                <p>
                  يضم الموقع عشرات التدوينات التقنية المبسطة للمبرمجين ولرواد الاعمال
                </p>
            </div>
        </div>
        <div class="single-slide w3-white w3-border">
            <div class="w3-container">
                <h5 class="w3-margin w3-large"> استفسارات وحلول </h4>
                <span class="fa fa-question-circle custom-blue-color w3-xxlarge"></span>
                <p>
                  تستطيع عبر الموقع طرح استفسار او المساعدة في الاجابة على الاستفسارت
                </p>
            </div>
        </div>
        <div class="single-slide w3-white w3-border">
            <div class="w3-container">
                <h5 class="w3-margin w3-large"> ابحث و وظف افضل المطورين </h4>
                <span class="fa fa-binoculars custom-blue-color w3-xxlarge"></span>
                <p>
                  تستطيع البحث عن افضل المطورين للعمل معك على تطوير فكرة مشروعك
                </p>
            </div>
        </div>
      </div>
    </section>
    <!-- end owl-carousel slider section -->

    <!-- about-us Section -->
    <section class="container about-us" id="about-us" dir="rtl">
        <div class="row text-right">
            <div class="col-md-8">
                <div class="">
                    <h2 class="custom-blue-color">ماذا يعني دعم تقني</h2>
                    <p class="w3-large">
المشاريع الناشئة تختلف عن المشاريع التقليدية من حيث عدم التأكد من احتياج المستخدم النهائي
حيث لابد من التعديل على المنتج البرمجي الى ان يتم الوصول لمنتج يلبي حاجة الفئة المستهدفة
جيت استارتب هي اول منصة توفر خدمة الدعم التقني لرواد الاعمال , حيث بامكانك البحث وتوظيف مبرمجين يعملون معاك على تطوير  حلولك البرمجية خطوة بخطوة الى ان تصل لمنتج يلبي احتياج عملائك المستهدفين

                        <a href="/guide" class="w3-text-blue">اعرف اكثر</a>
                    </p>
                    <div class="">
                        <a href="{{ route('login') }}" class="btn custom-blue-bg w3-margin w3-text-white">تسجيل دخول</a>
                        <a href="{{ route('register') }}" class="btn custom-blue-bg w3-margin w3-text-white">انشاء حساب جديد</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="">
                    <img src="site/images/logo.png" width="100%">
                </div>
            </div>
        </div>
    </section>

    <!-- last projects section -->
    <section class="projects_portfolio text-right" id="projects">
        <h3 class="custom-blue-color w3-margin">اخر نماذج العمل</h3>
        <div class="row">
          @foreach($mvps as $mvp)
            <div class="col-md-3 wow bounceInLeft" data-wow-duration=".5s" data-wow-delay=".5s">
                <div class="w3-padding w3-margin-bottom w3-white w3-card">
                  <div id="carousel_{{ $mvp->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php $count = 0 ?>
                      @foreach($mvp->images as $image)
                      <?php if($count == 0) : ?>
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}" width="100%" height="200" alt="صور المشروع">
                        </div>
                      <?php else : ?>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}" width="100%" height="200" alt="صور المشروع">
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
                <p class="w3-large w3-margin-top">
                  <a href="{{ route('mvp.index',['slug' => $mvp->slug]) }}" class="w3-text-blue" style="text-decoration: none">
                    {{ $mvp->name }}
                  </a>
                </p>
              </div>
            </div>
            @endforeach
        </div>
        <div class="w3-margin">
          <a href="{{ route('mvp.list') }}" class="custom-blue-color w3-card w3-padding w3-white w3-round"> عرض الجميع ... </a>
        </div>
    </section>
    <!-- end last projects section -->

    <!-- call to action section -->
    <section class="container w3-padding call-action w3-center" id="hiring_service">
      <div class="w3-card">
          <div class="w3-padding">
              <h3> ترغب في توظيف مبرمجين ولا تملك الوقت للبحث في المنصة </h3>
          </div>
          <div class="w3-padding">
              <button onclick="document.getElementById('hiring_request').style.display='block'" class="btn custom-blue-bg w3-button w3-large"> ارسل طلب توظيف </button>
          </div>
      </div>
    </section>
    <!-- start hiring model -->
    <div id="hiring_request" class="w3-modal" style="display: none;">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" >
            <header class="w3-container w3-border-bottom">
                <h6 class="w3-right-align w3-margin-top"> ترغب في توظيف افضل المبرمجين </h6>
                <span onclick="document.getElementById('hiring_request').style.display='none'" class="w3-btn w3-display-topleft">×</span>
            </header>
            <form action="{{ route('home.hiring') }}" method="post">
              <div class="w3-container w3-section row">
                @csrf
                <div class="form-group text-right col-md-6">
                  <label for="job_title">اسم الوظيفة</label>
                  <input type="text" name="job_title" id="job_title" class="form-control">
                </div>
                <div class="form-group text-right col-md-6">
                  <label for="sallary"> الراتب الشهري مع تحديد العملة </label>
                  <input type="text" name="sallary" id="sallary" class="form-control">
                </div>
                <div class="job_description text-right col-md-12">
                  <label for="job_description"> مهام وواجبات الوظيفة </label>
                  <textarea cols="8" rows="8" name="job_description" id="job_description" class="form-control"></textarea>
                </div>
                <div class="form-group w3-margin-top text-right col-md-12">
                  <label for="job_qualifications"> المهارات والخبرات والمؤهلات المطلوبة </label>
                  <textarea name="job_qualifications" id="job_qualifications" class="form-control" rows="8" cols="80"></textarea>
                </div>
                <div class="form-group text-right col-md-6">
                  <label for="phone"> رقم الهاتف الخاص بك </label>
                  <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group text-right col-md-6">
                  <label for="email"> الايميل الخاص بك </label>
                  <input type="text" name="email" id="email" class="form-control">
                </div>
              </div>

              <footer class="w3-container" dir="rtl">
                  <div class="w3-section w3-right">
                      <button tabindex="1" title="ارسال"  type="submit" name="hiring_btn" class="w3-btn w3-card custom-blue-bg w3-hover-light-grey w3-round" style="padding: 5px 15px">
                          <i class="fa fa-send w3-margin-left-8"></i><span> ارسال</span></span></button>
                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('hiring_request').style.display='none'"  class="w3-btn w3-card custom-blue-bg w3-hover-light-grey w3-round" style="padding: 5px 15px;">
                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                  </div>
              </footer>
            </form>
        </div>
    </div>
    <!-- end hiring model -->

    <!-- end call to action -->

    <!-- our articals sction -->
    <section class="container our-articals text-right" id="articals">
        <h3 class="w3-margin custom-blue-color">اخر التدوينات</h3>
        <div class="row">
          @foreach($articles as $article)
            <div class="col-md-4">
              <a href="{{ route('articles.single',['slug' => $article->slug]) }}" class="w3-hover-text-grey" style="text-decoration: none">
                <div class="w3-card w3-margin-bottom w3-padding">
                    <img src="{{ asset($article->image) }}" width="100%" height="200">
                    <p class="w3-padding w3-text-blue">{{ $article->heading }}</p>
                </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="w3-margin">
          <a href="{{ route('articles.list') }}" class="custom-blue-color w3-card w3-padding w3-white w3-round"> عرض الجميع ... </a>
        </div>
    </section>
    <!-- end our articals section -->


    <!-- site numbers section -->
    <section class="container-fluid site_numbers w3-center">
      <h3 class="custom-blue-color w3-right-align">بعض الارقام في الموقع</h3>
      <div class="row">
        <div class="col-md-4">
          <div class="site_numbers_box w3-card w3-margin w3-white ">
            <p class="">اكثر من <span class="custom-blue-color w3-xxlarge">{{ $mvp_count }}</span> نموذج عمل </p>
            <p class="custom-blue-color"><i class="fa fa-code w3-xxlarge"></i></p>
          </div>
        </div>
        <div class="col-md-4 site_numbers_middle_box">
          <div class="site_numbers_box w3-card w3-margin w3-white ">
            <p class="">اكثر من <span class="custom-blue-color w3-xxlarge">{{ $users_count }}</span> مستخدم </p>
            <p class="custom-blue-color"><i class="fa fa-users w3-xxlarge"></i></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="site_numbers_box w3-card w3-margin w3-white  ">
            <p class="">اكثر من <span class="custom-blue-color w3-xxlarge">{{ $work_count + $hiring_count }}</span> طلب توظيف </p>
            <p class="custom-blue-color"><i class="fa fa-briefcase w3-xxlarge"></i></p>
          </div>
        </div>
      </div>
      <div class="site_numbers_call_to_action">
        <a href="/register" class="w3-white custom-blue-color w3-large w3-card btn w3-padding">انشئ حسابك في لحظات  <i class="fa fa-spinner"></i> </a>
      </div>
    </section>
    <!-- end site numbers section -->


    <!-- footer section -->
    @include('layouts/home_footer')
    <!-- end footer section -->



    <script src="{{ asset('assets/js/mvp.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/owl-carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>


</body>
</html>
