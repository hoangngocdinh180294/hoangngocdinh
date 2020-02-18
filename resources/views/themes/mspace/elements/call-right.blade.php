<div class="social-button">
        <div class="social-button-content">
           {{-- <a href="tel:0981481368" class="call-icon" rel="nofollow">
              <i class="fas fa-phone" aria-hidden="true"></i>
              <div class="animated alo-circle-2"></div>
              <div class="animated alo-circle-fill-2  "></div>
               <span>Hotline: +12345679332 </span>
            </a> --}}
            <a href="sms:{!!strip_tags(\App\Helpers\Base::getSetting('dien-thoai'))!!}" class="sms">
              <i class="icon fa fa-comment" aria-hidden="true"></i>
              <span>SMS:{!!strip_tags(\App\Helpers\Base::getSetting('dien-thoai'))!!}</span>
            </a>
            <a href="{!!strip_tags(\App\Helpers\Base::getSetting('facebook'))!!}" class="mes">
              <i class="icon fa fa-facebook" aria-hidden="true"></i>
              <span>Nhắn tin Facebook</span>
            </a>
            <a href="{!!strip_tags(\App\Helpers\Base::getSetting('zalo'))!!}" class="zalo" target="_blank">
              <img src="{{App\Helpers\Theme::assetsPath('assets/images/zalo.png')}}" />
              <i class="fa fa-zalo" aria-hidden="true"></i>
              <span>Nhắn tin qua Zalo</span>
            </a>
        </div>
           
        <a class="user-support">
          <i class="icon fa fa-users" aria-hidden="true"></i>
          <div class="animated alo-circle"></div>
          <div class="animated alo-circle-fill"></div>
        </a>
      </div>

