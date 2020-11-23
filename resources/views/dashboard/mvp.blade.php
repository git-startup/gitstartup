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
          <h1 class="h3 mb-2 text-gray-800 text-right">  ادارة جدول نماذج العمل     </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-right"> جدول نماذج العمل </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-right">
                      <th>اسم النموذج</th>
                      <th> صاحب النموذج </th>
                      <th> نوع النموذج </th>
                      <th> الوصف والرابط </th>
                      <th> ادوات التطوير  </th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-right">
                      <th>اسم النموذج</th>
                      <th> صاحب النموذج </th>
                      <th> نوع النموذج </th>
                      <th> الوصف والرابط </th>
                      <th> ادوات التطوير  </th>
                      <th>العمليات</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($mvps as $mvp)
                      <tr class="text-right">
                        <td>{{ $mvp->name }}</td>
                        <td><a href="{{ route('profile.index',['username' => $mvp->user->username]) }}">{{ $mvp->user->username }}</a></td>
                        <td>{{ $mvp->type }}</td>
                        <td>
                          <button type="button" onclick="document.getElementById('description_{{ $mvp->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- mvp description  model -->
                          <div id="description_{{ $mvp->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom" >
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> وصف نموذج العمل </h6>
                                      <span onclick="document.getElementById('description_{{ $mvp->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p style="white-space: pre-wrap;" class="w3-padding">{{ $mvp->description }}</p>
                                    <h6> رابط نموذج العمل </h6>
                                    <p> <a href="{{ $mvp->mvp_link }}"> {{ $mvp->mvp_link }} </a> </p>
                                  </section>
                              </div>
                          </div>
                          <!-- end mvp description  model -->
                        </td>
                        <td>
                          <button type="button" onclick="document.getElementById('dev_tools_{{ $mvp->id }}').style.display='block'" class="w3-white w3-card w3-button w3-padding"> <i class="fa fa-ellipsis-h"></i>   </button>
                          <!-- mvp dev_tools  model -->
                          <div id="dev_tools_{{ $mvp->id }}" class="w3-modal" style="display: none;">
                              <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                                  <header class="w3-container w3-border-bottom">
                                      <h6 class="w3-right-align w3-margin-top"> الادوات المستخدمة في التطوير </h6>
                                      <span onclick="document.getElementById('dev_tools_{{ $mvp->id }}').style.display='none'" class="w3-btn w3-display-topleft">×</span>
                                  </header>
                                  <section class="w3-container w3-right-align">
                                    <p style="white-space: pre-wrap;" class="w3-padding">{{ $mvp->dev_tools }}</p>
                                  </section>
                              </div>
                          </div>
                          <!-- end mvp dev_tools  model -->
                        </td>
                        <td style="width: 50px">
                          <form id="mvp_actions_{{ $mvp->id }}" action="{{ route('dashboard.mvp') }}" method="post">
                            @csrf
                            <input type="hidden" name="mvp_id" value="{{ $mvp->id }}" />
                            <button form="mvp_actions_{{ $mvp->id }}" type="submit" name="delete_mvp" class="btn btn-danger w3-margin-bottom" >
                              <i class="fa fa-times-circle"></i>
                            </button>
                            @if($mvp->is_approved == 0)
                              <button form="mvp_actions_{{ $mvp->id }}" type="submit" name="approved" class="btn btn-success w3-margin-bottom" >
                                <i class="fa fa-check"></i>
                              </button>
                            @elseif($mvp->is_approved == 1)
                              <button form="mvp_actions_{{ $mvp->id }}" type="submit" name="reject" class="btn btn-warning w3-margin-bottom" >
                                <i class="fa fa-minus-circle"></i>
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
