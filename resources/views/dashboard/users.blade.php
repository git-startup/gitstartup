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
          <h1 class="h3 mb-2 text-gray-800 text-right">ادارة مستخدمي الموقع</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right">جدول المستخدمين</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th>الاسم</th>
                      <th> اسم المستخدم </th>
                      <th>الايميل</th>
                      <th>رقم الهاتف</th>
                      <th>المهارات</th>
                      <th>مكان الاقامة</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th>الاسم</th>
                      <th> اسم المستخدم </th>
                      <th>الايميل</th>
                      <th>رقم الهاتف</th>
                      <th>المهارات</th>
                      <th>مكان الاقامة</th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                      <tr class="text-right">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->skills }}</td>
                        <td>{{ $user->location }}</td>
                        <td style="width: 50px">
                          <form action="{{ route('dashboard.users') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}" />
                            @if($user->is_disable == 1)
                              <button type="submit" name="btn_able" class="btn btn-success" >
                                <i class="fa fa-check"></i>
                              </button>
                            @elseif($user->is_disable == 0)
                              <button type="submit" name="btn_disable" class="btn btn-warning" >
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            @endif
                            <button type="button" onclick="document.getElementById('can_work_on_model_{{ $user->id }}').style.display='block'" class="btn w3-card w3-margin-top">
                              <i class="fa fa-code"></i>
                            </button>
                          </form>
                        </td>
                      </tr>

                      <!-- user can work on model -->
                      <div id="can_work_on_model_{{ $user->id }}" class="w3-modal" style="display: none;">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:320px">
                              <header class="w3-container w3-border-bottom">
                                  <h6 class="w3-right-align w3-margin-top"> تحديد تخصص المستخدم </h6>
                                  <span onclick="document.getElementById('can_work_on_model_{{ $user->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                              </header>
                              <form id="can_work_on_form_{{ $user->id }}" action="{{ route('dashboard.users') }}" method="post">
                                <div class="w3-container w3-section">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                                  <div class="w3-bar-block">
                                    @foreach($can_work_on as $mvp_type)
                                      <?php $can_work_object = json_decode($user->can_work_on,true);?>
                                      @foreach($can_work_object as $object)
                                        <?php $names_array = json_decode($object['name']); ?>
                                        @if($names_array != null)
                                          @if(in_array($mvp_type->slug , $names_array))
                                            <label onclick="statusToggle(event)" for="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" class="w3-btn w3-bar-item w3-text-green w3-animate-color" >
                                              <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i>{{ $mvp_type->name }}</span>
                                              <i class="fa fa-check-circle w3-left"></i>
                                            </label>
                                            <input id="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" name="can_work_on[]" value="{{ $mvp_type->slug }}" checked class="w3-hide" type="checkbox">
                                            <div class="w3-clear"></div>
                                          @else
                                            <label onclick="statusToggle(event)" for="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" class="w3-btn w3-bar-item w3-animate-color" >
                                              <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i>{{ $mvp_type->name }}</span>
                                              <i class="fa fa-check-circle w3-left"></i>
                                            </label>
                                            <input id="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" name="can_work_on[]" value="{{ $mvp_type->slug }}" class="w3-hide" type="checkbox">
                                            <div class="w3-clear"></div>
                                          @endif
                                        @else
                                          <label onclick="statusToggle(event)" for="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" class="w3-btn w3-bar-item w3-animate-color" >
                                            <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i>{{ $mvp_type->name }}</span>
                                            <i class="fa fa-check-circle w3-left"></i>
                                          </label>
                                          <input id="can_work_on_{{ $user->id }}_{{ $mvp_type->id }}" name="can_work_on[]" value="{{ $mvp_type->slug }}" class="w3-hide" type="checkbox">
                                          <div class="w3-clear"></div>
                                        @endif
                                      @endforeach
                                    @endforeach
                                  </div>
                                </div>

                                <footer class="w3-container" dir="rtl">
                                    <div class="w3-section w3-right">
                                        <button tabindex="1" title="حفظ" form="can_work_on_form_{{ $user->id }}" type="submit" name="can_work_on_btn" value="حفظ" class="btn btn-success w3-round" style="padding: 7px 15px">
                                            <i class="fa fa-save w3-margin-left-8"></i><span>حفظ</span></span></button>
                                        <span tabindex="2" title="إلغاء" onclick="document.getElementById('can_work_on_model_{{ $user->id }}').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                                            <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                                    </div>
                                </footer>
                              </form>
                          </div>
                      </div>
                      <!-- end use can work on model -->
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
