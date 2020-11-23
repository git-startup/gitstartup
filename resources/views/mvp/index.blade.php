@include('layouts.header')
<body>
  <body class="w3-light-grey">

  <!-- Navigation Bar -->
  @include('layouts.nav')
  <!-- Header -->

    <section class="container">

      @if(!Auth::check())
        <div class="alert alert-danger w3-center" style="margin-top: 50px">
          الرجاء قم <a class="w3-text-blue" href="/login">بتسجيل دخولك</a> لتتمكن من الاستفادة من خدمات الموقع
        </div>
      @endif

        <div class="mvp-single">

            <div class="row">
              <div class="col-md-8 w3-white w3-card">
                <h3 class="text-right custom-blue-color w3-margin-bottom"> <a target="_blank"  href="{{ $mvp->ling }}"> {{ $mvp->name }} </a>  </h3>

                <div class="text-right">
                  <div class="">
                    <p class="user_text">{{ $mvp->description }}</p>
                  </div>

                  <div class="">
                    <h3 class="custom-blue-color">  رابط المشروع </h3>
                    <p class="user_text"> <a target="_blank" class="w3-text-blue" href="{{ $mvp->mvp_link }}"> <i class="fa fa-link"></i> {{ $mvp->mvp_link }}</a> </p>
                  </div>

                  <div class="w3-margin-top">
                    <h3 class="custom-blue-color">الادوات المستخدمة في التطوير</h3>
                    <p class="lead user_text">{{ $mvp->dev_tools }}</p>
                  </div>
                </div>

                @if($mvp->images->count() != 0)
                  <div id="carousel_{{ $mvp->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php $count = 0 ?>
                      @foreach($mvp->images as $image)
                      <?php if($count == 0) : ?>
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}"  alt="صور المشروع">
                        </div>
                      <?php else : ?>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{ asset('site/mvp/images/'.$image->url)  }}"  alt="صور المشروع">
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
                @endif

                <div class="row">
                  @if(Auth::check())
                    @if($mvp->user_id == Auth::user()->id)
                      @if($mvp->images->count() == 0)
                        <div class="w3-margin">
                          <button type="button" onclick="document.getElementById('mvp_files_model').style.display='block'" class="w3-btn w3-card-4 w3-white"> تحميل صور للمشروع </button>
                        </div>
                      @endif
                    @endif
                  @endif

                  @if(Auth::check())
                    @if($mvp->user_id == Auth::user()->id)
                      <div id="mvp_files_model" class="w3-modal"> <!-- to upload mvp files -->
                        <div class="w3-modal-content brnda-card-4 w3-animate-zoom" style="max-width:880px">
                          <div class="">
                            <header class="w3-container w3-padding brnda-card"><i class="glyphicon glyphicon-upload"></i>
                                <h6 class="text-right"><i class="fa fa-image"></i> اضغط على المساحة الفارغة لتحميل صور المشروع </h6>
                                <p class="alert alert-info w3-right-align"> اقصى عدد مسموح به من الصور 5 </p>
                                <span onclick="document.getElementById('mvp_files_model').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                            </header>
                            <div class="container text-right">
                              <div id="mvp_msg"></div>
                              <div class="w3-section">
                                <div class="dropzone dz-clickable" id="mvp_myDrop">
                                  <div class="dz-default dz-message" data-dz-message="">
                                  </div>
                                </div>
                                <br>
                                <footer class="w3-margin-right">
                                  <button class="btn custom-blue-bg w3-card" id="upload_mvp_images" style="padding: 7px"><i class="fa fa-upload"></i> تحميل </button>
                                  <button type="button" onclick="document.getElementById('mvp_files_model').style.display='none'"
                                    class="btn custom-blue-bg w3-card " style="padding: 7px;"><i class="fa fa-arrow-right"></i> إلغاء</button>
                                </footer>
                                <br>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div><!-- end mvp files model-->
                  @endif
                @endif
              </div>
            </div>

            <div class="col-md-4">
              <div class="mvp_owner text-right ">
                <div class="w3-margin-bottom w3-card w3-white w3-padding">
                  <h4> مطور النموذج </h4>
                  <img src="{{ asset($mvp->user->image) }}" width="50" height="50" alt="">
                  <p>
                    <a class="w3-text-blue" href="/profile/{{ $mvp->user->username }}">{{ $mvp->user->name }}</a>
                  </p>
                  <p class="user_text">{{ $mvp->user->description }}</p>
                </div>
              </div>

              <div class="mvp_rating">
                <div class="text-right w3-margin-bottom w3-card w3-white w3-padding">
                  <!-- start add rating model -->
                  @if(Auth::check())
                    @if($mvp->user_id != Auth::user()->id)
                      <div class="w3-margin-bottom w3-margin-top">
                        <button type="button" onclick="document.getElementById('mvp_rating_{{ $mvp->id }}').style.display='block'" class="w3-card w3-white btn"> اضف تقييم للمشروع </button>
                      </div>
                    @endif
                    <div id="mvp_rating_{{ $mvp->id }}" class="w3-modal">
                      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:420px">
                          <header class="w3-container w3-border-bottom">
                              <h6 class="w3-right-align w3-margin-top"> اضافة تقييم للنموذج </h6>
                              <span onclick="document.getElementById('mvp_rating_{{ $mvp->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                          </header>
                          <form id="mvp_rating_form_{{ $mvp->id }}" action="{{ route('mvp.rating') }}" method="post">
                            @csrf
                            <section class="w3-container w3-right-align">
                              <div class="form-group w3-margin-top">
                                <label for="stars_for_design"> كيف تقييم التصميم </label>
                                <input type="number" placeholder="من 1 الى 5" min="1" max="5" name="stars_for_design" class="form-control" id="stars_for_design">
                              </div>
                              <div class="form-group">
                                <label for="stars_for_functionality"> كيف تقيم الوظائف  </label>
                                <input placeholder="من 1 الى 5" type="number" min="1" max="5" name="stars_for_functionality" class="form-control" id="stars_for_functionality">
                              </div>
                              <div class="form-group">
                                <label for="stars_for_performance"> كيف تقيم سرعة اداء المهام </label>
                                <input type="number" placeholder="من 1 الى 5" min="1" max="5" name="stars_for_performance" class="form-control" id="stars_for_performance">
                              </div>
                              <div class="form-group">
                                <label for="rating"> التعليق </label>
                                <textarea cols="6" rows="6" placeholder="التعليق على النموذج" name="rating" class="form-control" id="rating"></textarea>
                              </div>
                              <input type="hidden" name="mvp_id" value="{{ $mvp->id }}">
                              <footer class="" dir="rtl">
                                  <div class="w3-section w3-right">
                                      <button tabindex="1" title="حفظ" form="mvp_rating_form_{{ $mvp->id }}"  type="submit" name="mvp_rating_btn" value="حفظ" class="btn btn-success w3-card " style="padding: 5px 15px">
                                          <i class="fa fa-send-o w3-margin-left-8"></i><span> حفظ</span></span></button>
                                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('mvp_rating_{{ $mvp->id }}').style.display='none'"  class="btn btn-danger w3-card " style="padding: 5px 15px;">
                                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                  </div>
                              </footer>
                            </section>
                          </form>
                      </div>
                    </div>
                  @endif
                  <!-- end add rating model -->

                  <div class="">
                    @if($mvp->rating->count() > 0)
                      <h4> تقييم النموذج </h4>
                      @foreach($mvp->rating as $rating)
                        @if($rating->is_deleted == 0)
                          <div class="w3-border w3-padding text-right w3-margin-bottom">
                            <div class="">
                              <img src="{{ asset($rating->user->image) }}" width="50" height="50" alt="">
                              <p>
                                <a class="w3-text-blue" href="/profile/{{ $rating->user->username }}">{{ $rating->user->name }}</a>
                              </p>
                            </div>
                            <div class="">
                              <p> التصميم
                                @for($i=0; $i<$rating->stars_for_design; $i++)
                                  <i class="fa fa-star w3-text-amber"></i>
                                @endfor
                              </p>
                              <p> الوظائف
                                @for($i=0; $i<$rating->stars_for_functionality; $i++)
                                  <i class="fa fa-star w3-text-amber"></i>
                                @endfor
                              </p>
                              <p> الاداء
                                @for($i=0; $i<$rating->stars_for_performance; $i++)
                                  <i class="fa fa-star w3-text-amber"></i>
                                @endfor
                              </p>
                              <p class="user_text">{{ $rating->rating }}</p>
                              @if(Auth::check())
                                @if($rating->user_id == Auth::user()->id)
                                  <div class="">
                                    <form id="delete_rating_{{ $rating->id }}" action="{{ route('mvp.rating') }}" method="post">
                                      @csrf
                                      <input type="hidden" name="rating_id" value="{{ $rating->id }}">
                                      <button type="submit" form="delete_rating_{{ $rating->id }}" class="btn btn-danger" name="delete_rating">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </form>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        @endif
                      @endforeach
                      @else
                        <div class="w3-margin-bottom">
                          <p class="alert alert-info"> لم يتم اضافة تقييم للنموذج </p>
                        </div>
                      @endif
                      <!-- end users rating -->
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </section>

    <br><br><br><br><hr>


  @include('layouts.footer')

  <script src="{{ asset('assets/js/mvp.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>

  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
  </script>

  <!-- dropzone -->
  <script src="{{ asset('assets/vendor/js/dropzone/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/feature.js') }}"></script>

  <script>
    //Dropzone script
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#mvp_myDrop",
        {
            paramName: "images", // The name that will be used to transfer the file
            addRemoveLinks: true,
            uploadMultiple: true,
            autoProcessQueue: false,
            parallelUploads: 5,
            maxFilesize: 10, // MB
            acceptedFiles: ".png, .jpeg, .jpg, .gif, .zip, .pdf",
            url: "http://localhost:8000/mvp/images/upload?mvp_id={{ $mvp->id }}",
        });
    /* Add Files Script*/
    myDropzone.on("success", function(file, images){
        //$("#msg").html(images);
        //setTimeout(function(){window.location.href="http://localhost:8000/mvp/{{ $mvp->slug }}"},800);
       $("#mvp_msg").html('<div class="alert alert-success">تم تحميل الصور بنجاح سيتم مراجعة بيانات المشروع ومن ثم السماح بظهوره على الموقع في اسرع وقت</div>');
      //document.getElementById('msg').style.display = 'block';
    });
    myDropzone.on("error", function (data) {
        $("#mvp_msg").html('<div class="alert alert-danger">حصل خطأ اثناء التحميل الرجاء اعادة المحاولة في وقت لاحق</div>');
    });
    myDropzone.on("complete", function(file) {
        myDropzone.removeFile(file);
    });
    $("#upload_mvp_images").on("click",function (){
        myDropzone.processQueue();
    });


    function open_add_project() {
      var mvp = document.getElementById("add_mvp");
      if (mvp.style.display === 'block') {
          mvp.style.display = 'none';
          //overlayBg.style.display = "none";
      } else {
          mvp.style.display = 'block';
          //overlayBg.style.display = "block";
      }
    }

    function close_add_project() {
        mvp.style.display = "none";
        //overlayBg.style.display = "none";
    }
  </script>
</body>

</html>
