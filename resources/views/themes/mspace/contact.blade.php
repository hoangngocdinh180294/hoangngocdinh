@extends('themes.mspace.layouts.app')
@section('seo_support')
  <title>{{\App\Helpers\Base::getSetting('contact-title') }}</title>
  <meta name="description" content="{{\App\Helpers\Base::getSetting('contact-description') }}">
  <meta name="keywords" content="{{\App\Helpers\Base::getSetting('contact-keywords') }}">
@endsection
@section('after_css')
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('js/smart-forms/smart-forms.css')}}">
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('css/contact.css')}}">
@endsection 
@section('content')
  <section class="sec-padding section-light">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="smart-forms pd-25">
            <h3 class="raleway">Liên Hệ Với Chúng Tôi</h3>
            <br/>
            <form method="post" id="smart-form" > 
              {{csrf_field()}}
              <div>
                <div class="section">
                  <label class="field prepend-icon">
                    <input type="text" required name="full_name" id="full_name" class="gui-input" placeholder="Họ tên">
                    <span class="field-icon"><i class="fa fa-user"></i></span> </label>            
                </div>
                <div class="section">
                  <label class="field prepend-icon">
                    <input type="email" required name="mail_contact" id="mail-contact" class="gui-input" placeholder="Email">
                    <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                </div>
                <div class="section colm colm6">
                  <label class="field prepend-icon">
                    <input type="tel" required name="phone" id="phone" class="gui-input" placeholder="Số điện thoại ">
                    <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                </div>
                <div class="section">
                  <label class="field prepend-icon">
                    <textarea class="gui-textarea"  id="body" name="body" placeholder="Nội dung "></textarea>
                    <span class="field-icon"><i class="fa fa-comments"></i></span>  </label>
                </div>
                <div class="result"></div>
              </div>          <!-- end .form-body section -->
              <div class="form-group">


                <button id="form-group-bt" class="ui-form__btn btn btn-sm btn-info btn-full btn-effect"><i class="icon pe-7s-mail"></i>send message</button>

              

            </div>
              <!-- end .form-footer section -->
            </form>
          </div>
          <!-- end .smart-forms section --> 
          
        </div>
        <div class="col-md-4 ">
          <div class="pd-25">
          <img src="{{App\Helpers\Theme::assetsPath('images/logom.png')}}" /><br><br>
            <h4>  {{\App\Helpers\Base::getSetting('slogan','Thách thức mọi không gian') }}</h4>
          Địa chỉ: {{\App\Helpers\Base::getSetting('dia-chi') }}<br />

          Điện thoại : <a href="tel:{{\App\Helpers\Base::getSetting('dien-thoai') }}"> {{\App\Helpers\Base::getSetting('dien-thoai') }}</a><br />

          E-mail : <a href="mailto:{{\App\Helpers\Base::getSetting('email') }}" >{{\App\Helpers\Base::getSetting('email') }}</a><br />
          Website : <a >{{\App\Helpers\Base::getSetting('website') }}</a>
          <div class="clearfix"></div>
          <br/>

          <div id="map" class="map">
{{--           <a href="{{\App\Helpers\Base::getSetting('map') }}"> </a>--}}
              {!!strip_tags(\App\Helpers\Base::getSetting('map'),'<p><br><img><ul><li><table><quote><em><strong><iframe>')!!}
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  <!-- modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="mess">
        Cảm ơn bạn đã để lại thông tin
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('after_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- jq -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

 <script>
    $(document).ready(function(){
          $("#smart-form").validate({
            rules: {
                full_name: "required",
                mail_contact: "required",
            },
            messages: {
                full_name: "Vui lòng nhập tên của bạn",
                mail_contact: "Bạn phải nhập đúng định dạng Email. VD:abc@gmail.com",
                phone: "Vui lòng để lại số điện thoại của bạn",
              
            }
        });

            $("#form-group-bt").click(function(event){
                var CSRF_TOKEN = $('meta[name=csrf_token]').attr('content');

                if(!$("#smart-form").valid()) {
                return;
              }
              event.preventDefault();
              var full_name = $("#full_name").val();
              var email = $("#mail-contact").val();
              var phone = $("#phone").val();
           
              var body = $("#body").val();
              
              
              var obj = {
                full_name : full_name,
                email: email,
                phone: phone,
              
                body:body,
                 _token: CSRF_TOKEN
              };
              $.ajax({
                    /* the route pointing to the post function */
                    url: '{!! route('addcontact') !!}',
                    type: 'POST',
                    data: obj,
                    dataType: 'JSON', 
                    success: function ({errors}) {   
                      if(errors) {
                        for(let i in errors) {
                          return swal({
                              title: "Lỗi",
                              text: errors[i].join(','),
                              icon: "error",
                          })
                        }
                        
                      }
                          swal({
                            title: "Hoàn thành",
                            text: "Cám ơn bạn đã liên hệ với chúng tôi !",
                            icon: "success",
                               });                    
                    },

                    error: function (xhr, ajaxOptions, thrownError) {
                        if(xhr.status == 422){
                            swal({
                            title: "Lỗi",
                            text: thrownError,
                            icon: "error",
                               });
                        }
                  }
                }); 
            });
        });  

    </script>
    @stop
