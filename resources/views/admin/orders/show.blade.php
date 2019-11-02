@extends('admin.layouts.master')
@section('content')
   <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
        .card{
            padding: 1em;
        }
        .card .create{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card .search{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card table, th, td{
            border: 1px solid #3c8dbc;
        }
        .card th{
            text-align: center;
            background-color: #3c8dbc;
            border: none;
            color: #fff;
        }
        .status .pending
        {
            display: inline-table;
            width: 100px;
            padding: 6px;
            background-color: #ff2634;
            color: #fff;
            text-align: center;
            font-weight: bold
        }
        .order_info ul li{
            list-style-type: none;
        }
        .order_info ul li p{
            width: 110px;
            display: inline-table;
            text-align: end;
            margin-right:2em;
            color: #000000;
            font-weight: bold;
        }
    </style>
    <!-- Content Header (Page header) -->
 <main class="app-layout-content">
<!-- Page Content -->
    <div class="container-fluid p-y-md">

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <h2 style="margin-top: 0;text-align: center;">ORDER DETAILS #{!! $order->id !!}</h2>
            <hr style="margin: 0;">
        </div>
        <div class="row">
            <div class=" card">

                <div class="container-fluid">

                    <div class="col-md-8 order_info">
                        <ul>
                            <li><p>Order id:</p> <span>#{{ $order->id }}</span></li>
                            <li><p>Name customer:</p> <span>{{ $order->first_name }} {{$order->last_name}}</span></li>
                            <li><p>Telephone:</p><span>{{ $order->tel }}</span></li>
                            <li><p>Address:</p><span>{{ $order->address }}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-4 order_info">
                        <ul>
                            <li><p>Total:</p> <span>{{ $order->total }} đ</span></li>
                            <li><p>Order date:</p>  <span>{{ date('d-m-Y',strtotime($order->created_at))}}</span></li>
                            <li class="status">
                                <p>Status:</p>
                                {{ $order->status }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Sản phẩm</th>
                    <!-- <th class="text-center" style="width: 50px;">Size</th> -->
                    <th class="text-center" style="width: 100px;">Số lượng</th>
                    <th class="text-right w-10">Đơn giá</th>
                    <th class="text-right w-10">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td class="text-center">{{ $orderDetail->product->id }}</td>
                        <td>{{ $orderDetail->product->name }}</td>
                        <!-- <td>{{ $orderDetail->size }}</td> -->
                        <td class="text-center">{{ $orderDetail->quantity }}</td>
                        <td class="text-right">{{ number_format($orderDetail->product->price) }}đ</td>
                        <td class="text-right">{{ number_format($orderDetail->product->price * $orderDetail->quantity) }}đ</td>
                    </tr>
                @endforeach
                <tr class="active">
                    <td colspan="4" class="font-500 text-uppercase text-right">Tổng tiền</td>
                    <td class="font-500 text-right">{{ number_format($order->total) }}đ</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            @if ($order->status == 'pending')
                <form method="POST" action="{{ route('admin.orders.update.status', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="approved">
                    <button class="btn btn-app-cyan">Duyệt đơn</button>
                </form>
            @elseif ($order->status == 'approved')
                <form method="POST" action="{{ route('admin.orders.update.status', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="complete">
                    <button class="btn btn-app-green">Hoàn tất</button>
                </form>
             @elseif ($order->status == 'complete')
                <form method="POST" action="{{ route('admin.orders.update.status', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="cancelled">
                    <button class="btn btn-app-green">Hủy</button>
                </form>
            @endif
        </div>
        <!-- /.row (main row) -->
    </section>
    </div>
</main>
@endsection

@section('javascript')

    <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
    <script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/js/app-custom.js') }}"></script>

    <!-- Page JS Code -->
    <script>

        $(document).ready(function () {

            //view order details when click a tr
            $(document).on('click', 'tr.order', function(event) {
                event.preventDefault();

                href = $(this).attr('href');
                window.location.replace(href);
            });

            $("table a, table button").on("click", function () {
                $(document).unbind("click");
            });

            $('button#btn-delete').on('click', function(event) {
                event.preventDefault();

                if (confirm('Bạn muốn hủy đơn hàng này?')) {
                    $(this).parent().children('form#order-cancelled-form').submit();
                }
            });
        });

    </script>

@endsection
