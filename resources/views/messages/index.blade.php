@include('layouts.header')

<body class="w3-light-grey" style="overflow: hidden">

<!-- Navigation Bar -->
@include('layouts.nav')


<br><br>
<div class="container w3-margin-top">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card w3-card" style="border: 0px!important">
                <div class="card-header w3-right-align">
                  <span class="custom-blue-color">
                    <i onclick="open_contacts_list()" class="fa fa-bars custom-blue-color w3-large w3-margin-left w3-margin-top" style="cursor: pointer"></i>
                    اختر مستخدم لبدء المحادثة
                  </span>
                </div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ Auth::user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/mail.js') }}"></script>


<!-- Footer -->
@include('layouts.footer')
