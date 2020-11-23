<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

  <!-- Sidebar - Brand -->

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span class="text-right">لوحة التحكم</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span>جداول الموقع</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header text-right"> جداول الموقع </h6>
        <a class="collapse-item text-right" href="{{ route('dashboard.users') }}"> جدول المستخدمين </a>
        <a class="collapse-item text-right" href="{{  route('dashboard.status') }}">جدول الاستفسارات</a>
        <a class="collapse-item text-right" href="{{  route('dashboard.tickets') }}">جدول التذاكر</a>
        <a class="collapse-item text-right" href="{{ route('dashboard.tickets_types') }}"> جدول انواع التذاكر </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span> ادارة المقالات </span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item text-right" href="{{  route('dashboard.articles') }}"> جدول المقالات  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.publish_article') }}"> نشر مقال جديد   </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.category') }}">  جدول تصنيف المقالات </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.addCategory') }}">  اضافة تصنيف للمقالات  </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoure" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span> عمليات الدفع </span>
    </a>
    <div id="collapseFoure" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item text-right" href="{{ route('dashboard.recharge') }}">  شحن الرصيد  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.deposit_draw') }}">  الايداع والسحب   </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.payment_archives') }}">  ارشيف الدفع </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span> ادارة نماذج العمل </span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item text-right" href="{{ route('dashboard.mvp') }}"> جدول نماذج العمل  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.mvp_type') }}">   جدول تصنيف النماذج  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.add_mvp_type') }}">  اضافة تصنيف للنماذج  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.work_list') }}">   عقودات العمل   </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span> ادارة الاعلانات </span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="advertisingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item text-right" href="{{ route('dashboard.advertising') }}">  اضافة اعلان جديد  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.advertising_table') }}">  جدول الاعلانات   </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsix" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-folder"></i>
      <span> طلبات التوظيف </span>
    </a>
    <div id="collapsix" class="collapse" aria-labelledby="advertisingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item text-right" href="{{ route('dashboard.hiring_request') }}">  طلبات التوظيف  </a>
        <a class="collapse-item text-right" href="{{ route('dashboard.apply_for_jobs') }}"> طلبات التقديم   </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">

    <a class="nav-link" href="{{ route('dashboard.add_user') }}">
      <i class="fas fa-fw fa-user-plus"></i>
      <span class="text-right"> اضافة مستحدم  </span>
    </a>

    <a class="nav-link" href="javascript::void()" onclick="document.getElementById('admin_send_message').style.display='block'">
      <i class="fas fa-envelope"></i>
      <span class="text-right"> ارسال رسالة  </span>
    </a>

  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
