<!-- admin message on model -->
<div id="admin_send_message" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom">
        <header class="w3-container w3-border-bottom">
            <h6 class="w3-right-align w3-margin-top"> ارسال رسائل لمستخدمي الموقع </h6>
            <span onclick="document.getElementById('admin_send_message').style.display='none'" class="w3-btn w3-display-topleft">×</span>
        </header>
        <form action="{{ route('dashboard.mail') }}" method="post">
          <div class="w3-container w3-section">
            @csrf
            <div class="w3-bar-block">
              <label onclick="statusToggle(event)" for="all_users" class="w3-btn w3-bar-item w3-animate-color" >
                <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i> جميع المستخدمين </span>
                <i class="fa fa-check-circle w3-left"></i>
              </label>
              <input id="all_users" name="all_users" value="all_users"  class="w3-hide" type="radio">
              <div class="w3-clear"></div>

              <label onclick="statusToggle(event)" for="project_owner" class="w3-btn w3-bar-item w3-animate-color" >
                <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i> اصحاب مشاريع   </span>
                <i class="fa fa-check-circle w3-left"></i>
              </label>
              <input id="project_owner" name="project_owners" value="project_owners"  class="w3-hide" type="radio">
              <div class="w3-clear"></div>

              <label onclick="statusToggle(event)" for="developers" class="w3-btn w3-bar-item w3-animate-color" >
                <span class="w3-right"><i class="w3-margin-left w3-text-gray"></i> مبرمجين فقط  </span>
                <i class="fa fa-check-circle w3-left"></i>
              </label>
              <input id="developers" name="developers" value="developers"  class="w3-hide" type="radio">
              <div class="w3-clear"></div>

            </div>
          </div>

          <hr>

          <div class="form-group w3-margin w3-right-align">
            <label class="">ارسال رسالة لمستخدم معين</label>
            <input type="text" name="username" placeholder="اسم المستخدم" class="form-control text-right">
          </div>

          <div class="form-group w3-margin w3-right-align">
            <label for="subject"> الغرض من الرسالة </label>
            <input id="subject" type="text" name="subject" class="form-control text-right">
          </div>

          <div class="form-group w3-margin w3-right-align">
            <label for="message">   الرسالة </label>
            <textarea id="message" name="message" class="form-control text-right" rows="8" cols="80"></textarea>
          </div>

          <footer class="w3-container" dir="rtl">
              <div class="w3-section w3-right">
                  <button tabindex="1" title="ارسال"  type="submit" name="sendMail"  class="btn btn-success w3-round" style="padding: 7px 15px">
                      <i class="fa fa-send w3-margin-left-8"></i><span> ارسال</span></span></button>
                  <span tabindex="2" title="إلغاء" onclick="document.getElementById('admin_send_message').style.display='none'"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
                      <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
              </div>
          </footer>
        </form>
    </div>
</div>
<!-- end use can work on model -->
