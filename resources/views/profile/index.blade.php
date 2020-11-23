@include('layouts.header')

<body class="w3-light-grey" >

<!-- Navigation Bar -->
@include('layouts.nav')


<!-- Header -->
<div class="w3-display-container w3-white w3-content profile-user-info">
    <div class="w3-container w3-center" style="height:800">
      <img src="{{ asset($profile->image) }}" style="border-radius: 50%" class="w3-image w3-margin -large" width="100" height="100">
      <h3>{{ $profile->name }}</h3>
    </div>
    @if($check_if_worker > 0 OR Auth::user()->id == $profile->id)
      <div class="w3-row-padding w3-center info-icon" style="margin:32px 0;">
        @if(!$profile->location)
          <div class="alert alert-info"><i class="fa fa-map-marker"></i> لم يتم تحديد الموقع   </div>
        @else
          <div class=""><i class="fa fa-map-marker"></i> {{ $profile->location }} </div>
        @endif
        <div class=""><i class="fa fa-phone"></i> {{ $profile->phone }}</div>
        <div class=""><i class="fa fa-envelope-o"></i> {{ $profile->email }}</div>
      </div>
    @else
      <div class="w3-row-padding w3-center" style="margin:32px 20%;">
        <p class="alert w3-padding w3-text-red"> قم بارسال طلب عمل لتتمكن من رؤية معلومات الاتصال </p>
      </div>
    @endif

</div>

<div class="profile-link w3-hide-small">
  <div class="w3-hover-opacity  w3-hover-light-gray">
    <a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'info-tab');">الملف الشخصي</a>
  </div>

  @if(Auth::user()->id == $profile->id)
    <div class="w3-hover-opacity  w3-hover-light-gray">
      <a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'activity-tab');"> انشطتي </a>
    </div>

    <div class="w3-hover-opacity  w3-hover-light-gray">
      <a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'edit-tab');">تحديث البيانات الشخصية</a>
    </div>
  @else
    <div class="w3-hover-opacity  w3-hover-light-gray">
      <a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'rating-tab');"> تقييم المستخدم </a>
    </div>
    <div class="w3-hover-opacity  w3-hover-light-gray">
      <a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'contact-tab');">تواصل معي</a>
    </div>
  @endif
</div>

 <!-- on small screen -->
 <li id="bars" style="list-style-type: none;" class="w3-large w3-right w3-hide-large w3-hide-medium"><a class="w3-hover-text-black" href="javascript:void(0)" onclick="open_profile_menue()" ><i class="fa fa-bars w3-xlarge"></i></a></li>
  <nav id="profile_menu" class="w3-hover-none w3-bar-block" style="display:none">
      <i class="fa fa-caret-up w3-xlarge"></i>
      <ul class="w3-bar w3-large mobile-menue">
          <li class="w3-right-align"><a href="javascript:void(0)" class="tablink w3-button w3-card" onclick="openLink(event, 'info-tab');">الملف الشخصي</a></li>
           @if(Auth::user()->id == $profile->id)
            <li class="w3-right-align"><a href="javascript:void(0)" class="tablink w3-button w3-card" onclick="openLink(event, 'activity-tab');"> انشطتي </a> </li>
            <li class="w3-right-align"><a href="javascript:void(0)" class="tablink w3-button w3-card" onclick="openLink(event, 'edit-tab');"> البيانات الشخصية</a></li>
          @else
          <li class="w3-right-align">
            <a href="javascript:void(0)" class="tablink w3-button w3-card" onclick="openLink(event, 'rating-tab');"> تقييم المستخدم </a>
          </li>
          <li class="w3-right-align">
            <a href="javascript:void(0)" class="tablink w3-button w3-card" onclick="openLink(event, 'contact-tab');">تواصل معي</a>
          </li>
        @endif
      </ul>
  </nav>

<!-- Page content -->

<div class="w3-content" style="max-width:1100px;">

  <!-- user information section -->
  <div class="w3-padding-16 w3-right-align">

    <div id="info-tab" class="w3-margin-bottom myLink">

      <div class="container w3-white w3-card">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="w3-margin-top"> الاهتمامات ومهارات العمل </h3>
            @if(!$profile->skills)
              <p class="alert alert-info"> لم يتم تحديد الاهتمامات والمهارات   </p>
            @else
              <p class="user_text w3-large">{{ $profile->skills }}</p>
            @endif
          </div>
        </div>
      </div>
      <br>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 card card-body w3-white w3-card">
            <h3 class="w3-margin-right">{{ $profile->name }}</h3>
            @if(!$profile->description)
              <p class="w3-margin-right alert alert-info"> لم يتم اضافة نبذة تعريفية   </p>
            @else
              <p class="w3-margin-right user_text">{{ $profile->description }}</p>
            @endif
          </div>

          <div class="col-sm-2"></div>

          <div class="col-sm-4 w3-white w3-card w3-padding profile_avatar">
            <!-- user avatar -->
            <img src="{{ asset($profile->image) }}" class="w3-image " width="100%" height="250">
          </div>
        </div>
      </div>
    </div>

    <!-- user mvp section -->
    <div id="activity-tab" class="w3-margin-bottom myLink">
      <div class="container text-right w3-white">
        <div class="row">
          <div class="col-md-6">
              <h3 class="w3-margin w3-container">نماذج العمل</h3>
              @if($mvps->count())
                @foreach($mvps as $mvp)
                  <div class="w3-margin">
                    <div class="col-lg-12 w3-padding w3-white w3-card">
                      @if($mvp->is_approved == 1)
                        <h3><a class="w3-text-blue" href="/mvp/{{ $mvp->slug }}"> {{ $mvp->name }}  </a></h3>
                      @else
                        <h3> {{ $mvp->name }}</h3>
                        <p class="w3-text-red"> لم يتم الموافقة على نموذج العمل بعد </p>
                      @endif
                      <form action="{{ route('mvp.index',['slug' => $mvp->slug]) }}" method="post">
                        <input type="hidden" name="mvp_id" value="{{ $mvp->id }}">
                        @csrf
                        <button type="submit" name="delete_mvp" class="btn btn-danger w3-card w3-margin-bottom" >
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <a href="/mvp/edit/{{ $mvp->slug }}" class="btn btn-primary w3-card w3-margin-bottom"><i class="fa fa-edit"></i></a>
                        @if($mvp->is_available == 1)
                          <input type="submit" name="mvp_not_available" class="btn btn-warning w3-card w3-margin-bottom" value="تعطيل العرض">
                        @elseif($mvp->is_available == 0)
                          <input type="submit" name="mvp_is_available" class="btn btn-success w3-card w3-margin-bottom" value=" تفعيل العرض ">
                        @endif
                      </form>
                    </div>
                  </div>
                @endforeach
                @else
                <div class="w3-container w3-margin w3-padding">
                  <p class="alert alert-info">لم تقم باضافة مشروع بعد</p>
                </div>
              @endif
          </div>

          <div class="col-md-6">
            <div class="">
              <h3 class="w3-margin w3-container"> استفساراتي </h3>
              @if($status->count())
                @foreach($status as $status)
                <div class="w3-margin">
                  <div class="col-lg-12 w3-padding w3-right-align w3-white w3-card">
                      <a href="/social#status_{{ $status->id }}"> <i class="fa fa-link w3-text-blue"></i> <p class="user_text">{{ $status->body }}</p>  </a>
                      <form action="{{ route('status.post') }}" method="post">
                        <input type="hidden" name="status_id" value="{{ $status->id }}">
                        {{ csrf_field() }}
                        <button type="submit" name="delete_status" class="btn btn-danger w3-card w3-margin-bottom">
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <button type="button" onclick="document.getElementById('edit_status_{{ $status->id }}').style.display='block'" class="btn w3-card btn-primary w3-margin-bottom" > <i class="fa fa-edit"></i> </button>
                      </form>
                      <!-- edit status model  -->
                      <div id="edit_status_{{ $status->id }}" class="w3-modal" style="display: none;">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" >
                              <header class="w3-container w3-border-bottom">
                                  <h6 class="w3-right-align w3-margin-top"> التعديل على الاستفسار </h6>
                                  <span onclick="document.getElementById('edit_status_{{ $status->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                              </header>
                              <form id="edit_status_form_{{ $status->id }}" action="{{ route('status.post') }}" method="post">
                                <input type="hidden" name="status_id" value="{{ $status->id }}">
                                @csrf
                                <div class="form-group w3-margin w3-right-align">
                                  <textarea name="status" class="form-control" rows="8" cols="80">{{ $status->body }}</textarea>
                                </div>

                                <footer class="w3-container" dir="rtl">
                                    <div class="w3-section w3-right">
                                        <button form="edit_status_form_{{ $status->id }}" tabindex="1" title="حفظ"  type="submit" name="edit_status" value="حفظ" class="btn custom-blue-bg w3-card " style="padding: 7px 15px">
                                            <i class="fa fa-send-o w3-margin-left-8"></i><span> حفظ</span></span></button>
                                        <span tabindex="2" title="إلغاء" onclick="document.getElementById('edit_status_{{ $status->id }}').style.display='none'"  class="btn custom-blue-bg w3-card " style="padding: 7px 15px;">
                                            <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                    </div>
                                </footer>
                              </form>
                          </div>
                      </div>
                      <!-- end edit status model -->
                  </div>
                </div>
                @endforeach
                @else
                <div class="w3-container w3-margin w3-padding">
                  <p class="alert alert-info">لم تقم باضافة استفسار بعد</p>
                </div>
              @endif
            </div>
            <div class="w3-margin-top">
              <h3 class="w3-margin">تعليقاتي</h3>
              @if($comments->count())
                @foreach($comments as $comment)
                <div class="w3-margin">
                  <div class="col-lg-12 w3-padding w3-right-align w3-white w3-card">
                      <p class="user_text">{{ $comment->content }}</p>
                      <form action="/profile/{{ $profile->username }}" method="post">
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        {{ csrf_field() }}
                        <button type="submit" name="delete_comment" class="btn btn-danger w3-card w3-margin-bottom">
                          <i class="fa fa-trash-o"></i>
                        </button>
                      </form>
                  </div>
                </div>
                @endforeach
                @else
                <div class="w3-container w3-margin w3-padding">
                  <p class="alert alert-info">لم تقم باضافة تعليق بعد </p>
                </div>
              @endif
            </div>
          </div>

        </div>

      </div>

    </div>

    <!--  edit user information section -->
    <div id="edit-tab" class="w3-margin-bottom myLink">
      <div class="w3-white w3-card">
          <div class="w3-container">
            <h4 class="w3-margin-top">تحديث  بياناتك</h4>
            <form action="/profile/{{ $profile->username }}" method="post" enctype="multipart/form-data">
               @csrf

               <p class="form-group{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
                <label for="name">الاسم</label>
                <input class="form-control w3-right-align w3-padding-16 w3-border" type="text" id="location" value="{{ $profile->name }}" name="name">
                @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
              </p>

              <p class="form-group{{ $errors->has('location') ? ' alert alert-danger' : '' }}">
                <label for="location">مكان الاقامة</label>
                <input class="form-control w3-right-align w3-padding-16 w3-border" type="text" id="location" value="{{ $profile->location }}" name="location">
                @if ($errors->has('location'))
                  <span class="help-block">{{ $errors->first('location') }}</span>
                @endif
              </p>

              <p class="form-group{{ $errors->has('image') ? ' alert alert-danger' : '' }}">
                <label for="image">الصورة الشخصية</label>
                <input class="form-control w3-right-align w3-padding-16 w3-border" type="file" value="{{ $profile->image }}" id="image" name="image">
                @if ($errors->has('image'))
                  <span class="help-block">{{ $errors->first('image') }}</span>
                @endif
              </p>

              <p class="form-group{{ $errors->has('phone') ? ' alert alert-danger' : '' }}">
                <label for="phone">رقم الهاتف</label>
                <input class="form-control w3-right-align w3-padding-16 w3-border" type="text" id="phone" value="{{ $profile->phone }}" name="phone">
                @if ($errors->has('phone'))
                  <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
              </p>

              <p class="form-group{{ $errors->has('type') ? ' alert alert-danger' : '' }}">
                <label for="type">نوع الحساب</label>
                <select name="type" class="form-control">
                    @if($profile->type == 1)
                      <option value="1"> صاحب مشروع </option>
                      <option value="2">مبرمج \ مطور</option>
                    @else
                      <option value="2">مبرمج \ مطور</option>
                      <option value="1"> صاحب مشروع </option>
                    @endif
                </select>
                @if ($errors->has('type'))
                  <span class="help-block">{{ $errors->first('type') }}</span>
                @endif
              </p>

              <p class="form-group{{ $errors->has('skills') ? ' alert alert-danger' : '' }}">
                <label for="skills">الاهتمامات او مهارات العمل </label>
                <textarea rows="6" class="form-control w3-right-align w3-padding-16 w3-border" id="skills" name="skills">{{ $profile->skills }}</textarea>
                @if ($errors->has('skills'))
                  <span class="help-block">{{ $errors->first('skills') }}</span>
                @endif

              </p>

              <p class="form-group{{ $errors->has('description') ? ' alert alert-danger' : '' }}">
                <label for="description">نبذة مختصرة عنك</label>
                <textarea rows="6" class="form-control w3-right-align w3-padding-16 w3-border" id="description" name="description">{{ $profile->description }}</textarea>
                @if ($errors->has('description'))
                  <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
              </p>
              <p><input type="submit" class="btn w3-card custom-blue-bg w3-padding" name="btn_edit_profile" value="تحديث" /></p>
            </form>
          </div>
      </div>
    </div>

    <!--  contact me section -->
    <div id="contact-tab" class="w3-margin-bottom myLink">
      <div class="w3-white">
        @if($check_if_worker > 0)
          <div class="w3-container">
            <h4 class="w3-margin-top">كيف اخدمك</h4>
            <form action="/profile/{{ $profile->id }}" method="post">
              @csrf
              <p>
                <textarea rows="6" name="message" class="form-control w3-margin-top w3-right-align w3-padding-16 w3-border" placeholder="اكتب الرسالة  هنا" required name="message"></textarea>
              </p>
              <input type="hidden" id="to" name="to" value="{{ $profile->id }}">
              <p>
                <input type="submit" class="btn custom-blue-bg w3-card w3-padding" name="btn_contact" value="ارسال" />
              </p>
            </form>
          </div>
        @else
          <div class="w3-container" id="work_request">
            <div>
              <form action="{{ route('workers.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <work_request-app :settings="{{ $settings }}" :user="{{ $profile }}"></work_request-app>
                <input type="hidden" name="worker_id" value="{{ $profile->id }}">
            </div>
            <div class="w3-margin">
              <p class="alert alert-info"> لتتمكن من التواصل مع هذا المستخدم يرجى ارسال طلب توظيف </p>
              <button type="button" style="cursor: pointer" onclick="document.getElementById('agreement_model').style.display='block'" class="btn custom-blue-bg w3-card"> ارسال طلب توظيف </button>
            </div>
          </div>
        @endif
      </div>
    </div>

    <!-- rating tab  -->
    <!--  contact me section -->
    <div id="rating-tab" class="w3-margin-bottom myLink">
      <div class="w3-white">
        <div class="w3-container text-right">
          @if($user_rating->count() > 0)
            @foreach($user_rating as $rating)
              <div class="w3-margin bg-light w3-card w3-padding">
                <img src="{{ asset( App\User::find($rating->reviewer_id)->image ) }}" width="100" height="100" alt="">
                <p class="user_text">{{ $rating->rating }}</p>
                <p>
                  @for($i=0; $i<$rating->stars; $i++)
                    <i class="fa fa-star w3-text-amber"></i>
                  @endfor
                </p>
                <!-- to delete rating -->
                @if($rating->reviewer_id == Auth::user()->id)
                  <form action="/profile/{{ $profile->username }}" method="post">
                    @csrf
                    <input type="hidden" name="rating_id" value="{{ $rating->id }}">
                    <button type="submit" class="w3-card w3-red w3-button" name="delete_rating"> <i class="fa fa-times"></i> </button>
                  </form>
                @endif
              </div>
            @endforeach
          @else
            <br>
            <div class="alert alert-info">
              <p>لم يتم تقييم هذا المستخدم بعد</p>
            </div>
          @endif
          <br>
        </div>
        @if($check_if_worker > 0)
          <hr>
          <div class="w3-container">
            <h4 class="w3-margin-top"> اضافة تقييم جديد لمستخدم </h4>
            <form action="/profile/{{ $profile->id }}" method="post">
              @csrf
              <div class="form-group">
                <label for=""> عدد النجوم  </label>
                <input type="number" name="stars" min="0" max="5" class="form-control text-right">
              </div>
              <div class="form-group text-right">
                <label for=""> تقييم المستخدم </label>
                <textarea rows="6" name="rating" class="form-control w3-margin-top w3-right-align w3-padding-16 w3-border" placeholder="اكتب رأيك عن المستخدم هنا" required name="message"></textarea>
              </div>
              <input type="hidden" name="user_id" value="{{ $profile->id }}">
              <div class="">
                <input type="submit" class="btn custom-blue-bg  w3-padding" name="user_rating" value="اضافة التقييم" />
              </div>
            </form>
          </div>
          <br>
        @endif
      </div>
    </div>
    <!-- end rating tab -->

  </div>


<!-- End page content -->
</div>

<script src="{{ asset('assets/js/profile.js') }}"></script>
<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>


<!-- Footer -->
@include('layouts.footer')
