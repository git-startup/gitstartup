<header class="header-area">
  <nav class="navbar navbar-expand-lg navbar-light top-nav">

    <!--<a class="navbar-brand brand" href="#"><img src="img/logo.png" width="100" height="100" alt="Git Startup" id="brand_image"></a>  -->
    <div class="">
       <a class="navbar-brand brand" id="home" href="/">
           <span class="w3-xlarge custom-blue-color" id="brand" style="font-family: Arial, Helvetica, sans-serif!important ">
               Git Startup
           </span>
       </a>
    </div>

      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon custom-bg"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <hr class="">
          <ul class="navbar-nav ml-auto nav-links w3-right-align">
            @if(!Auth::check())
              <li><a class="nav-item nav-link custom-blue-bg w3-round" style="color: #fff!important;margin-top: 3px;padding-right: 10px;" href="/login">  تسجيل دخول  </a></li>
            @else
              <li>
                <a href="{{ route('logout') }}" class="nav-item nav-link custom-blue-bg w3-round" style="color: #fff!important;margin-top: 3px;padding-right: 10px;"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">تسجيل خروج</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            @endif
            <li><a class="nav-item nav-link w3-large" href="#articals"> اخر التدوينات  </a></li>
            <li><a class="nav-item nav-link w3-large" href="#projects"> نماذج عمل مميزة </a></li>
            <li><a class="nav-item nav-link w3-large"  href="/#hiring_service"> خدمة التوظيف </a></li>
          </ul>
      </div>
  </nav>
</header>
