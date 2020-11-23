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
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> اضافة اعلان جديد </h1>
                      </div>
                      <form class="user" method="post" action="{{ route('dashboard.advertising') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-right">
                          <label> عنوان الاعلان </label>
                          <input type="text" name="title" class="form-control text-right" >
                          @if ($errors->has('title'))
                            <span class="alert-danger">{{ $errors->first('title') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label> رابط المقالة </label>
                          <input type="text" name="link" class="form-control text-right" >
                          @if ($errors->has('link'))
                            <span class="alert-danger">{{ $errors->first('link') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label> صورة الاعلان </label>
                          <input type="file" name="image" class="form-control text-right" >
                          @if ($errors->has('image'))
                            <span class="alert-danger">{{ $errors->first('image') }}</span>
                          @endif
                        </div>
                        <button type="submit" name="add_advertising" class="btn btn-primary w3-right">
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
