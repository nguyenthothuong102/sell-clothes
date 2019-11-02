@extends('layouts.app')
@section('content')
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Thanh toán</h2>
					<div class="page_link">
						<a href="/">Trang chủ</a>
						<a href="/checkout">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
                    <div class="col-lg-7">
                         <form action="{!! route('orderPay') !!}" method="post">
                        @csrf
                        <div class="row cart-content-inforcustomer border mb-2">
                            <div class="title col-12">
                                <p class="font-weight-bolder">THÔNG TIN GIAO HÀNG</p>
                            </div>
                            <div class="container">
                                <div class="form-group">
                                    <label for="usr">Họ <sup class="title-danger">*</sup>:</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{!! $user->first_name ? $user->first_name : old('first_name') !!}" id="first_name" required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="usr">Tên <sup class="title-danger">*</sup>:</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{!! $user->last_name ? $user->last_name : old('last_name') !!}" id="last_name" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Số điện thoại <sup class="title-danger">*</sup>:</label>
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{!! $user->tel ? $user->tel : old('tel') !!}" id="tel" required>
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="usr">Địa chỉ giao hàng <sup class="title-danger">*</sup>:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{!! $user->address ? $user->address :  old('address') !!}" id="address" required>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-5">
						<div class="order_box">
							<h2>Đơn hàng</h2>
							<ul class="list">
                                @foreach($cart_contents as $cart)
                                <tr>
                                    <li>
                                    <a href="#">{{ $cart->name }}


                                        <span>{{ number_format($cart->price) }}</span> -> Size:
                                    </a>
                                </li>
                                </tr>
                                @endforeach
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Tổng tiền
										<span>{{ number_format($total) }}</span>
									</a>
								</li>
							</ul>

							<button class="btn btn-success w-100" >@lang('labels.order_confirmation')</button>
						</div>
					</div>
                    </form>
				</div>
			</div>
		</div>
	</section>
@endsection
