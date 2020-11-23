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

          <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> تحديث بيانات المقالة   </h1>
                      </div>
                      <form class="user" method="post" action="{{ route('dashboard.articles') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-right">
                          <label> عنوان المقالة   </label>
                          <input type="text" name="heading" value="{{ $article->heading }}" class="form-control text-right" >
                          @if ($errors->has('heading'))
                            <span class="alert-danger">{{ $errors->first('heading') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                            <label for="category"> تحت اي تصنيف </label>
                            <select id="category" name="category_id" class="form-control text-right">
                              @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('category'))
                              <span class="alert-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                        <div class="form-group text-right">
                          <label> العنوان الفرعي </label>
                          <input type="text" name="sub_heading" value="{{ $article->sub_heading }}" class="form-control text-right" >
                          @if ($errors->has('sub_heading'))
                            <span class="alert-danger">{{ $errors->first('sub_heading') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label >المحتوى الرئيسي للمقالة</label>
                          <textarea class="form-control text-right" rows="12" name="content">{{ $article->content }}</textarea>
                          @if ($errors->has('content'))
                            <span class="alert-danger">{{ $errors->first('content') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label >المحتوى الفرعي للمقالة</label>
                          <textarea class="form-control text-right" rows="8" name="bottom_content">{{ $article->bottom_content }}</textarea>
                          @if ($errors->has('bottom_content'))
                            <span class="alert-danger">{{ $errors->first('bottom_content') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label >الصورة الرئيسية للمقالة</label>
                          <input type="file" class="form-control" value="{{ $article->image }}" name="image">
                          @if ($errors->has('image'))
                            <span class="alert-danger">{{ $errors->first('image') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label >الصورة الفرعية للمقالة</label>
                          <input type="file" class="form-control" value="{{ $article->bottom_image }}" name="bottom_image">
                          @if ($errors->has('bottom_image'))
                            <span class="alert-danger">{{ $errors->first('bottom_image') }}</span>
                          @endif
                        </div>
                        <div class="form-group text-right">
                          <label > لغة الكتابة </label>
                          <select name="language" class="form-control text-right">
                            <option value="ar">عربي</option>
                            <option value="en">انجليزي</option>
                          </select>
                          @if ($errors->has('language'))
                            <span class="alert-danger">{{ $errors->first('language') }}</span>
                          @endif
                        </div>
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <button type="submit" name="update_article" class="btn btn-primary w3-right">
                          تحديث
                        </button>
                      </form>
                      <div class="w3-clear"></div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


      @include('dashboard/layouts/footer')
<script src="{{ asset('dashboard/js/script.js') }}"></script>
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
