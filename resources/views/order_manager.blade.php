@extends('layouts.app')
@section('content')
    <style>
        
    </style>
    <div class="container-fluid">
            <div class="col-md-12" style="margin-top: 150px">
                <div class="content-right row  ml-0 p-0">
                    <h1 class="have-margin container mb-0 mt-3">Đơn hàng của tôi</h1>
                    <div class="container">
                        <div class="card rounded my-3 p-4 ">
                            <table class="table">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái đơn hàng</th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="{{ route('order_manager_detail',$order->id)}}">{{$order->id}}</a></td>
                                        <td>{{date("d-m-Y", strtotime($order->date))}}</td>
                                        <td>
                                            @foreach($order->orderDetails as $order_detail)
                                                <p>{{$order_detail->product->name}}</p>
                                            @endforeach
                                        </td>
                                        <td>{{number_format($order->total)}} đ</td>
                                        <td>
                                            @if($order->status=='approved')
                                                <p>Đã xử lý</p>
                                            @elseif($order->status=='complete')
                                                <p>Đang gửi</p>
                                            @elseif($order->status=='cancelled')
                                                <p>Đã hủy</p>
                                            @elseif($order->status=='pending')
                                                <p>Chờ xử lý</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection