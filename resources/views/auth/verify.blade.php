<!DOCTYPE html>
<html lang="en">
<head>
    <title>Git Startup</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="قيت, استارتب, ربادة اعمال, دعم تقني, git, startup, gitstartup, قيت استارتب, تشبيك, مستثمرين, فكرة ناشئة, دعم تقني لفكرتك الناشئة, رواد الاعمال, مشروع ناشئ, تواصل مع مستثمرين, تواصل مع شركاء محتملين, ريادة اعمال السودان">
    <meta name="description" content="دعم تقني لفكرتك الناشئة">
    <meta name="author" content="Osama Mohammed">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
    <body>
        <div class="container">
            <div class="row w3-card-4 w3-margin w3-padding-16" style="padding-bottom: 80px!important">
                <div class="col-md-6">
                    <img src="{{ asset('site/images/undraw/verfiy.svg') }}" class="signimg">
                </div>
                <div class="col-md-6 fields text-right">
                  <p class="w3-large"> لقد قمنا بارسال رسالة الى بريدك للتحقق  </p>
                  <p class="w3-large"> اذهب الى الايميل الخاص بك للتحقق من صحة البريد الالكتروني </p>
                  <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                      @csrf
                      <button type="submit" class="btn w3-dark-grey w3-padding"> اعد ارسال رسالة التحقق </button>
                  </form>
                  <div class="w3-margin">
                    <a href="/social"> التحقق من الايميل لاحقا </a>
                  </div>
                </div>
            </div>
        </div>
    </body>

</html>
