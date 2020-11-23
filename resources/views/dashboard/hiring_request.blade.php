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
                      <th> الراتب الشهري  </th>
                      <th> الوصف الوظيفي </th>
                      <th> المؤهلات والخبرات </th>
                      <th> هاتف مرسل الطلب </th>
                      <th> ايميل مرسل الطلب </th>
                      <th> حالة الطلب </th>
                      <th>  العمليات </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> الوظيفة </th>
                      <th> الراتب الشهري  </th>
                      <th> الوصف الوظيفي </th>
                      <th> المؤهلات والخبرات </th>
                      <th> هاتف مرسل الطلب </th>
                      <th> ايميل مرسل الطلب </th>
                      <th> حالة الطلب </th>
                      <th>  العمليات </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($hiring_request as $request)
                      <tr class="text-right">
                        <td>{{ $request->job_title }}</td>
                        <td>{{ $request->sallary }}</td>
                        <td>
                          <button type="button" onclick="document.getElementById('job_description{{ $request->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- job_description  model -->
                          <div id="job_description{{ $request->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> الوصف الوظيفي </h6>
                                      <span onclick="document.getElementById('job_description{{ $request->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p style="white-space: pre-wrap;" class="w3-padding">{{ $request->job_description }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end job_description  model -->
                        </td>
                        <td>
                          <button type="button" onclick="document.getElementById('job_qualifications{{ $request->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- job_qualifications  model -->
                          <div id="job_qualifications{{ $request->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> المؤهلات والخبرات </h6>
                                      <span onclick="document.getElementById('job_qualifications{{ $request->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p style="white-space: pre-wrap;" class="w3-padding">{{ $request->job_qualifications }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end job_qualifications  model -->
                        </td>
                        <td>{{ $request->phone }}</td>
                        <td>{{ $request->email }}</td>
                        <td>
                          @if($request->is_closed == 1)
                            <i class="fa fa-check w3-text-green"></i>
                          @else
                            <i class="fa fa-circle w3-text-yellow"></i>
                          @endif
                        </td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.hiring_request') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $request->id }}" />
                            <button type="submit" name="delete_btn" class="btn btn-danger" >
                              <i class="fa fa-times-circle"></i>
                             </button>
                             @if($request->is_approved == 0)
                              <button type="submit" name="approve_btn" class="btn btn-success w3-margin-top">
                                <i class="fa fa-check"></i>
                              </button>
                             @else
                             <button type="submit" name="dis_approve_btn" class="btn btn-warning w3-margin-top">
                               <i class="fa fa-minus-circle"></i>
                             </button>
                             @endif
                             @if($request->is_closed == 0)
                             <button type="submit" name="close_btn" class="btn btn-success w3-margin-top">
                               <i class="fa fa-user-plus"></i>
                             </button>
                             @endif
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
