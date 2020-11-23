@include ('layouts.header')
@include('layouts.alerts')

<body dir="rtl" class="w3-light-grey">


    <!-- Header area start   -->
    @include('layouts/home_nav')
    <!-- Header area End -->



    <section class="w3-right-align  container" style="margin-top: 100px!important">
        <div>
          <h3 class="custom-blue-color"> ما اهمية اتفاق العمل الواضح </h3>
          <p class="user_text w3-large w3-white w3-padding w3-card">
كثير من المشاكل التي تحصل بين المطورين وبين اصحاب المشاريع سببها غياب اتفاق العمل الواضح
حيث ان الاتفاق الواضح يحفظ حق الطرفين ويجنب حدوث مشاكل كالتأخير في التسليم او تسليم مشاريع غير مكتملة
          </p>
        </div>
        <div>
          <h3 class="custom-blue-color"> ماذا اكتب في حقل اتفاق العمل </h3>
          <p class="user_text w3-large w3-white w3-padding w3-card">
في حقل اتفاق العمل احرص على تحديد الاتي
1-	نبذة تعريفية عن المشروع المراد تطويره
2-	تسمية الطرفين
3-	مواصفات المنتج البرمجي المراد تطويره
4-	المتطلبات الواجب تنفيذها في المنتج المراد تطويره
5-	اي تفاصيل اخرى تراها مهمة

          </p>
        </div>
    </section>


    <!-- footer section -->
    @include('layouts/home_footer')
    <!-- end footer section -->

    <script src="{{ asset('assets/js/mvp.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/owl-carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>


</body>
</html>
