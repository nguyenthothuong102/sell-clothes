@extends('admin.layouts.master')

@section('content')
<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div style="margin-bottom: 20px;">
    		
    	</div>
        @switch($status)
            @case('pending')
                    <h4>Đang chờ xử lý</h4>
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
                                <th>{{ $order->user->last_name . ' ' . $order->user->first_name }}</th>
                                <th>{{ $order->user->tel }}</th>
                                <th>{{ $order->user->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.order.destroy', ['id' => $order->id ])}}" style="display: inline;" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default"><i class="ion-android-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div>{{ $orders->links() }}</div>
                @break
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
                                <th>{{ $order->user->last_name . ' ' . $order->user->first_name }}</th>
                                <th>{{ $order->user->tel }}</th>
                                <th>{{ $order->user->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.order.destroy', ['id' => $order->id ])}}" style="display: inline;" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default"><i class="ion-android-delete"></i></button>
                                    </form>
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
                                <th>{{ $order->user->last_name . ' ' . $order->user->first_name }}</th>
                                <th>{{ $order->user->tel }}</th>
                                <th>{{ $order->user->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.order.destroy', ['id' => $order->id ])}}" style="display: inline;" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default"><i class="ion-android-delete"></i></button>
                                    </form>
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
                                <th>{{ $order->user->last_name . ' ' . $order->user->first_name }}</th>
                                <th>{{ $order->user->tel }}</th>
                                <th>{{ $order->user->address }}</th>
                                <th>{{ $order->total }}</th>
                                <td>
                                    <a href="{{ route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-xs btn-default" title="Chi tiết"><i class="ion-android-locate"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.order.destroy', ['id' => $order->id ])}}" style="display: inline;" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default"><i class="ion-android-delete"></i></button>
                                    </form>
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

