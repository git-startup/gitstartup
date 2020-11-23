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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة طلبات التوظيف  </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                جدول طلبات التوظيف
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th> الوظيفة </th>
                      <th> معلومات صاحب الوظيفة </th>
                      <th> معلومات المتقدم للوظيفة </th>
                      <th>  العمليات </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> الوظيفة </th>
                      <th> معلومات صاحب الوظيفة </th>
                      <th> معلومات المتقدم للوظيفة </th>
                      <th>  العمليات </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($applications as $application)
                      <tr class="text-right">
                        <td>
                          <button type="button" onclick="document.getElementById('job_{{ $application->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- job  model -->
                          <div id="job_{{ $application->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:620px">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> تفاصيل الوظيفة </h6>
                                      <span onclick="document.getElementById('job_{{ $application->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <h5>اسم الوظيفة</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->job_title }}</p>
                                    <h5>الراتب الشهري</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->sallary }}</p>
                                    <h5>وصف الوظيفة</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->job_description }}</p>
                                    <h5>المؤهلات المطلوبة</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->job_qualifications }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end job  model -->
                        </td>

                        <td>
                          <button type="button" onclick="document.getElementById('job_owner_{{ $application->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- job  model -->
                          <div id="job_owner_{{ $application->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:620px">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> معلومات صاحب الوظيفة </h6>
                                      <span onclick="document.getElementById('job_owner_{{ $application->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <h5>رقم الهاتف</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->phone }}</p>
                                    <h5>الايميل</h5>
                                    <p dir="auto" style="white-space: pre-wrap;">{{ $application->hiring->email }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end job  model -->
                        </td>

                        <td>
                          <button type="button" onclick="document.getElementById('applyer_{{ $application->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- job  model -->
                          <div id="applyer_{{ $application->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> معلومات المتقدم للوظيفة </h6>
                                      <span onclick="document.getElementById('applyer_{{ $application->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <h5>الاسم</h5>
                                    <p dir="auto" style="white-space: pre-wrap;"> <a href="/profile/{{ $application->user->username }}"> {{ $application->user->name }} </a> </p>
                                    <h5> رابط التواصل </h5>
                                    <p dir="auto" style="white-space: pre-wrap;"> {{  $application->link }} </p>
                                    <h5>السيرة الذاتية</h5>
                                    <p dir="auto" style="white-space: pre-wrap;"> <a href="{{ asset($application->cv) }}"> اضفط للتحميل </a> </p>
                                  </section>
                              </div>
                          </div>
                          <!-- end job  model -->
                        </td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.apply_for_jobs') }}" method="post">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $application->id }}" />
                            <button type="submit" name="delete_btn" class="btn btn-danger" >
                              <i class="fa fa-times-circle"></i>
                             </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('dashboard/layouts/footer')

  <!-- Bootstrap core JavaScript-->
  <script src="{{  asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('dashboard/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
