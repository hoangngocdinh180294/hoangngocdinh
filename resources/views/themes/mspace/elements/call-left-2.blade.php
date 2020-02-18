{{-- <a id="calltrap-btn-2" style="left: 26px" class="b-calltrap-btn-2 calltrap_offline-2 hidden-phone-2 visible-tablet-2" href="Tel: +12345679332">
        <div id="calltrap-ico-2"></div>
    </a>
    <div class="float-contact-2">
            <button class="hotline-2">
            <a href="tel:+12345679332"> +12345679332</a>
            </button>
            </div> --}}


            <div class="fx">
                <div class="zoo">
                  <div class="call"><i class="icon fa fa-phone"></i></div>
                  <div class="textt"><a href="tel:{!!strip_tags(\App\Helpers\Base::getSetting('dien-thoai'))!!}">Call Now</a></div>
                </div>
              </div>
              <div class="float-contact-2">
                <button class="hotline-2">
                <a href="tel:{!!strip_tags(\App\Helpers\Base::getSetting('dien-thoai'))!!}"> {!!strip_tags(\App\Helpers\Base::getSetting('dien-thoai'))!!}</a>
                </button>
                </div>