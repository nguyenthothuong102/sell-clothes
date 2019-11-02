@extends('layouts.app')

@section('content')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Login/Register</h2>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="{{route('register')}}">Register</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="my__account__wrapper">
                    <h3 class="account__title text-center">@lang('labels.account.reset_password')</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="account__form">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="col-md-12 form-group">
                                <label>@lang('labels.account.email_address') <span>*</span></label>
                                <input type="text" class="form-control" value="{{ $email }}" disabled="">
                                @if ($errors->has('email'))
                                <div class="has-error">
                                    <i>{{ $errors->first('email') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label>@lang('labels.account.new_password') <span>*</span></label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <div class="has-error">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label>@lang('labels.account.new_password_confirm')<span>*</span></label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="col-md-12 form-group">
                                <button>@lang('labels.account.change_password')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
