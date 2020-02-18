
<form id="contact-form" class="contact-form" method="POST">
{{csrf_field()}}
<div class="box-form">
	<div class="form-group">
		<input id="full_name" class="form-control name input-sm form-full" required type="text" name="full_name" placeholder="Họ tên*">
	</div>
	<div class="form-group">
	    <input id="mail-contact" class="form-control email input-sm form-full" required type="email" name="mail_contact" placeholder="E-Mail*">
	</div>
    <div class="form-group">
        <input id="phone" class="form-control sub input-sm form-full" required type="text" name="phone" placeholder="Số điện thoại*">
    </div>
	<div class="form-group">
		<textarea id="body" class="form-control message form-full" required name="body" placeholder="Nội dung:"></textarea>
    </div>
    <button id="form-group-bt" class="ui-form__btn btn btn-sm btn-info btn-full btn-effect"><i class="icon pe-7s-mail"></i>gửi thông tin</button>
</div>
</form>
@section('after_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
 <script>
    $(document).ready(function(){
          $("#contact-form").validate({
            rules: {
                full_name: "required",
                mail_contact: "required",
            },
            messages: {
                full_name: "Vui lòng nhập tên của bạn",
                mail_contact: "Bạn phải nhập đúng định dạng Email. VD:abc@gmail.com",
                phone: "Vui lòng để lại số điện thoại của bạn",
				body: "Vui lòng điền nội dung"
            }
        });
            $("#form-group-bt").click(function(event){
                var CSRF_TOKEN = $('meta[name=csrf_token]').attr('content');

                if(!$("#contact-form").valid()) {
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
