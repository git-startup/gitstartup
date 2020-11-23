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
            <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة عمليات شحن الرصيد</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-right">
                   جدول شحن الرصيد
                   <a class="w3-text-red w3-left w3-button w3-card w3-white" href="{{ route('dashboard.paymentMethod') }}" >
                     <i class="fa fa-plus w3-large"></i>
                   </a>
                 </h6>
              </div>

                <div class="card shadow" dir="rtl">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr class="text-right">
                            <th>  صاحب الحساب  </th>
                            <th> فاتورة الدفع </th>
                            <th> المبلغ الموجود في الحساب </th>
                            <th> تم الشحن </th>
                            <th>العمليات</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="text-right">
                            <th>  صاحب الحساب  </th>
                            <th> فاتورة الدفع </th>
                            <th> المبلغ الموجود في الحساب </th>
                            <th> تم الشحن </th>
                            <th>العمليات</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          @foreach($accounts as $account)
                            <tr class="text-right">
                              <td><a href="/profile/{{ $account->user->username }}">{{ $account->user->name }}</a></td>
                              <td>
                                <a href="/{{ $account->bill_image }}" target="_blank"> <img src="/{{ $account->bill_image }}" width="100" height="100" alt=""></a>
                               </td>
                              <td>{{ $account->user->total }}</td>
                              <td>
                                @if($account->is_recharged == 1)
                                  <p> <i class="fa fa-check w3-text-green"></i> </p>
                                @elseif($account->is_recharged == 0)
                                  <p> <i class="fa fa-times w3-text-red"></i> </p>
                                @endif
                              </td>
                              <td>
                                <form class="user" method="post" action="{{ route('dashboard.recharge') }}">
                                  @csrf
                                  <input type="hidden" value="{{ $account->id }}" name="recharge_id" />
                                  <button type="submit" name="delete_recharge" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i>
                                  </button>
                                  @if($account->is_recharged == 0)
                                    <button type="button" onclick="document.getElementById('recharge_{{ $account->id }}').style.display='block'" class="btn btn-success">
                                      <i class="fa fa-check"></i>
                                    </button>
                                  @endif
                                </form>
                              </td>
                            </tr>
                            <!-- start recharge model -->
                            <div id="recharge_{{ $account->id }}" class="w3-modal" style="display: none;">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                                    <header class="w3-container w3-border-bottom">
                                        <h6 class="w3-right-align w3-margin-top"> تغذية حساب المستخدم  </h6>
                                        <span onclick="document.getElementById('recharge_{{ $account->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                    </header>
                                    <form action="{{ route('dashboard.recharge') }}" method="post">
                                      <div class="w3-container w3-section">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $account->user_id }}">
                                        <input type="hidden" value="{{ $account->id }}" name="recharge_id" />
                                      </div>
                                      <div class="form-group w3-margin w3-right-align">
                                        <label for="rating"> اجالي المبلغ في الحساب </label>
                                        <input type="number" min="0" value="{{ $account->user->total }}"  name="total" class="form-control">
                                      </div>

                                      <footer class="w3-container" dir="rtl">
                                          <div class="w3-section w3-right">
                                              <button tabindex="1" title="شحن"  type="submit" name="recharge_btn" value="شحن" class="btn btn-success w3-round" style="padding: 7px 15px">
                                                  <i class="fa fa-money w3-margin-left-8"></i><span> شحن</span></span></button>
                                              <span tabindex="2" title="إلغاء" onclick="document.getElementById('recharge_{{ $account->id }}').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                                                  <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                          </div>
                                      </footer>
                                    </form>
                                </div>
                              </div>
                              <!-- end recharge model -->
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
