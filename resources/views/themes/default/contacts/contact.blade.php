@extends('layouts.main')
@section('title')
Liên hệ
@stop

@section('seo_tags')
<meta name="description" content="Liên hệ với chúng tôi"/>
<meta name="keywords" content=""/>
@stop

@section('before-nav')
    @include('elements.before_header')
@stop

@section('content')
  <section>
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <div class="card">
                        <div class="card-header">
                            Liên hệ với chúng tôi
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Họ tên</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" id="inputName">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCompany">Địa chỉ</label>
                                        <input type="text" class="form-control" name="company" placeholder="Company"
                                            id="inputCompany">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" id="inputEmail">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNumber">Điện thoại liên hệ</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            id="inputNumber">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Bạn muốn nhắn gì đến chúng tôi</label>
                                    <textarea class="form-control" rows="5" id="inputMessage"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
