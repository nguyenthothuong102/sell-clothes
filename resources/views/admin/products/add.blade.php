@extends('admin.layouts.master')

@section('content')
<main class="app-layout-content" style="padding-top: 30px;">
  <div  class="container-fluid p-y-md">
    <ul style="list-style: none;padding-bottom: 40px" class="navbar-nav mr-auto">
                        <li><a href="{{route('admin.products.index')}}"> Quần áo</a></li> 
                        <li>&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;</li>
                        <li><a href="{{ route('admin.product.create')}}"> Tạo Quần áo mới </a></li>           
    </ul>
  </div>

  <div  class="container-fluid p-y-md">      
    <div class="container">
      <div class="card">
        <div class="card-header"><h2>Thêm Size cho sản phẩm</h2></div>
          <div class="card-body">
            <form action="{{ route('admin.products.storeProductSize', $product->id)}}" method="post"> 
             @csrf
              <div class="container mt-3">
                <fieldset class="form-group">
                    <label>Kích cỡ size <span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="size" placeholder="Thêm size của sản phẩm" name="size">
                    <p class="meserr" style="color:red">{{ $errors->first('size') }}</p>
                  </fieldset>
                <fieldset class="form-group">           
                  <label>Số lượng<span class="text-red">*</span></label>
                  <input type="number" placeholder="Thêm số lượng của sản phẩm" name="quantity" id="quantity" class="form-control">
                  <p class="meserr" style="color:red">{{ $errors->first('quantity') }}</p>
                </fieldset>
              <div class="form-group">
                <button class="form-control btn btn-success" type="submit" style="width: 150px;">Lưu</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>
</main>




@endsection