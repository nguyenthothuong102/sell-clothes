@extends('layouts.app')
@section('content')

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

<!-- Start Bradcaump area -->
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
                <div class="login_form_inner">
                    <h3>Đăng nhập</h3>
                    <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" name="email" class="form-control" id="name" value="{{ old('email') }}" placeholder="Email *">
                            @if ($errors->has('email'))
                            <div class="has-error">
                                <i style="color: red">{{ $errors->first('email') }}</i>
                            </div>
                            @endif
                        </div>
                        <!-- <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Mật khẩu *">
                        </div> -->
                        <div class="col-md-12 form-group">
                            <input type="password" name="password" class="form-control" id="name" name="name" placeholder="Mật khẩu *">
                            @if ($errors->has('password'))
                            <div class="has-error">
                                <i style="color: red">{{ $errors->first('password') }}</i>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Ghi nhớ</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">@lang('labels.account.login')</button>
                           <a class="" href="{{ route('password.request') }}">@lang('labels.account.forgot_password')?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
