<!-- ticket_model -->
<div id="wallet_model" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:420px">
        <header class="w3-container w3-border-bottom">
            <h6 class="w3-right-align w3-margin-top"> شحن رصيدك في الموقع </h6>
            <span onclick="document.getElementById('wallet_model').style.display='none'" class="w3-btn w3-display-topleft">×</span>
        </header>

        <div class="w3-center w3-container">
          <h3>اجمالي رصيدك</h3>
          <p class="w3-xlarge w3-text-green">{{ Auth::user()->total }}</p>
        </div>

        <div class="text-center w3-padding-16">
          <a href="javascript::void()" class="" onclick="document.getElementById('wallet_recharge').style.display='block'">
            طرق شحن الرصيد <i class="fa fa-chevron-down"></i>
          </a>
        </div>

        <div class="w3-animate-top" id="wallet_recharge" style="display: none;">
          <div class="text-right w3-padding" style="margin-right: 15px;">
            <hr>
            <div>
              @foreach($payment_methods as $payment_method)
                <div class="w3-padding">
                  <img src="{{ $payment_method->logo }}" width="50" height="50" alt="">
                  <h4>{{ $payment_method->name }}</h4>
                  <p>{{ $payment_method->bio }}</p>
                </div>
              @endforeach
            </div>
          </div>
          <form action="{{ route('profile.index',['username' => Auth::user()->username])  }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group w3-margin w3-right-align">
              <label for="bill_image"> لاعادة الشحن ارفع صورة من فاتورة الدفع </label>
              <input type="file" class="form-control" id="bill_image" name="bill_image">
            </div>
            <footer class="w3-container" dir="rtl">
                <div class="w3-section w3-right">
                    <button tabindex="1" title="شحن"  type="submit" name="recharge_btn" value="شحن" class="btn custom-blue-bg w3-card w3-round" style="padding: 7px 15px">
                        <i class="fa fa-money w3-margin-left-8"></i> <span>شحن</span></span></button>
                    <span tabindex="2" title="إلغاء" onclick="document.getElementById('wallet_model').style.display='none'"  class="btn custom-blue-bg w3-card w3-round" style="padding: 7px 15px;">
                        <i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
                </div>
            </footer>
          </form>
        </div>
    </div>
</div>
<!-- end use can work on model -->
