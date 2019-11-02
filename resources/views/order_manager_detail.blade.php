@extends('layouts.app')
@section('content')

<div class="container-fluid">
        <div class="col-md-12" style="margin-top:150px ">
            <div class="content-right row  ml-0 p-0">
                <div class="container">
                    <div class="row">
                        <h4 class="have-margin col-md-6 mb-3 mt-3">Chi tiết đơn hàng #{{$ordered->id}}
                            -  @if($ordered->status=='approved')
                                    <p>Đã xử lý</p>
                                @elseif($ordered->status=='complete')
                                    <p>Đang gửi</p>
                                @elseif($ordered->status=='cancelled')
                                    <p>Đã hủy</p>
                                @elseif($ordered->status=='pending')
                                    <p>Chờ xử lý</p>
                                @endif
                        </h4>
                        <p class="date col-md-6" style="margin-top: 16px;text-align: right">
                            <span>Ngày đặt hàng:  </span>{{date('H:i d-m-Y', strtotime($ordered->date))}}</p>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pr-1 address-1">
                            <h3>Địa chỉ người nhận</h3>
                            <div class="card p-2">
                                <p class="name mt-0">{{$ordered->name}}</p>
                                <p class="mt-0"><span>Địa chỉ: </span>{{$ordered->address}}</p>
                                <p><span>Điện thoại: </span>{{$ordered->tel}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1 payment-2">
                            <h3>Hình thức thanh toán</h3>
                            <div class="card p-2">
                                <p>Thanh toán tiền mặt khi nhận hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded my-3 p-4 ">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tạm tính</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordered->orderDetails as $order_detail)
                                <tr>
                                    <td>
                                        <img src="{{asset($order_detail->product->images[0]->path)}}"
                                             width="50" alt="{{$order_detail->product->name}}">
                                    </td>
                                    <td>
                                        <a href="">{{$order_detail->product->name}}</a>
                                    </td>
                                    <td>{{number_format($order_detail->price)}}&nbsp;₫</td>
                                    <td>{{$order_detail->quantity}}</td>
                                    <td>{{number_format($order_detail->total)}}&nbsp;₫</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table>
                            <tbody style="text-align: right;">
                            <!--Total Summary List-->
                            <tr>
                                <td colspan="4">
                                    <span>Tổng tạm tính</span>
                                </td>
                                <td>{{number_format($ordered->total)}}&nbsp;₫</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <span>Phí vận chuyển</span>
                                </td>
                                <td>0&nbsp;₫</td>
                            </tr>

                            <!--Final Total-->
                            <tr>
                                <td colspan="4"><span>Tổng cộng</span></td>
                                <td><span style="color: #ff3b27;font-size: 18px;">{{number_format($ordered->total)}}&nbsp;₫</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{route('order_manager')}}" class="btn-simple pb-2 pl-2">&lt;&lt; Quay lại
                    đơn hàng của
                    tôi</a>
            </div>
        </div>
</div>

@endsection