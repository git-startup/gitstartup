@include('layouts.header')

  <body class="w3-light-grey">

  <!-- Navigation Bar -->
  @include('layouts.nav')
  <!-- Header -->
<br><br>

<div class="container text-center">
  <div class="row">

    <!-- profile and other things -->
    <div class="col-md-3" id="social_card">
      <div class="w3-padding w3-card w3-white"  style="height: 400px!important;">
        <a  class="" href="/profile/{{ Auth::user()->username }}"> <p>{{ Auth::user()->username }}</p>
          <img src="{{ asset(Auth::user()->image) }}" class="w3-circle" height="55" width="55" alt="{{ Auth::user()->name }}">
        </a>
        <!-- search pepople by Interests section -->
        <div>
          <h4 class="">ابحث عن مبرمج </h4>
          <p> حسب سابقة اعماله  <i class="fa fa-search w3-large w3-center"></i></p>
          <p>
            <?php
              $classes = ['success','primary','warning','danger'];
              $i = 0;
            ?>
            @foreach($mvp_type as $type)
              <a href="{{ route('search.users',['can_work_on' => $type->slug]) }}" class="badge badge-<?php echo $classes[$i] ?> btn"> {{ $type->name }} </a>
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
    <div class="col-md-1">
    </div>

    <div class="col-md-8">

        <div class="w3-white w3-padding w3-card">
          <header class="text-right w3-margin-bottom">
            <h3> طلبات العمل </h3>
          </header>
          <div id="work_accept">
              @if($requests->count())
                @foreach($requests as $request)

                    @if($request->is_rejected == 0)
                      <div class="w3-border w3-padding text-right">
                        <p class="">{{ $request->work_title }}</p>
                        <div class="">
                            <img src="{{ asset($request->user->image) }}" style="width: 80px; height: 80px;">
                        </div>
                        <div class=""><a href="/profile/{{ $request->user->username }}" class="w3-text-blue" style="margin-right: 10px;">{{ $request->user->name }}</a></div>

                        <p class="">{{ $request->user->location }}</p>
                        <div class="" style="margin-top: 10px;">
                          <button onclick="document.getElementById('agreement_{{ $request->user->id }}').style.display = 'block'"  class="w3-white w3-card btn w3-round " style="padding: 7px 15px">
                                 عرض نص الاتفاق  <i class="fa fa-file-text w3-margin-left-8 w3-text-gray"></i></button>
                        </div>
                      </div>
                    @else
                      <div class="w3-padding w3-right-align">
                        <p class="alert alert-info"> لقد قمت بحذف هذا الطلب </p>
                      </div>
                    @endif

                    <!-- work request agreement model -->
                    <div id="agreement_{{ $request->user->id }}" class="w3-modal" style="display: none;">
                        <div class="w3-modal-content brnda-card-4 w3-animate-zoom">
                            <header class="w3-container w3-border-bottom">
                                <h4 class="w3-right-align user_text" dir="auto"><i class="fa fa-lightbulb-o w3-margin-left-8"></i>  {{ $request->work_title }}  </h4>
                                <span onclick="document.getElementById('agreement_{{ $request->user->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                            </header>
                              <div class="w3-container w3-section">
                                  <div class="w3-right-align user_text">
                                    <p> بداية العمل: <i class="fa fa-calendar"></i> {{ $request->start_of_agreement }} </p>
                                    <p> نهاية العمل: <i class="fa fa-calendar"></i> {{ $request->end_of_agreement }} </p>
                                    <p>  مبلغ التطوير: <i class="fa fa-money"></i> {{ $request->sallery }} دولار </p>
                                  </div>
                                  <hr>
                                  <p class="w3-right-align user_text" dir="auto"> {{ $request->agreement }} </p>

                                  <p class="w3-right-align user_text" dir="auto"> {{ $request->penalty }} </p>
                                  <hr>
                              </div>
                              <footer class="w3-container ">
                                @if($request->accepted == 0)
                                  <div class="w3-section w3-right">
                                    <form action="{{ route('workers.accept') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <input type="hidden" name="user_id" value="{{ $request->user_id }}">
                                      <input type="hidden" name="work_id" value="{{ $request->id }}">
                                      <work_accept-app :user_id="{{ $request->user_id }}" :work_id="{{ $request->id }}"></work_accept-app>
                                  </div>
                                @else
                                  <div class="w3-right-align">
                                    <p class="alert alert-info"> لقد قمت بالموافقة على الطلب </p>
                                  </div>
                                @endif
                              </footer>
                        </div>
                    </div>
                    <!-- end work agreement model -->
                    <br>
                @endforeach
              @endif

              @if($requests_pending->count())
                @foreach($requests_pending as $request)
                  <div class="w3-padding w3-border w3-right-align" style="height: 250px">
                    <p class="">{{ $request->work_title }}</p>
                    <img src="{{ App\User::find($request->worker_id)->image }}" width="100" height="100" alt="">
                    <p class="w3-text-blue"> <a href="/profile/{{ App\User::find($request->worker_id)->username }}"> {{App\User::find($request->worker_id)->username}} </a> </p>

                    <!--  to update work request to complete  -->
                    <form  action="{{ route('workers.complete') }}" method="post">
                      @csrf
                      <input type="hidden" name="work_id" value="{{ $request->id }}">
                      @if($request->is_completed == 0 AND $request->accepted == 1)
                        <button style="cursor: pointer" onclick="document.getElementById('complete_model').style.display='block'"  type="button" class="btn btn-success " name="complete_worker"> <i class="fa fa-check"></i> </button>
                      @endif
                      <!-- start work complete model -->
                      <div id="complete_model" class="w3-modal" style="display: none;">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:420px">
                            <header class="w3-container w3-border-bottom">
                                <h6 class="w3-right-align w3-margin-top"> تحويل حالة الاتفاق الى مكتمل </h6>
                                <span onclick="document.getElementById('complete_model').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                            </header>
                            <div class="w3-padding">
                              <p>
                                بضغطك على زر تم العمل فأنت تقر بتسلم المشروع كاملا <br>
                              </p>
                            </div>
                              <footer class="w3-container" dir="rtl">
                                  <div class="w3-margin-bottom w3-right">
                                      <button tabindex="1" title="تم الاتفاق"  type="submit" name="complete_worker" class="btn btn-success w3-round" style="padding: 7px 15px">
                                          <i class="fa fa-check w3-margin-left-8"></i> <span>تم العمل</span></span></button>
                                      <span tabindex="2" title="إلغاء" onclick="document.getElementById('complete_model').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                                          <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                  </div>
                              </footer>
                          </div>
                      </div>
                      <!-- end work complete model -->
                    </form>

                    @if($request->is_rejected == 1 OR $request->is_completed == 1)
                      <!-- delete work request -->
                      <form  action="{{ route('workers.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="work_id" value="{{ $request->id }}">
                        <button onclick="document.getElementById('delete_model').style.display='block'" style="cursor: pointer" type="button" class="btn btn-danger w3-right w3-margin-right"> <i class="fa fa-times-circle"></i> </button>
                        <!-- start delete work request model -->
                        <div id="delete_model" class="w3-modal" style="display: none;">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:420px">
                              <header class="w3-container w3-border-bottom">
                                  <h6 class="w3-right-align w3-margin-top"> حذف طلب العمل </h6>
                                  <span onclick="document.getElementById('delete_model').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                              </header>
                              <div class="w3-padding">
                                <p>
                                  هل انت متأكد من رغبتك في حذف هذا الطلب
                                </p>
                              </div>
                                <footer class="w3-container" dir="rtl">
                                    <div class="w3-margin-bottom w3-right">
                                        <button tabindex="1" title="متأكد"  type="submit" name="delete_worker" class="btn btn-success w3-card w3-round" style="padding: 7px 15px">
                                            <i class="fa fa-check w3-margin-left-8"></i> <span> متأكد </span></span></button>
                                        <span tabindex="2" title="إلغاء" onclick="document.getElementById('delete_model').style.display='none'"  class="btn btn-danger w3-card w3-round" style="padding: 7px 15px;">
                                            <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        <!-- end delete work request  model -->
                      </form>
                    @endif

                    @if($request->is_rejected == 1 OR $request->accepted == 0)
                      <!-- edit work request -->
                      <button type="button" onclick="document.getElementById('edit_work_request_{{ $request->id }}').style.display='block'" class="btn btn-primary w3-right w3-margin-right"> <i class="fa fa-edit"></i> </button>
                      <div id="edit_work_request_{{ $request->id }}" class="w3-modal" style="display: none;">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding: 20px;">
                            <span onclick="document.getElementById('edit_work_request_{{ $request->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                            <form id="edit_work_request_form_{{ $request->id }}" action="{{ route('workers.edit') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="w3-padding-16 row">
                                <div class="form-group{{ $errors->has('work_title') ? ' alert-danger' : '' }} col-md-6">
                                  <label for="work_title">اسم المشروع</label>
                                  <input type="text" id="work_title"  name="work_title" value="{{ $request->work_title }}" class="form-control">
                                  @if ($errors->has('work_title'))
                                    <span class="alert-danger">{{ $errors->first('work_title') }}</span>
                                  @endif
                                </div>
                                <div class="form-group{{ $errors->has('sallery') ? ' alert-danger' : '' }} col-md-6">
                                  <label for="sallery">تكلفة التطوير - بالدولار</label>
                                  <input type="number" min="150" id="sallery" name="sallery" value="{{ $request->sallery }}" class="form-control">
                                  @if ($errors->has('sallery'))
                                    <span class="alert-danger">{{ $errors->first('sallery') }}</span>
                                  @endif
                                </div>
                                <div class="form-group{{ $errors->has('start_of_agreement') ? ' alert-danger' : '' }} col-md-6">
                                  <label for="start_of_agreement">بداية الاتفاق</label>
                                  <input type="text" id="start_of_agreement" name="start_of_agreement" value="{{ $request->start_of_agreement }}" class="form-control">
                                  @if ($errors->has('start_of_agreement'))
                                    <span class="alert-danger">{{ $errors->first('start_of_agreement') }}</span>
                                  @endif
                                </div>
                                <div class="form-group{{ $errors->has('end_of_agreement') ? ' alert-danger' : '' }} col-md-6">
                                  <label for="end_of_agreement">نهاية الاتفاق</label>
                                  <input type="text" id="end_of_agreement" name="end_of_agreement" value="{{ $request->end_of_agreement }}" class="form-control">
                                  @if ($errors->has('end_of_agreement'))
                                    <span class="alert-danger">{{ $errors->first('end_of_agreement') }}</span>
                                  @endif
                                </div>
                                <div class="form-group{{ $errors->has('agreement') ? ' alert-danger' : '' }} col-md-12">
                                  <label for="agreement">نص الاتفاق</label>
                                  <textarea name="agreement" id="agreement" class="form-control" rows="8" cols="80">{{ $request->agreement }}</textarea>
                                  @if ($errors->has('agreement'))
                                    <span class="alert-danger">{{ $errors->first('agreement') }}</span>
                                  @endif
                                </div>
                                <input type="hidden" name="work_id" value="{{ $request->id }}">
                                <footer class="w3-container w3-right" dir="rtl" style="margin-right: 15px">
                                    <div class="">
                                        <button tabindex="1" title="تحديث" type="submit" form="edit_work_request_form_{{ $request->id }}" class="w3-button custom-blue-bg w3-card" style="padding: 7px 15px">
                                            <i class="fa fa-edit w3-margin-left-8"></i><span> تحديث </span></span></button>
                                        <span tabindex="2" title="إلغاء" onclick="document.getElementById('edit_work_request_{{ $request->id }}').style.display='none'"  class="w3-button custom-blue-bg w3-card" style="padding: 7px 15px;">
                                            <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                    </div>
                                </footer>
                            </form>
                          </div>
                        </div>
                        <!-- end edit work request model -->
                      </div>

                    @endif
                </div>
                @endforeach
              @endif


              @if(!$requests_pending->count() and !$requests->count())
                <div class="w3-padding w3-right-align">
                  <p class="alert alert-info"> لاتوجد طلبات عمل لعرضها حاليا </p>
                </div>
              @endif

          </div>
        </div>

        <br>
          <!-- hiring request -->
        <div class="w3-white w3-padding w3-card">
          <div class="w3-right-align w3-margin-top">
            <h3> طلبات التوظيف  </h3>
            @if($hiring_request->count())
              @foreach($hiring_request as $job_request)
                <div class="w3-border w3-padding">
                  <h3 class="user_text" dir="auto">{{ $job_request->job_title }}</h3>
                  <p dir="auto">{{ $job_request->sallary }} <i class="fa fa-money"></i> </p>
                  <p class="user_text" dir="auto">{{ $job_request->job_description }}</p>
                  <p class="user_text" dir="auto">{{ $job_request->job_qualifications }}</p>
                  <button type="button" onclick="document.getElementById('apply_for_jobs_{{ $job_request->id }}').style.display='block'" class="w3-white w3-card btn"> التقديم للوظيفة <i class="fa fa-briefcase"></i> </button>
                </div>
                <!-- apply for job model  -->
                <div id="apply_for_jobs_{{ $job_request->id }}" class="w3-modal" style="display: none;">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" >
                        <header class="w3-container w3-border-bottom">
                            <h6 class="w3-right-align w3-margin-top user_text" dir="auto"> التقديم لوظيفة {{ $job_request->job_title }} </h6>
                            <span onclick="document.getElementById('apply_for_jobs_{{ $job_request->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                        </header>
                        <form id="apply_for_jobs_form_{{ $job_request->id }}" action="{{ route('workers.apply_for_jobs') }}" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="job_id" value="{{ $job_request->id }}">
                          @csrf
                          <div class="row w3-padding">
                            <div class="form-group col-md-6 w3-right-align">
                              <label for="link">اي رابط للتواصل معك - رقم هاتف او ايميل</label>
                              <input type="text" name="link" id="link" required="required" class="form-control">
                              @if ($errors->has('link'))
                                <span class="alert-danger">{{ $errors->first('link') }}</span>
                              @endif
                            </div>
                            <div class="form-group col-md-6 w3-right-align">
                              <label dir="auto" for="cv"> ارفق السيرة الذاتية (pdf,png,jpg,doc) </label>
                              <input type="file" name="cv" id="cv" required="required" class="form-control">
                              @if ($errors->has('cv'))
                                <span class="alert-danger">{{ $errors->first('cv') }}</span>
                              @endif
                            </div>
                            <div class="form-group col-md-12 w3-right-align">
                              <label for="offer"></label>
                              <textarea name="offer" placeholder="اكتب طلب توظيفك او عرضك هنا" id="offer" class="form-control" rows="8" cols="80"></textarea>
                              @if ($errors->has('offer'))
                                <span class="alert-danger">{{ $errors->first('offer') }}</span>
                              @endif
                            </div>
                          </div>

                          <footer class="w3-container" dir="rtl">
                              <div class="w3-section w3-right">
                                  <button  form="apply_for_jobs_form_{{ $job_request->id }}" tabindex="1" title="حفظ"  type="submit" name="apply_for_jobs" class="w3-button custom-blue-bg w3-card" style="padding: 7px 15px">
                                      <i class="fa fa-send-o w3-margin-left-8"></i><span> ارسال</span></span></button>
                                  <span tabindex="2" title="إلغاء" onclick="document.getElementById('apply_for_jobs_{{ $job_request->id }}').style.display='none'"  class="w3-button custom-blue-bg w3-card" style="padding: 7px 15px;">
                                      <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                              </div>
                          </footer>
                        </form>
                    </div>
                </div>
                <!-- end apply_for_jobs model -->
              @endforeach
              @else
                <div class="w3-padding">
                  <p class="alert alert-info"> لاتوجد طلبات توظيف لعرضها حاليا </p>
                </div>
              @endif
          </div>

    </div>
  </div>
</div>

<br><br>
<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Footer -->
@include('layouts.footer')
