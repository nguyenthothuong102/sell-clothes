@extends('layouts.app')

@section('content')


<!-- End My Account Area -->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Đăng nhập/Đăng ký</h2>
                    <div class="page_link">
                        <a href="/">Trang chủ</a>
                        <a href="{{route('register')}}">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Login Box Area =================-->
    <section class="login_box_area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Mới vào trang web của chúng tôi?</h4>
                        <p>Có những tiến bộ được thực hiện trong khoa học và công nghệ hàng ngày, và một ví dụ điển hình cho điều này là</p>
                        <a class="main_btn" href="{{route('register')}}">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner reg_form">
                        <h3>Tạo tài khoản</h3>
                         <form method="POST" action="{{ route('register') }}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row login_form" method="POST">
                            <div class="col-md-12 form-group">

                                <input type="email" placeholder="Nhập địa chỉ email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('email') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input type="text" placeholder="Nhập họ" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('last_name') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text"  class="form-control"
                                placeholder="Nhập tên" name="first_name" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('first_name') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input id="tel" placeholder="Nhập số điện thoại" class="form-control" type="text" name="tel" value="{{ old('tel') }}" autocomplete="off">
                                @if ($errors->has('tel'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('tel') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input id="address" placeholder="Nhập địa chỉ của bạn" class="form-control" type="text" name="address" value="{{ old('address') }}" autocomplete="off">
                                @if ($errors->has('address'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('address') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input type="password" placeholder="Nhập mật khẩu" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirm'))
                                <div class="has-error">
                                    <i style="color: red">{{ $errors->first('password_confirm') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn submit_btn">@lang('labels.account.register')</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/vendor/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vendor/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    jQuery('#datepicker').datetimepicker({
        timepicker: false,
        format: 'd/m/Y',
        minDate: '1970/01/02',
        maxDate: '0'
    });
</script>
@endsection
