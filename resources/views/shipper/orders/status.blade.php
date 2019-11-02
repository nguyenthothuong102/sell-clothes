@extends('shipper.layouts.master')

@section('content')
<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div style="margin-bottom: 20px;">

    	</div>
        @switch($status)
            @case('approved')
                    <h4>Đã duyệt</h4>
                    <table class="table">

                        <thead >
                        <tr class="bg-info">
                            <th>#</th>
                            <th>Name</th>
                            <th>Tel</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th style="width:100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-warning">
                                <th>{{ $order->id }}</th>
                                <th>{{ $order->last_name . ' ' . $order->first_name }}</th>
                                <th>{{ $order->tel }}</th>
                                <th>{{ $order-->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('shipper.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @break
            @case('complete')
                    <h4>Hoàn tất</h4>
                    <table class="table">
                        <thead >
                        <tr class="bg-info">
                            <th>#</th>
                            <th>Name</th>
                            <th>Tel</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th style="width:100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-warning">
                                <th>{{ $order->id }}</th>
                                <th>{{ $order->last_name . ' ' . $order->first_name }}</th>
                                <th>{{ $order->tel }}</th>
                                <th>{{ $order->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('shipper.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @break
            @case('cancelled')
                    <h4>Đã hủy</h4>
                    <table class="table">

                        <thead >
                        <tr class="bg-info">
                            <th>#</th>
                            <th>Name</th>
                            <th>Tel</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th style="width:100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-warning">
                                <th>{{ $order->id }}</th>
                                <th>{{ $order->last_name . ' ' . $order->first_name }}</th>
                                <th>{{ $order->tel }}</th>
                                <th>{{ $order->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('shipper.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @break
        @endswitch
    </div>
    <!-- End Page Content -->

</main>

@endsection

