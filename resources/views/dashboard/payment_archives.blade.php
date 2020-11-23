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
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة ارشيف عمليات الدفع   </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                جدول ارشيف عمليات الدفع
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th> النشاط </th>
                      <th>  من حساب </th>
                      <th> الى حساب </th>
                      <th> المبلغ </th>
                      <th> عمولة الموقع </th>
                      <th> تاريخ العملية </th>
                      <th>  العمليات </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> النشاط </th>
                      <th>  من حساب </th>
                      <th> الى حساب </th>
                      <th> المبلغ </th>
                      <th> عمولة الموقع </th>
                      <th> تاريخ العملية </th>
                      <th>  العمليات </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($payment_archives as $payment_archive)
                      <tr class="text-right">
                        <td>{{ $payment_archive->action }}</td>
                        <td>
                          @if($payment_archive->from)
                            <a href="/profile/{{ App\User::find($payment_archive->from)->username }}">
                              {{ App\User::find($payment_archive->from)->name }}
                            </a>
                          @endif
                        </td>
                        <td>
                          @if($payment_archive->to)
                            <a href="/profile/{{ App\User::find($payment_archive->to)->username }}">
                              {{ App\User::find($payment_archive->to)->name }}
                            </a>
                          @endif
                        </td>
                        <td>{{ $payment_archive->total }}</td>
                        <td>{{ $payment_archive->commission }}</td>
                        <td>{{ $payment_archive->created_at }}</td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.payment_archives') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $payment_archive->id }}" />
                            <button type="submit" name="delete_archive" class="btn btn-danger" >
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
