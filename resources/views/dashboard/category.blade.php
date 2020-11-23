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
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة جدول تصنيف المقالات   </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                جدول تصنيف المقالات
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th> اسم التصنيف </th>
                      <th> اسم الاستخدام  </th>
                      <th>  العمليات </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> اسم التصنيف </th>
                      <th> اسم الاستخدام  </th>
                      <th>  العمليات </th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($category as $category)
                      <tr class="text-right">
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.category') }}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}" />
                            <button type="submit" name="delete_category" class="btn btn-danger" >
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
