@include ('layouts.header')
@include('layouts.alerts')

<body dir="rtl" class="w3-light-grey">


    <!-- Header area start   -->
    @include('layouts/home_nav')
    <!-- Header area End -->



    <section class="w3-right-align  container" style="margin-top: 100px!important">
      <ul>
        <li>
          <h3 class="custom-blue-color"> دور الموقع </h3>
          <p class="user_text w3-large custom-blue-bg w3-padding w3-card">
الموقع يمثل وسيط بين اصحاب الافكار الريادية وبين المبرمجين
لذا فان الموقع لا يتحمل اي مسئوليات قانونية نتيجة مشاكل تحصل بين الطرفين المذكورين اعلاه
          </p>
        </li>
        <li>
          <h3 class="custom-blue-color"> عقود العمل في الموقع </h3>
          <p class="user_text w3-large custom-blue-bg w3-padding w3-card">
يتم الاحتفاظ بجميع عقود العمل الخاصة بطلبات التوظيف المرسلة عبر الموقع
حيث انه ومن حق اي من الطرفين الاطلاع على تفاصيل العقد متى ما شاء ذلك بعد التواصل مع ادارة الموقع
          </p>
        </li>
        <li>
          <h3 class="custom-blue-color">  التواصل خارج الموقع  </h3>
          <p class="user_text w3-large custom-blue-bg w3-padding w3-card">
الموقع يوفر وسائل للتواصل بين المبرمجين ورواد الاعمال
حيث يتم الاحتفاظ بجميع الرسائل المرسلة من قبل الطرفين في حالة حدوث مشاكل مستقبلا
والموقع غير مسئول عن اي عمليات تواصل تتم خارجه
          </p>
        </li>

      </ul>
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
