<!DOCTYPE html>
<html lang="en">
<head>
    <title>Git Startup</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="قيت, استارتب, ربادة اعمال, دعم تقني, git, startup, gitstartup, قيت استارتب, تشبيك, مستثمرين, فكرة ناشئة, دعم تقني لفكرتك الناشئة, رواد الاعمال, مشروع ناشئ, تواصل مع مستثمرين, تواصل مع شركاء محتملين, ريادة اعمال السودان">
    <meta name="description" content="دعم تقني لفكرتك الناشئة">
    <meta name="author" content="Osama Mohammed">
    <link rel="stylesheet" href="assets/vendor/css/w3.css">
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
                    <img src="{{ asset('site/images/undraw/login.svg') }}" class="signimg">
                </div>
                <div class="col-md-6 fields">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="w3-margin">
                          <h1 class="text-secondary text-right">اهلا بك :)</h1>

                          <p class="w3-right text-secondary"> ليس لديك حساب ? &nbsp;
                              <a class="text-primary" href="/register">انشاء حساب</a>
                          </p>
                        </div>

                        <div id="login">
                          <login-app></login-app>
                        </div>

                        <div class="form-group w3-right-align w3-margin-top w3-margin-bottom">
                          @if ($errors->has('email'))
                            <p class="w3-padding alert-danger">{{ $errors->first('email') }}</p>
                          @endif
                          @if ($errors->has('password'))
                            <p class="w3-padding alert alert-danger">{{ $errors->first('password') }}</p>
                          @endif
                        </div>

                        <div class="login_btn">
                            <button type="submit" class="btn custom-blue-bg w3-right">تسجيل دحول</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
