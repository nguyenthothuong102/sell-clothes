@extends('layouts.app')
@section('content')
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Giỏ hàng</h2>
					<div class="page_link">
						<a href="index.html">Trang chủ</a>
						<a href="cart.html">Giỏ hàng</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		@if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">

					<table class="table">
						@if($cart_contents->count()>0)
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Giá</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Tổng tiền</th>
								<th scope="col">Hành động</th>
							</tr>
						</thead>
						<tbody>

								@foreach($cart_contents as $cart)
								<tr>
									<td>
										<div class="media">
											<div class="d-flex">
												<img style="width: 80px;" src="{{asset($cart->attributes->img)}}" alt="">
											</div>
											<div class="media-body">
												<p>{{ $cart->name }}
												@if($cart->attributes->size) - Size: {{
												 App\ProductSize::find($cart->attributes->size)->size
												}}
												@endif
											</p>
											</div>
										</div>
									</td>
									<td>
										<h5>{{ number_format($cart->price) }} <u> đ</u></h5>
									</td>
									<td>
										<div class="product_count">
											@csrf
											<input type="hidden" name ="id_product-{!! $cart->id !!}" value="{!! $cart->id !!}">
											<input id="quaty-{!! $cart->id !!}" type="number" name="qty-{!! $cart->id !!}" value="{!! $cart->quantity !!}" step="0" min="1" max="5" autocomplete="off">
											<button  class="increase items-count" type="button" id="increase-{!! $cart->id !!}">
												<i class="lnr lnr-chevron-up"></i>
											</button>
											<button id="reduction-{!! $cart->id !!}"
											 class="reduced items-count" type="button">
												<i class="lnr lnr-chevron-down"></i>
											</button>

									<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
								        <script type="text/javascript">
								            $(document).ready(function(){
								                var max = parseInt( $("#quaty-{!! $cart->id !!}").attr("max"));
								                var min = parseInt($("#quaty-{!! $cart->id !!}").attr("min"));
								                $("#reduction-{!! $cart->id !!}").click(function(){
								                    var qty = parseInt($("#quaty-{!! $cart->id !!}").val());
								                    if(qty===1){
								                        $("#quaty-{!! $cart->id !!}").val(1);
								                        alert("Số lượng phải lớn hơn hoặc bằng 1");
								                    }
								                    else {
								                        $("#quaty-{!! $cart->id !!}").val(qty-1);
								                        var id = $('input[name="id_product-{!! $cart->id !!}"]').val();
								                        var token= $('input[name="_token"]').val();
								                        var qtys = $('input[name="qty-{!! $cart->id !!}"]').val();
								                        $.ajax({
								                            url:"{!! route('cart.update') !!}",
								                            type:"post",
								                            cahe:false,
								                            data:{"_token":token,"id":id,"quantity":qtys},
								                            success:function(data){
								                                if(data==1){
								                                    location.reload();
								                                }
								                            }
								                        });
								                    }
								                });
								                $("#increase-{!! $cart->id !!}").click(function(){
								                    var qty = parseInt( $("#quaty-{!! $cart->id !!}").val());
								                    if(qty===10){
								                        $("#quaty-{!! $cart->id !!}").val(10);
								                        alert("Số lượng phải nhỏ hơn hoặc bằng 10");
								                    }
								                    else{
								                        $("#quaty-{!! $cart->id !!}").val(qty+1);
								                        var id = $('input[name="id_product-{!! $cart->id !!}"]').val();
								                        var token= $('input[name="_token"]').val();
								                        var qtys = $('input[name="qty-{!! $cart->id !!}"]').val();
								                        $.ajax({
								                            url:"{!! route('cart.update') !!}",
								                            type:"post",
								                            cahe:false,
								                            data:{"_token":token,"id":id,"quantity":qtys},
								                            success:function(data){
								                                if(data==1){
								                                    location.reload();
								                                }
								                            }
								                        });
								                    }
								                });
								            });
								        </script>

										</div>
									</td>
									<td>
										<h5>{{ number_format($cart->price * $cart->quantity) }} <u> đ</u> </h5>
									</td>
									<td><div class="col-md-1"><a href="{!! route('cart.remove',$cart->id) !!}"><i class="fa fa-trash"></i></a></div></td>
								</tr>
								@endforeach



							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Tổng tiền</h5>
								</td>
								<td>
									<h5>{{ number_format($total) }} <u> đ</u></h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="/">Tiếp tục mua sắm</a>

										<a class="main_btn" href="{{ route('cart.checkout') }}">Tiến hành thanh toán</a>
									</div>
								</td>
							</tr>
						</tbody>
						@else
							<tr>

								<td style="color: red">Không có sản phẩm nào - bấm "Quay lại trang chủ" để tiến hành mua hàng!!!</td>
								<td colspan="5"><a class="main_btn" href="/">Quay lại trang chủ</a></td>
							</tr>
						@endif
					</table>

				</div>
			</div>
		</div>
	</section>

@endsection
