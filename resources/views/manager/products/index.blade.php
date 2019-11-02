@extends('manager.layouts.master')

@section('content')

<main class="app-layout-content">
  <div class="container-fluid p-y-md">
    <!-- Card Tabs -->
    <h2 class="section-title">Quản lý sản phẩm || <a href="{{ route('manager.product.create')}}"> Tạo mới sản phẩm </a></h2>
    <div class="row">
      <div class="col-md-12">
      <!-- Card Tabs Default Style -->
        <div class="card">
          <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
              <a href="#btabs-static-home">Tất cả sách</a>
            </li>
          </ul>
      <div class="card-block tab-content">
        <div class="tab-pane active" id="btabs-static-home">
         <div class="card-body">
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <table class="table">
          <thead >
            <tr class="bg-info">
                <th >
                  Code
                </th>
                <th>
                  Name
                </th>
                <th>
                  Brand
                </th>

                <th style="text-align: center;">
                  Price
                </th>
                <th>
                  Category_ID
                </th>
                <th style="width: 100px;">
                 Action
               </th>
            </tr>
         </thead>
         <tbody>
          @foreach($products as $product)
          <tr class="bg-warning">
            <td >{{ $product->code }}</td>
            <td ><a href="{{ route('manager.product.detail', $product['id']) }}">{{ $product->name }}</a></td>
            <td>{{ $product->brand }}</td>
           <!--  <td style="text-align: center;">{{ $product->description }}</td> -->
            <td style="text-align: center;">{{number_format($product->price) }} đ</td>
            <td style="padding-left: 50px;">{{ $product->category_id }}</td>
            <td>
              <a href="{{ route('manager.products.createProductSize',  $product->id ) }}" class="btn btn-xs btn-default"><i>+</i>
              </a>
              <a href="{{ route('manager.products.edit',  $product->id ) }}" class="btn btn-xs btn-default"><i class="ion-edit"></i>
              </a>
              <form action="{{ route('manager.product.destroy', $product->id) }}" method="post" style="display: inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-xs btn-default btdelete"><i class="ion-close"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
       <div  class="container-fluid p-y-md">
                <div style="padding-left: 400px;" class="col-lg-12">
                    {{$products->links()}}
                </div>
      </div>
    </div>

  </div>
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

<!-- Page Plugins -->
<script src="{{ asset('admin/js/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.stack.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.min.js') }}"></script>

@endsection
