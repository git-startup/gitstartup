@include('dashboard/layouts/header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('dashboard/layouts/aside')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('dashboard/layouts/nav')

          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-right">
                        <h1 class="h4 text-gray-900 mb-4"> اضافة مستخدم جديد   </h1>
                      </div>
                      <form class="user" method="post" action="{{ route('dashboard.add_user') }}">
                        @csrf
                        <div class="row">

                          <div class="form-group col-md-6 text-right">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control text-right" >
                            @if ($errors->has('name'))
                              <span class="alert-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-6 text-right">
                            <label>اسم المستخدم</label>
                            <input type="text" name="username" class="form-control text-right" >
                            @if ($errors->has('username'))
                              <span class="alert-danger">{{ $errors->first('username') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-6 text-right">
                            <label> ايميل المستخدم </label>
                            <input type="text" name="email" class="form-control text-right" >
                            @if ($errors->has('email'))
                              <span class="alert-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-6 text-right">
                            <label> رقم الهاتف </label>
                            <input type="text" name="phone" class="form-control text-right" >
                            @if ($errors->has('phone'))
                              <span class="alert-danger">{{ $errors->first('phone') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-6 text-right">
                            <label> كلمة المرور  </label>
                            <input type="password" name="password" class="form-control text-right" >
                            @if ($errors->has('password'))
                              <span class="alert-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-6 text-right">
                            <label> اعد كتابة كلمة المرور  </label>
                            <input type="password" name="password_confirmation" class="form-control text-right" >
                            @if ($errors->has('password_confirmation'))
                              <span class="alert-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-12 text-right">
                            <label for="type"> نوع الحساب   </label>
                            <select class="form-control" name="type">
                              <option value="1">صاحب مشروع</option>
              								<option value="2">مطور</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12 text-right">
                            <p class="gender">
                                <label for="male" >ذكر</label>
                                <input class="w3-border w3-right-align" type="radio" name="gender" id="male" value="male" checked>
                                <label for="female">انثى</label>
                                <input class="w3-border w3-right-align" type="radio" name="gender" id="female" value="female">
                            </p>
                          </div>

                        </div>

                        <button type="submit" name="add_btn" class="btn btn-primary w3-right">
                          اضافة
                        </button>
                      </form>
                      <div class="w3-clear"></div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


      @include('dashboard/layouts/footer')

      <script src="{{ asset('dashboard/js/script.js') }}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>

  </body>

  </html>
