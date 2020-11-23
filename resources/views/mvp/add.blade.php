 @include('layouts.header')

  <body class="w3-light-grey">

	<!-- Navigation Bar -->
	@include('layouts.nav')

	<br><br>

	<div class="container text-center" >
	  <div class="row">
	  	<div id="add_mvp" class="col-md-8 w3-white w3-card w3-padding">
        <form action="{{ route('mvp.add') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="w3-right-align">
              <div>
                  <h4 class="w3-margin-top text-right w3-margin-bottom"> اضافة نموذج عمل    </h4> <br>
              </div>
              <div class="row" >
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>اسم المشروع</label>
                      <input dir="auto" class="form-control w3-border w3-margin-bottom w3-right-align" type="text" name="name">
                      @if ($errors->has('name'))
                        <p class="w3-padding alert-danger">{{ $errors->first('name') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>نوع المشروع</label>
                      <select class="form-control w3-border w3-margin-bottom w3-right-align" name="type">
                        @foreach($mvp_types as $type)
                          <option value="{{ $type->slug }}"> {{ $type->name }}  </option>
                        @endforeach
                      </select>
                      @if ($errors->has('type'))
                        <p class="w3-padding alert-danger">{{ $errors->first('type') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label> وصف عام عن المشروع  </label>
                        <textarea dir="auto" rows="8" placeholder="في اكثر من 50 واقل من 250 حرف اكتب وصف لنموذج العمل" class="form-control w3-border w3-right-align" name="description"></textarea>
                        @if ($errors->has('description'))
                          <p class="w3-padding alert-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>  رابط المشروع   </label>
                      <input class="form-control w3-border w3-margin-bottom w3-right-align" type="text"  name="mvp_link">
                      @if ($errors->has('mvp_link'))
                        <p class="w3-padding alert-danger">{{ $errors->first('mvp_link') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label> اسم فريد للمشروع </label>
                      <input dir="auto" class="form-control w3-border w3-margin-bottom w3-right-align"  type="text"  name="slug">
                      @if ($errors->has('slug'))
                        <p class="w3-padding alert-danger">{{ $errors->first('slug') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label> الادوات المستخدمة في التطوير </label>
                      <textarea dir="auto" rows="8" placeholder="في اكثر من 50 واقل من 250 حرف تحدث عن تقنيات التطوير التي استخدمتها" class="form-control w3-border w3-margin-bottom w3-right-align" name="dev_tools" ></textarea>
                      @if ($errors->has('dev_tools'))
                        <p class="w3-padding alert-danger">{{ $errors->first('dev_tools') }}</p>
                      @endif
                    </div>
                    <button id="add_file" class="w3-button w3-round custom-blue-bg w3-card w3-right" type="submit">اضف النموذج</button>
                </div>
              </div>
          </div>
       </form>
		</div>

    <div class="col-md-1"></div>

    <div class="col-md-3 w3-card w3-white add_mvp_helper">
      <div class="text-right">
        <h4 class="custom-blue-color">ماذا يعني نموذج  العمل </h4>
        <p class="user_text">
نموذج العمل هو اي مشروع سابق قمت بتطويره
حيث ان نماذج العمل السابقة تعد بمثابة الشهادة التي تثبت مقدرتك على العمل كمطور وتميزك عن غيرك من المطورين
        </p>
      </div>
      <div class="text-right">
        <h4 class="custom-blue-color">لماذا اضيف نموذج عمل</h4>
        <p class="user_text">
يتم استخدام نماذج العمل في جيت استارتب لتقييم المطورين
 كما تسهل من عملية البحث والوصول لملفك الشخصي في الموقع الامر الذي يزبد من احتمال توظيفك من قبل اصحاب المشاريع
        </p>
      </div>
      <div class="text-right">
        <h4 class="custom-blue-color">ما هي معايير تقييم نماذج العمل </h4>
        <p class="user_text">
يتم تقييم نماذج العمل بناءا على ثلاث معايير اساسية
1- التصميم الجيد والسهل في الفهم من قبل المستخدم (ui/ux)
2- الوظائف المكتملة (functionality)
3- السرعة في انجاز المهام (performance)
        </p>
      </div>
    </div>
	  </div>
	</div>

  <br><br>

<script src="{{ asset('assets/js/profile.js') }}"></script>
<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Footer -->
@include('layouts.footer')
