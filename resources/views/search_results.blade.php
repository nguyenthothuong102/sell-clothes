@extends('layouts.app')
@section('content')
<section class="feature_product_area section_gap">
        <div class="main_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="main_title">
                        <h2>Sản phẩm tìm kiếm</h2>
                    </div>
                </div>

                <div class="row">
                    @foreach($products as $product)
                    <div class="col col1">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <a href="{{route('products.show',$product->id)}}">
                                    <img class="img-fluid" style="height: 200px;" src="{{asset($product->photo())}}" alt="">
                                </a>
                                
                                
                            </div>
                            <a href="{{route('products.show',$product->id)}}">
                                <h4>{{$product->name}}</h4>
                            </a>
                            <h5>{{number_format($product->price)}} <u>đ</u></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
                

               
                <!-- <div class="row"> -->
                    <style>
                        .pagination {
                            justify-content: center;
                        }
                    </style>
                    {{ $products->links() }}
                <!-- </div> -->
            </div>
        </div>
    </section>
@endsection