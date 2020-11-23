@include('layouts.header')
<body>
  <body class="w3-light-grey">

  <!-- Navigation Bar -->
  @include('layouts.nav')
  <!-- Header -->

  <header class="content-intro">
    <div class="container">


    </div>
  </header>


  <section class="articles-showcase">
    <div class="container">

      <div class="articles">

        @if(!Auth::check())
          <div class="alert alert-danger w3-center" style="margin-top: 50px;">
            الرجاء قم <a class="w3-text-blue" href="/login">بتسجيل دخولك</a> لتتمكن من الاستفادة من خدمات الموقع
          </div>
        @endif

        <div class="row">
            <div class="col-md-8">
              <div class="row">
                @if(count($articles) > 0)
                  @foreach($articles as $article)
                    <div class="col-md-12 w3-margin-top">
                      <div class="w3-white w3-card text-right w3-padding" style="height: 100%">
                        <a href="/article/{{ $article->slug }}" style="text-decoration: none">
                          <h3 dir="auto" class="w3-margin-top user_text w3-padding w3-text-blue">{{ $article->heading }}</h3>
                        </a>
                        <img src="{{ asset($article->image) }}" width="100%">
                        <p dir="auto" class="user_text text-right w3-margin-top">{{ mb_substr($article->content,0,500,'utf-8') }}...</p>
                      </div>
                    </div>
                  @endforeach
                  <div class="w3-margin">
                    {!! $articles->render() !!}
                  </div>
                @else
                <div class="col-md-12 w3-margin-top">
                  <div class="w3-white w3-padding w3-right-align">
                    <p class="alert alert-info"> لا توجد نتائج لعرضها حاليا </p>
                    <img src="{{ asset('site/images/undraw/search.svg') }}" width="100%" height="300" alt="">
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="col-md-4 w3-margin-top text-right">
              <div class="row">
                <div class="search-box col-md-12">
                  <div class="w3-padding w3-white w3-card ">
                    <h3 class="text-right">ابحث عن مقالة</h3>
                    <form action="" method="get">
                        <div class="form-group text-center">
                            <input id="search" type="search" name="query" class="form-control text-right" placeholder="ابحث عن مقالة">
                            <button type="submit" class="btn custom-blue-bg"> <i class="fa fa-search"></i> </button>
                        </div>
                    </form>
                  </div>
                </div>
                @foreach($advertisings as $advertising)
                  <div class="col-md-12 w3-margin-top">
                    <div class="text-right w3-card w3-white w3-padding" style="height: 100%">
                      <a href="{{ $advertising->link }}" class="w3-text-blue">
                        <h4 dir="auto" class="w3-margin-top user_text w3-padding">{{ $advertising->title }}</h4>
                      </a>
                      <img src="{{ asset($advertising->image) }}" width="100%" height="100%">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

        </div>
      </div>
      <br>

    </div>

  </section>


@include('layouts.footer')

<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
