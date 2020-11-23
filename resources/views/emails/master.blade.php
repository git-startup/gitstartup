<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body dir="rtl">
<div style="border: 1px solid #000; padding: 15px 40px">
    @yield('content')
</div>
<div style="background: #000; padding: 15px;color: #fff;text-align: center">
    © {{date('Y').' all right recived for Git Startup'}}
</div>
</body>
</html>
