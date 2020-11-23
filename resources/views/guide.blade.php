@include ('layouts.header')
@include('layouts.alerts')

<body dir="rtl" class="w3-light-grey">


    <!-- Header area start   -->
    @include('layouts/home_nav')
    <!-- Header area End -->
 


    <section class="w3-right-align container" style="margin-top: 100px!important">
        <div>
          <h3 class="custom-blue-color"> لماذا جيت استارتب </h3>
          <p class="user_text w3-large w3-white  w3-padding w3-card">
لاحظنا وجود العديد من المشاكل التقنية التي تواجه رواد الاعمل , حيث ان المشاريع الناشئة تختلف عن المشاريع التقليدية من حيث عدم التأكد من احتياج المستخدم النهائي
حيث لابد من التعديل على المنتج البرمجي الى ان يتم الوصول لمنتج يلبي حاجة الفئة المستهدفة
جيت استارتب هي اول منصة توفر خدمة الدعم التقني لرواد الاعمال , حيث بامكانك البحث وتوظيف مبرمجين يعملون معاك على تطوير حلولك البرمجية خطوة بخطوة الى ان تصل لمنتج يلبي احتياج عملائك المستهدفين
          </p>
        </div>
        <div>
          <h3 class="custom-blue-color"> ماذا يعني الدعم التقني </h3>
          <p class="user_text w3-large w3-white  w3-padding w3-card">
كرائد اعمال , انت لا تمتلك المقدرة على تأسيس قسم تقني خاص بمشروعك وغالبا تلجئ للتعاقد مع مستقلين او شركات تقنية

منصة جيت استارتب توفر لك ميزة اضافية
جميع المبرمجين في المنصة سيعملون معك على تطوير منتجك البرمجي حسب منهجية ال lean startup طوال فترة المشروع
بمعنى اخر , جميع المطورين في جيت استارتب يدركون اختلاف المشاريع الناشئة عن المشاريع التقليدية وبالتالي سيعملون على توفير الدعم التقني الذي تحتاجه طوال فترة المشروع , حتى تتحصل على حل برمجي مناسب لعملائك

          </p>
        </div>
        <div>
          <h3 class="custom-blue-color">  ماذا استفيد من المنصة  </h3>
          <p class="user_text w3-large w3-white  w3-padding w3-card">
اذا كنت تبحث عن مبرمجين محترفين لتوظيفهم للعمل معك , يمكنك ارسال <a class="w3-text-blue" href="/#hiring_service">طلب توظيف</a>

اذا كنت تبحث عن مستقلين للعمل معك يمكنك <a class="w3-text-blue" href="/login">تسجيل دخولك </a> للموقع ومن ثم البحث عن افضل المبرمجين
وذلك عبر البحث حسب سابقة اعمالهم مع الاطلاع على تقييمهم السابق ومن ثم ارسال طلب توظيف لهم

اما اذا كنت تواجه مشاكل تقنية وتبحث عن استشارات فيمكنك فتح تذكرة في الموقع تحتوي على شرح المشكلة
          </p>
        </div>
        <div>
          <h3 class="custom-blue-color"> كيف نضمن لك افضل خدمة من المبرمجين  </h3>
          <p class="user_text w3-large w3-white  w3-padding w3-card">
نظام التقييم للمبرمجين في المنصة شديد الصرامة
حيث لابد للمبرمج ان يقوم بتحميل نموذج عمل سابق حيث يتم تقييم هذا النموذج من قبل مستخدمي الموقع بناءا على ثلاث معايير هي

اولا - التصميم الجيد والبسيط (ui/ux)
ثانيا - اكتمال الوظائف  وعملها دون وجود اخطاء (functionality)
ثالثا - الاداء العام للنموذج (performance) والمقصود بالنموذج (App/Website)

فمثلا اذا اضاف المبرمج نموذج عمل سابق لموقع تجارة الكترونية
يتم تقييم مدى جودة عمل هذا المبرمج ويتم السماح بظهور ملفه الشخصي ضمن المبرمجين القادرين على العمل في تطوير مواقع تجارة الكترونية وهكذا
          </p>
        </div>
        <div>
          <h3 class="custom-blue-color"> كيف اجد افضل المبرمجين </h3>
          <p class="user_text w3-large w3-white  w3-padding w3-card">
قم بتسجيل دخولك للمنصة ومن ثم ابحث عن المبرمجين حسب سابقة اعمالهم , حيث ستجد هذا الخيار متاحا في المنصة
بعدها قم باختيار المبرمجين الحاصلة مشاريعهم على افضل تقييم
بعدها قم بزيارة ملفاتهم الشخصية واطلع على تقييم المستخدمين السابقين لهم
          </p>
        </div>
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
