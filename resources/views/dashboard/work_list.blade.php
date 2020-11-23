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
            <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة عمليات الدفع</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-right">
                   جدول عمليات الدفع

                 </h6>
              </div>

              @foreach($work_list as $list)
                <div class="card shadow" dir="rtl">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr class="text-right">
                            <th>  اسم المشروع </th>
                            <th> نص الاتفاق </th>
                            <th> الشرط الجزائي </th>
                            <th> تكلفة التطوير </th>
                            <th> بداية الاتفاق </th>
                            <th> نهاية الاتفاق </th>
                            <th> وثيقة المتطلبات </th>
                            <th> صاحب المشروع </th>
                            <th> المطور </th>
                            <th> حالة الدفع </th>
                            <th> تم الاتفاق </th>
                            <th>العمليات</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="text-right">
                            <th>  اسم المشروع </th>
                            <th> نص الاتفاق </th>
                            <th> الشرط الجزائي </th>
                            <th> تكلفة التطوير </th>
                            <th> بداية الاتفاق </th>
                            <th> نهاية الاتفاق </th>
                            <th> وثيقة المتطلبات </th>
                            <th> صاحب المشروع </th>
                            <th> المطور </th>
                            <th> حالة الدفع </th>
                            <th> تم الاتفاق </th>
                            <th>العمليات</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr class="text-right">
                            <td>{{ $list->work_title }}</td>
                            <td>
                              <button type="button" onclick="document.getElementById('agreement_{{ $list->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                              <!-- agreement model -->
                              <div id="agreement_{{ $list->id }}" class="w3-modal" style="display: none;">
                                  <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                                      <header class="w3-container w3-border-bottom">
                                          <h6 class="w3-right-align w3-margin-top"> نص الاتفاق </h6>
                                          <span onclick="document.getElementById('agreement_{{ $list->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                      </header>
                                      <section class="w3-container w3-right-align">
                                        <p style="white-space: pre-wrap;" class="w3-padding">{{ $list->agreement }}</p>
                                      </section>
                                  </div>
                              </div>
                              <!-- end agreement  model -->
                            </td>
                            <td>
                              <button type="button" onclick="document.getElementById('penalty_{{ $list->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                              <!-- penalty_ model -->
                              <div id="penalty_{{ $list->id }}" class="w3-modal" style="display: none;">
                                  <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                                      <header class="w3-container w3-border-bottom">
                                          <h6 class="w3-right-align w3-margin-top"> الشرط الجزائي </h6>
                                          <span onclick="document.getElementById('penalty_{{ $list->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                      </header>
                                      <section class="w3-container w3-right-align">
                                        <p style="white-space: pre-wrap;" class="w3-padding">{{ $list->penalty }}</p>
                                      </section>
                                  </div>
                              </div>
                              <!-- end penalty_  model -->
                            </td>
                            <td>{{ $list->sallery }}</td>
                            <td>{{ $list->start_of_agreement }}</td>
                            <td>{{ $list->end_of_agreement }}</td>
                            <td>
                              <button type="button" onclick="document.getElementById('requirments_doc_{{ $list->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                              <!-- requirments_doc_ model -->
                              <div id="requirments_doc_{{ $list->id }}" class="w3-modal" style="display: none;">
                                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                                      <header class="w3-container w3-border-bottom">
                                          <h6 class="w3-right-align w3-margin-top"> وثيقة المتطلبات </h6>
                                          <span onclick="document.getElementById('requirments_doc_{{ $list->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                      </header>
                                      <section class="w3-container w3-padding w3-right-align">
                                        <a target="_blank" href="{{ $list->requirments_doc }}">{{ $list->requirments_doc }}</a>
                                      </section>
                                  </div>
                              </div>
                              <!-- end requirments_doc_  model -->
                            </td>
                            <td><a href="/profile/{{ $list->user->username }}">{{ $list->user->name }}</a></td>
                            <td><a href="/profile/{{ App\User::find($list->worker_id)->username }}">{{ App\User::find($list->worker_id )->name }}</a></td>
                            @if($list->is_payed == 1)
                              <td><i class="fa fa-check w3-text-green"></i></td>
                            @elseif($list->is_payed == 0)
                              <td><i class="fa fa-times w3-text-red"></i></td>
                            @endif
                            @if($list->is_completed == 1)
                              <td><i class="fa fa-check w3-text-green"></i></td>
                            @elseif($list->is_completed == 0)
                              <td><i class="fa fa-times w3-text-red"></i></td>
                            @endif

                            @if($list->is_payed == 0)
                              <td>
                                <form class="user" id="payment_{{ $list->id }}" method="post" action="{{ route('dashboard.work_list') }}">
                                  @csrf
                                  <input type="hidden" value="{{ $list->id }}" name="reservation_id" />
                                  <input type="hidden" name="work_id" value="{{ $list->id }}">
                                  <div class="form-group text-right">
                                    <div class="">
                                      <label for="confirm"> تم الدفع </label>
                                      <input type="hidden" name="user_id" value="{{ $list->user_id }}">
                                      <input type="hidden" name="worker_id" value="{{ $list->worker_id }}">
                                      <input type="hidden" name="sallery" value="{{ $list->sallery }}">
                                      <input id="confirm" type="radio" class="form-control-user" name="action" value="is_payed">
                                    </div>
                                  </div>
                                  <button type="submit" form="payment_{{ $list->id }}" class="btn btn-primary w3-right">
                                    اتمام
                                  </button>
                                </form>
                              </td>
                            @else
                              <td></td>
                            @endif
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                 </div>
                <div class="w3-clear"></div><hr>
                @endforeach
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
