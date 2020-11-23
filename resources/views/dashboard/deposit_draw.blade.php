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

          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة عمليات الايداع والسحب</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-right">
                   جدول عمليات السحب

                 </h6>
              </div>
              <div class="card shadow" dir="rtl">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr class="text-right">
                          <th>  اسم المستخدم </th>
                          <th> رقم الهاتف  </th>
                          <th> الايميل </th>
                          <th> المبلغ المتوفر للسحب</th>
                          <th> المبلغ المحجوز</th>
                          <th>العمليات</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr class="text-right">
                          <th>  اسم المستخدم </th>
                          <th> رقم الهاتف  </th>
                          <th> الايميل </th>
                          <th> المبلغ المتوفر للسحب</th>
                          <th> المبلغ المحجوز</th>
                          <th>العمليات</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($users as $user)
                          <tr class="text-right">
                            <td><a href="/profile/{{ $user->username }}">{{ $user->name }}</a></td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->total }}</td>
                            <td>{{ $user->work_total }}</td>
                              <td>
                                <button type="button" onclick="document.getElementById('draw_{{ $user->id }}').style.display='block'" class="btn w3-card">
                                  <i class="fa fa-cut"></i>
                                </button>
                                <button type="button" onclick="document.getElementById('deposit_{{ $user->id }}').style.display='block'" class="btn w3-card">
                                  <i class="fa fa-plus-circle"></i>
                                </button>
                                <!-- start deposit_ model -->
                                <div id="deposit_{{ $user->id }}" class="w3-modal" style="display: none;">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                                        <header class="w3-container w3-border-bottom">
                                            <h6 class="w3-right-align w3-margin-top"> ايداع مبلغ جديد </h6>
                                            <span onclick="document.getElementById('deposit_{{ $user->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                        </header>
                                        <form id="deposit_form_{{ $user->id }}" action="{{ route('dashboard.deposit_draw') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="user_id" value="{{ $user->id }}">
                                          <div class="form-group w3-margin w3-right-align">
                                            <label for="total"> ادخل المبلغ المراد ايداعه </label>
                                            <input type="number" min="0" name="total" class="form-control">
                                          </div>

                                          <footer class="w3-container" dir="rtl">
                                              <div class="w3-section w3-right">
                                                  <button tabindex="1" title="ايداع" form="deposit_form_{{ $user->id }}" type="submit" name="deposit_btn" class="btn btn-success w3-round" style="padding: 7px 15px">
                                                      <i class="fa fa-plus w3-margin-left-8"></i><span> ايداع </span></span></button>
                                                  <span tabindex="2" title="إلغاء" onclick="document.getElementById('deposit_{{ $user->id }}').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                                                      <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                              </div>
                                          </footer>
                                        </form>
                                    </div>
                                </div>
                                <!-- end draw model -->
                                <!-- start draw model -->
                                <div id="draw_{{ $user->id }}" class="w3-modal" style="display: none;">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                                        <header class="w3-container w3-border-bottom">
                                            <h6 class="w3-right-align w3-margin-top"> سحب مبلغ جديد </h6>
                                            <span onclick="document.getElementById('draw_{{ $user->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                        </header>
                                        <form id="draw_form_{{ $user->id }}" action="{{ route('dashboard.deposit_draw') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="user_id" value="{{ $user->id }}">
                                          <div class="form-group w3-margin w3-right-align">
                                            <label for="total"> ادخل المبلغ المراد سحبه </label>
                                            <input type="number" min="0" name="total" class="form-control">
                                          </div>

                                          <footer class="w3-container" dir="rtl">
                                              <div class="w3-section w3-right">
                                                  <button tabindex="1" title="سحب" form="draw_form_{{ $user->id }}" type="submit" name="draw_btn" class="btn btn-success w3-round" style="padding: 7px 15px">
                                                      <i class="fa fa-cut w3-margin-left-8"></i><span> سحب </span></span></button>
                                                  <span tabindex="2" title="إلغاء" onclick="document.getElementById('draw_{{ $user->id }}').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                                                      <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                              </div>
                                          </footer>
                                        </form>
                                    </div>
                                </div>
                                <!-- end draw model -->
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                 </div>
                <div class="w3-clear"></div><hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


@include('dashboard/layouts/footer')

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
