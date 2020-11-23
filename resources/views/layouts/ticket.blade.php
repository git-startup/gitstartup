<!-- ticket_model -->
<div id="ticket_model" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width: 380px">
        <header class="w3-container w3-border-bottom">
            <h6 class="w3-right-align w3-margin-top"> فتح تذكرة جديدة </h6>
            <span onclick="document.getElementById('ticket_model').style.display='none'" class="w3-btn w3-display-topleft">×</span>
        </header>
        <form action="{{ route('post.tickets') }}" method="post">
          <div class="w3-section">
            @csrf
            <div class="w3-bar-block text-right">
              <label class=" w3-padding"> الغرض من الرسالة </label>
              @foreach($tickets_type as $type)
                <label onclick="statusToggle(event)" for="ticket_{{ $type->id }}" class="w3-btn w3-bar-item w3-animate-color" >
                  <span class="w3-right"><i class="w3-text-gray"></i> {{ $type->name }} </span>
                  <i class="fa fa-check-circle w3-left"></i>
                </label>
                <input id="ticket_{{ $type->id }}" name="subject[]" value="{{ $type->name }}" class="w3-hide" type="checkbox">
                <div class="w3-clear"></div>
              @endforeach
            </div>
          </div>
          <div class="form-group w3-margin w3-right-align">
            <label for="content"> نص الرسالة </label>
            <textarea name="content" placeholder="قم بشرح المشكلة بالتفصيل" id="content" class="form-control" rows="8" cols="80"></textarea>
          </div>

          <footer class="w3-container" dir="rtl">
              <div class="w3-section w3-right">
                @if(Auth::check())
                  <button tabindex="1" title="حفظ"  type="submit" name="can_work_on_btn" value="حفظ" class="btn btn-success w3-card w3-round" style="padding: 5px 15px">
                      <i class="fa fa-send-o w3-margin-left-8"></i><span> حفظ</span></span></button>
                  <span tabindex="2" title="إلغاء" onclick="document.getElementById('ticket_model').style.display='none'"  class="btn btn-danger w3-card w3-round" style="padding: 5px 15px;">
                      <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                @else
                  <p class="alert alert-info">قم <a class="w3-text-blue" href="/login">بتسجيل دخولك</a> لتتمكن من فتح تذكرة في الموقع</p>
                @endif
              </div>
          </footer>
        </form>
    </div>
</div>
<!-- end use can work on model -->
