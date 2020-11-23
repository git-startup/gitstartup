<!DOCTYPE html>
<html lang="en">
<head>
    <title>Git Startup</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <img src="{{ asset('site/images/undraw/register.svg') }}" class="signimg">
            </div>
            <div class="col-md-6 signup">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <p class="text-secondary w3-right">لديك حساب  ? &nbsp;
                        <a class="text-primary" href="/login">تسجيل دخول</a>
                    </p>

                    <div class="form-group w3-right-align w3-margin-top w3-margin-bottom">
                      @if ($errors->has('name'))
                        <p class="w3-padding alert-danger">{{ $errors->first('name') }}</p>
                      @endif
                      @if ($errors->has('username'))
                        <p class="w3-padding alert-danger">{{ $errors->first('uusername') }}</p>
                      @endif
                      @if ($errors->has('phone'))
                        <p class="w3-padding alert-danger">{{ $errors->first('phone') }}</p>
                      @endif
                      @if ($errors->has('email'))
                        <p class="w3-padding alert-danger">{{ $errors->first('email') }}</p>
                      @endif
                      @if ($errors->has('password'))
                        <p class="w3-padding alert alert-danger">{{ $errors->first('password') }}</p>
                      @endif
                      @if ($errors->has('type'))
                        <p class="w3-padding alert alert-danger">{{ $errors->first('type') }}</p>
                      @endif
                      @if ($errors->has('gender'))
                        <p class="w3-padding alert alert-danger">{{ $errors->first('gender') }}</p>
                      @endif
                    </div>

                    <div id="register">
                      <register-app></register-app>
                    </div>

                    <button type="submit" class="btn custom-blue-bg w3-right">انشاء حساب</button>
                    <!--
                    <p class="w3-right w3-margin"> بانشاء حساب فانت توافق على  <a class="w3-text-blue" href="/policy">سياسة الاستخدام</a> </p>
                  -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
