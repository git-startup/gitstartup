 @include('layouts.header')

  <body class="w3-light-grey">

	<!-- Navigation Bar -->
	@include('layouts.nav')

	<br><br>

	<div class="container text-center">
	  <div class="row">

	  	<div id="edit_mvp" class="col-md-8 w3-white w3-card w3-margin-bottom w3-padding">
			     <form action="/mvp/edit/{{ $mvp->slug }}" method="post" enctype="multipart/form-data">
				      @csrf
	            <div class="w3-right-align">
	                <div>
	                    <h4 class="w3-margin-top w3-margin-bottom"> تحديث بيانات المشروع </h4> <hr>
	                </div>
	                <div class="row">
	                    <div class="col-md-6 form-group{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
	                        <label>اسم المشروع</label>
                            <input class="form-control w3-border w3-margin-bottom w3-right-align" type="text" name="name" value="{{ $mvp->name }}">
                            @if ($errors->has('name'))
      			                  <span class="help-block">{{ $errors->first('name') }}</span>
      			                @endif
	                    </div>
	                    <div class="form-group col-md-6">
	                        <label>نوع المشروع</label>
	                        <select class="form-control w3-border w3-margin-bottom w3-right-align" name="type">
                            <option selected value="{{ $mvp->type }}"></option>
                            @foreach($mvp_type as $type)
	                            <option value="{{ $type->slug }}"> {{ $type->name }}  </option>
                            @endforeach
	                        </select>
	                    </div>
	                    <div class="col-md-12 form-group{{ $errors->has('description') ? ' alert alert-danger' : '' }}">
	                        <label> وصف عام عن المشروع  </label>
                            <textarea rows="8" class="form-control w3-border w3-right-align" name="description" >{{ $mvp->description }}</textarea>
                            @if ($errors->has('description'))
      			                  <span class="help-block">{{ $errors->first('description') }}</span>
      			                @endif
	                    </div>
                      <div class="col-md-12 form-group{{ $errors->has('mvp_link') ? ' alert alert-danger' : '' }}">
	                        <label>رابط المشروع</label>
                            <input class="form-control w3-border w3-margin-bottom w3-right-align" type="text" name="mvp_link" value="{{ $mvp->mvp_link }}">
                            @if ($errors->has('mvp_link'))
      			                  <span class="help-block">{{ $errors->first('mvp_link') }}</span>
      			                @endif
	                    </div>
	                    <div class="col-md-12 form-group{{ $errors->has('dev_tools') ? ' alert alert-danger' : '' }}">
	                        <label> الادوات المستخدمة في التطوير </label>
                            <textarea rows="8" class="form-control w3-border w3-margin-bottom w3-right-align" name="dev_tools" >{{ $mvp->dev_tools }}</textarea>
                            @if ($errors->has('dev_tools'))
      			                  <span class="help-block">{{ $errors->first('dev_tools') }}</span>
      			                @endif
                    	</div>

                    	<input type="hidden" name="mvp_id" value="{{ $mvp->id }}">

	                    <input type="submit" class="btn custom-blue-bg w3-card w3-padding w3-margin-right w3-margin-bottom" name="btn_edit_mvp" value="تحديت المشروع">
	                </div>

	            </div>
	        </form>
		   </div>

       <div class="col-md-4">
         @foreach($mvp->images as $image)
           <div class="w3-margin-bottom w3-white w3-card w3-padding">
             <img src="{{ asset('site/mvp/images/'.$image->url) }}" width="100%" alt="">
             <form action="/mvp/edit/{{ $mvp->slug }}" class="text-right w3-margin" method="post">
               @csrf
               <input type="hidden" name="mvp_image_id" value="{{ $image->id }}">
               <input type="hidden" name="mvp_id" value="{{ $mvp->id }}">
               <button style="border: 0px;cursor: pointer" class="w3-white" type="submit" name="delete_mvp_image"><i class="fa fa-trash-o w3-large w3-text-red"> حذف </i></button>
             </form>
           </div>
         @endforeach
       </div>

	   </div>
	</div>

<script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.nicefileinput.min.js') }}"></script>

<script type="text/javascript">
/* <![CDATA[ */
$(document).ready(function(){
	// your code...
	$("input[type=file]").nicefileinput();
});
/* ]]> */
</script>

<script src="{{ asset('assets/js/profile.js') }}"></script>
<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>


<!-- Footer -->
@include('layouts.footer')
