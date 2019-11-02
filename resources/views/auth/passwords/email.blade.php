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
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my__account__wrapper">
                    <h3 class="account__title">@lang('labels.account.reset_password')</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="account__form">
                            <div class="col-md-12 form-group">
                                <label>@lang('labels.account.email_address') <span>*</span></label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="has-error">
                                        <i>{{ $errors->first('email') }}</i>
                                    </div>
                                @endif
                            </div>
                            <div class="form__btn text-center">
                                <button>@lang('labels.account.send_forgot_password_link')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
