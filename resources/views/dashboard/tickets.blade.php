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
          <h1 class="h3 mb-2 text-gray-800 text-right"> ادارة جدول التذاكر  </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">
                جدول التذاكر
                <button type="button" onclick="document.getElementById('add_ticket_type').style.display='block'" class="w3-card w3-white w3-padding w3-left w3-button">
                  <i class="fa fa-plus w3-text-red"></i>
                </button>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th> اسم المستخدم </th>
                      <th> رقم الهاتف  </th>
                      <th> الغرض من الرسالة   </th>
                      <th> حالة التذكرة </th>
                      <th> الرسالة   </th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th> اسم المستخدم </th>
                      <th> رقم الهاتف  </th>
                      <th> الغرض من الرسالة   </th>
                      <th> حالة التذكرة </th>
                      <th> الرسالة   </th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($tickets as $ticket)
                      <tr class="text-right">
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->user->phone }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>
                          @if($ticket->is_closed == 0)
                            <i class="fa fa-times w3-text-red"></i>
                          @elseif($ticket->is_closed == 1)
                            <i class="fa fa-check w3-text-green"></i>
                          @endif
                        </td>
                        <td>
                          <button type="button" onclick="document.getElementById('content_{{ $ticket->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- content model -->
                          <div id="content_{{ $ticket->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:420px">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> محتوى التذكرة  </h6>
                                      <span onclick="document.getElementById('content_{{ $ticket->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p class="w3-padding" style="white-space: pre-wrap;">{{ $ticket->content }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end content model -->
                        </td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.tickets') }}" method="get">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" />
                            <button type="submit" name="delete_ticket" class="btn btn-danger" >
                              <i class="fa fa-times-circle"></i>
                            @if($ticket->is_closed == 0)
                            <button type="submit" name="close_ticket" class="btn btn-success w3-margin-top" >
                              <i class="fa fa-check"></i>
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

      <!-- add ticket type model -->
      <div id="add_ticket_type" class="w3-modal" style="display: none;">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
              <header class="w3-container w3-border-bottom">
                  <h6 class="w3-right-align w3-margin-top"> اضافة نوع تذاكر جديد </h6>
                  <span onclick="document.getElementById('add_ticket_type').style.display='none'" class="w3-btn w3-display-topleft">×</span>
              </header>
              <form action="{{ route('dashboard.tickets') }}" method="post">
                @csrf
                <div class="form-group w3-margin w3-right-align">
                  <label for="name"> اسم التذكرة </label>
                  <input type="text" name="name" class="form-control text-right">
                </div>

                <footer class="w3-container" dir="rtl">
                    <div class="w3-section w3-right">
                        <button tabindex="1" title="حفظ"  type="submit" name="add_ticket_type" value="حفظ" class="btn btn-success w3-round" style="padding: 7px 15px">
                            <i class="fa fa-save w3-margin-left-8"></i><span>حفظ</span></span></button>
                        <span tabindex="2" title="إلغاء" onclick="document.getElementById('add_ticket_type').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                            <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                    </div>
                </footer>
              </form>
          </div>
      </div>
      <!-- end use can work on model -->

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
