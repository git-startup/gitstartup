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

      <div class="row">
      	<div class="col-lg-12">
      		<div class="w3-container w3-padding">
            	<div class="" style="width: 100%;">
    			  		<ul class="list-group list-group-flush">
    			            @if($results->count())
    			              @foreach($results as $result)
    			                  <li class="list-group-item w3-white w3-card w3-margin-bottom text-right searchResults" style="height: 100%">
    			                  	<div class="w3-right searchResults_image">
    				                  		<img src="{{ asset($result->user->image) }}">
    			                  	</div>

                              <div class="searchResults_name">
      			                  	<p><a href="/profile/{{ $result->user->username }}" class="w3-text-blue">{{ $result->user->name }}</a></p>
                              </div>

    				                  <div class="searchResults_location">
                                <p>{{ $result->user->location }}</p>
    			                  	</div>


                              <div class="w3-margin-top w3-clear">
                                <!-- link to user mvp -->
                                <br>
                                <ul class="w3-margin">
                                  @foreach(App\User::find($result->user->id)->mvps as $mvp)
                                    @if($mvp->type == $can_work_on)
                                      <li>
                                        <a class="w3-text-blue" href="{{ route('mvp.index',['slug' => $mvp->slug]) }}"> {{ $mvp->name }} </a>
                                        <p class="user_text" dir="auto">{{ mb_substr($mvp->description,0,100,'utf-8') }}...</p>
                                      </li>
                                    @endif
                                  @endforeach
                                </ul>
                              </div>

    			                  </li>
    			                  <br>
    			              @endforeach
                        <div class="w3-margin">
                          {!! $results->render() !!}
                        </div>
    			            @else
    			              <li class="list-group-item w3-right-align">
                          <p class="alert alert-info"> لا توجد نتائج لعرضها حاليا </p>
                          <img src="{{ asset('site/images/undraw/search.svg') }}" width="100%" height="300" alt="">
    			              </li>
    			            @endif
    			          </ul>
	      		      </div>
	    	        </div>
      	       </div>
             </div>
           </div>
         </div>
       </div>


      <script src="{{ asset('assets/js/script.js') }}"></script>
<!-- Footer -->
@include('layouts.footer')
