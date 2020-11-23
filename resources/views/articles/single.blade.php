@include('layouts.header')

  <body class="w3-light-grey">

  <!-- Navigation Bar -->
  @include('layouts.nav')
  <!-- Header -->

      <div class="container">

        @if(!Auth::check())
          <div class="alert alert-danger w3-center w3-padding" style="margin-top: 50px;">
            الرجاء قم <a class="w3-text-blue" href="/login">بتسجيل دخولك</a> لتتمكن من الاستفادة من خدمات الموقع
          </div>
        @endif

        <div class="row">
          <div class="col-md-8">
            <article class="single-article w3-white w3-card w3-padding text-right">
                <div class="">
                  <h3 dir="auto" class="custom-blue-color user_text">{{ $article->heading }}</h3>
                </div>
                <img src="{{ asset($article->image) }}" width="100%" class="article-main-img">
                <div class="article-text">
                    <p dir="auto" class="lead user_text">{{ $article->content }}</p>
                </div>
                <hr>
                <h3 dir="auto" class="custom-blue-color w3-margin-top user_text">{{ $article->sub_heading }}</h3>
                @if($article->bottom_image)
                  <img src="{{ asset($article->bottom_image) }}" class="article_sub_img">
                @endif
                <div class="article-text">
                    <p dir="auto" class="lead user_text">{{ $article->bottom_content }}</p>
                </div>
            </article>
          </div>
          <div class="col-md-4">
            <div class="another-articles">
              <div class="row">
                  @if($related_articles->count())
                    @foreach($related_articles as $related_article)
                      <div class="col-md-12 w3-margin-top">
                          <div class="w3-border w3-padding text-right">
                              <a href="/article/{{ $related_article->slug }}" style="text-decoration: none">
                                  <img src="{{ asset($related_article->image) }}" width="100%" height="100%">
                                  <h4 dir="auto" class="w3-text-blue user_text">{{ $related_article->heading }}</h4>
                              </a>
                          </div>
                      </div>
                    @endforeach
                  @else
                    <div class="col-md-12 w3-margin-top">
                      <div class="w3-white w3-padding">
                        <p class="alert alert-primary text-center w3-margin">لاتوجد مقالات مشابهة </p>
                      </div>
                    </div>
                  @endif
              </div>
              <div class="row">
                @foreach($advertisings as $advertising)
                  <div class="col-md-12 w3-margin-top">
                    <div class="text-right w3-border w3-padding" style="height: 100%">
                      <a href="{{ $advertising->link }}" class="w3-text-blue">
                        <h4 dir="auto" class="user_text w3-margin-top w3-padding">{{ $advertising->title }}</h4>
                      </a>
                      <img src="{{ asset($advertising->image) }}" width="100%">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
        </div>
      </div>

    <!-- comment section -->

    </div>

    <br><br><br>


@include('layouts.footer')

<script src="{{ asset('assets/js/mvp.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
