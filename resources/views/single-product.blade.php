@extends('layouts.app')
@section('content')
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Trang sản phẩm duy nhất</h2>
					<div class="page_link">
						<a href="index.html">Trang chủ</a>
						<a href="category.html">Loại sản phẩm</a>
						<a href="single-product.html">Thông tin chi tiết sản phẩm</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">

				<div class="col-md-6">
                    <div class="row">

                        <div class="col-md-3" style="padding-right: 0;">
                            <ul class="list-unstyled">
                                @if(count($product->images)>0)
	                                    @foreach($product->images as $image)
										<div class="carousel-item active">
											<img class="d-block w-100" src="{{asset($image->path)}}" alt="First slide">
										</div>

									@endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-9" style="padding: 0 0.5em">
                        	@if(count($product->images))
								<div class="carousel-item active">
									<img id="imgShow" src="{{asset($image->path)}}" width="400"
                             			alt="..." class="img-thumbnail">
								</div>
							@else
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('images/photodefaul.jpg')}}" alt="First slide">
								</div>
                            @endif
                        </div>
                        <!-- <div class="col-md-9" style="padding: 0 0.5em">
                        	@if(count($product->images))
                                @foreach($product->images as $image)
                                    @if(isset($image->path))
									<div class="carousel-item active">
										<img id="imgShow" src="{{asset($image->path)}}" width="400"
                                 			alt="..." class="img-thumbnail">
									</div>
									@endif
								@endforeach
							@else
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('images/photodefaul.jpg')}}" alt="First slide">
								</div>
                            @endif
                        </div> -->

                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script type="text/javascript"
                                src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
                        <script type="text/javascript"
                                src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.list-unstyled img').click(function (e) {
                                    e.preventDefault();
                                    $('#imgShow').attr("src", $(this).attr("src"));

                                    $('#imgShow').ezPlus();
                                });
                                $('#imgShow').ezPlus();
                            });
                        </script>
                    </div>
                </div>
				<div class="col-lg-5 offset-lg-1">
					<form action="{{ route('cart.add',$product->id) }}" method="POST" >
						@csrf
							<div class="s_product_text">
							<h3>{{$product->name}}</h3>
							<h2>{{number_format($product->price)}} <u>đ</u></h2>
							<ul class="list">
								<li>
									<a class="active" href="#">
										<span>Hãng</span> :{{$product->brand}}</a>
								</li>
								<li>

									<span>Size</span>

										@foreach($productSizes as $productSize)
											<input type="radio" name="productSize" id="size" value="{{$productSize->id}}" >
											<!-- <input type="hidden" name="id"> -->
											<label for="">{{$productSize->size}}</label>
										@endforeach
									@if ($errors->has('productSize'))
		                                <div class="has-error">
		                                	<i style="color:red">{{ $errors->first('productSize') }}</i>
		                                </div>
	                                @endif
								</li>
							</ul>
							<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

							<p>{{$product->description}}</p>
							<div class="product_count">
								<label for="qty">Số lượng:</label>
								<input type="number" name="qty" id="sst" min="1" max="10" value="1" title="Quantity:" class="input-text qty">
								<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
								 class="increase items-count" type="button">
									<i class="lnr lnr-chevron-up"></i>
								</button>
								<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
								 class="reduced items-count" type="button">
									<i class="lnr lnr-chevron-down"></i>
								</button>
							</div>
							<div class="card_area">
								<button type="submit" id="submit" class="main_btn">Thêm giỏ hàng</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
@endsection
