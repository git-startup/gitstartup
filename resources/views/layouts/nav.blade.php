<nav class="w3-bar custom-blue-bg">
  <a href="javascript:void(0)" onclick="open_main_nav()" class="w3-large w3-hide-large w3-bar-item w3-right w3-hide-medium" ><i class="fa fa-bars w3-text-white"></i></a>

  <a href="javascript:void(0)" onclick="user_avatar_menu()" class="w3-bar-item w3-button w3-hover-dark-grey">

    @if(Auth::check())
      <img src="{{ asset( Auth::user()->image )}}" style="width: 25px;height: 25px;" class="w3-circle"></a>
    @else
      <img src="{{ asset('site/images/logo/user-placeholder.jpg')}}" style="width: 25px;height: 25px;" class="w3-circle"></a>
    @endif

    <div id="notification">
      <notification-app></notification-app>
    </div>

    <div id="main_nav_links" class="w3-hide-small">
      <a href="{{ route('home_page') }}" class="w3-bar-item w3-hover-white w3-button w3-right w3-mobile text-right"><i class="fa fa-home"></i> الرئيسية</a>

      <a href="{{ route('mvp.list') }}" class="w3-bar-item w3-hover-white w3-button w3-right w3-mobile text-right"><i class="fa fa-code-fork"></i> نماذج عمل </a>

      <a href="{{ route('social.index') }}"class="w3-bar-item w3-hover-white w3-right w3-button w3-mobile text-right"><i class="fa fa-lightbulb-o"></i> استفسار جديد </a>

      <a href="{{ route('articles.list') }}"class="w3-bar-item w3-hover-white w3-right w3-button w3-mobile text-right"><i class="fa fa-link"></i>  التدوينات </a>
    </div>
</nav>

<!-- User Avatar Menu -->
<div class="w3-dropdown-content w3-border-top custom-blue-bg w3-border-bottom w3-bar-block notification_content" id="drop_content_profile" style="left: 0px">
    @if(Auth::check())
      <a href="/profile/{{ Auth::user()->username }}" class="w3-bar-item w3-hover-dark-grey text-center w3-border-bottom w3-button"> الملف الشخصي   </a>
    @else
      <a href="/login" class="w3-bar-item w3-hover-dark-grey text-center w3-border-bottom w3-button"> الملف الشخصي   </a>
    @endif
    <a href="javascript::void()" onclick="document.getElementById('ticket_model').style.display='block'" class="w3-bar-item w3-hover-dark-grey text-center w3-border-bottom w3-button"> <i class="fa fa-bullhorn"></i> فتح تذكرة     </a>
    <!--
    <a href="javascript::void()" onclick="document.getElementById('wallet_model').style.display='block'" class="w3-bar-item w3-hover-dark-grey text-center w3-border-bottom w3-button"> <i class="fa fa-credit-card"></i> المحفظة </a>
  -->
      <a href="{{ route('logout') }}" style="text-decoration: none;"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" class="w3-bar-item text-center w3-border-bottom w3-button w3-hover-dark-grey">تسجيل خروج</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
</div>

@if(Auth::check())
  @include('layouts.wallet')
@endif

@include('layouts.ticket')

@include('layouts.alerts')
