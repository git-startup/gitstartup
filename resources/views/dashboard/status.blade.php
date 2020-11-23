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
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة استفسارات المستخدمين</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                 جدول الاستفسارات
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th> المستحدم  </th>
                      <th>  الاستفسار </th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> المستحدم  </th>
                      <th>  الاستفسار </th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($status as $status)
                      <tr class="text-right">
                        <td><a href="/profile/{{ $status->user->username }}">{{ $status->user->name }}</a></td>
                        <td>
                          <button type="button" onclick="document.getElementById('status_body_{{ $status->id }}').style.display='block'" class="btn w3-card w3-margin-top">
                            <i class="fa fa-ellipsis-h"></i>
                          </button>
                          <!-- status body  model -->
                          <div id="status_body_{{ $status->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" >
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> نص الاستفسار </h6>
                                      <span onclick="document.getElementById('status_body_{{ $status->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p style="white-space: pre-wrap;" class="w3-padding">{{ $status->body }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end status body  model -->
                        </td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.status') }}" method="get">
                            @csrf
                            <input type="hidden" name="status_id" value="{{ $status->id }}" />
                            <button type="submit" name="delete_status" class="btn btn-danger"  >
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

      <script src="{{ asset('dashboard/js/script.js') }}"></script>
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
