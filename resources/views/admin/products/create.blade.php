@extends('admin.layouts.master')

@section('content')

<main class="app-layout-content">
  
  <div class="container-fluid p-y-md">
  <!-- Bootstrap Style -->
  <h2 class="section-title">Quản lý sản phẩm</h2>

    <div class="row">
                  <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf
                    <div class="col-md-6">
                    <!-- Default Elements -->
                      <div class="card">
                        <div class="card-header">
                            <h4>Tạo mới sản phẩm</h4>
                        </div>
                        <div class="card-block">
                          <div class="container mt-3" style="width: 80%">
                            <fieldset class="form-group">
                              <label>Tên sản phẩm <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="name_product" placeholder="Mời bạn nhập tên sản phẩm" name="name_product">
                                <p class="meserr" style="color:red">{{ $errors->first('name_product') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Hãng sản phẩm <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="brand_product" placeholder="Mời bạn nhập hãng sản phẩm" name="brand_product">
                                <p class="meserr" style="color:red">{{ $errors->first('brand_product') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Mô tả <span class="text-red">*</span></label>
                              <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                              <p class="meserr" style="color:red">{{ $errors->first('description') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Giá  <span class="text-red">*</span></label>
                              <input type="number" name="price" class="form-control">
                              <p class="meserr" style="color:red">{{ $errors->first('price') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label for="formGroupExampleInput">Loại</label>
                                <select class="form-control" name="category_id">
                                @foreach ($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                </select>
                            </fieldset>
                          </div>
                        </div>
                      <!-- .card-block -->
                      </div>
                      <!-- .card -->
                      <!-- End Default Elements -->
                     <!--  Inline Form -->
                      <div class="card">
                       <div class="card-header">
                         <h4>Ảnh sản phẩm </h4>
                       </div>
                       <div class="card-block card-block-full">
                         <div class="container"  style="width: 80%">
                           <fieldset class="form-group">
                           <label>Tên hình ảnh <span class="text-red">*</span></label>
                           <input type="text" class="form-control" id="name_image" placeholder="Mời bạn nhập tên hình" name="name_image">
                           <p class="meserr" style="color:red">{{ $errors->first('name_image')}}</p>
                           </fieldset>
                           <fieldset class="form-group">
                           <label for="image">Hình ảnh</label>
                           <input type="file" name="images[]" multiple class="form-control" style="height: 45px">
                           <p class="meserr" style="color:red">{{ $errors->first('images')}}</p>
                           </fieldset>
                         </div>
                       </div>
                     </div> 
                      <!-- End Inline Form -->
                    </div>

                    <!-- .col-md-6 -->
                    <div class="col-md-6">
                      <!-- Normal Form -->
                      <div class="card">
                        <div class="card-header">
                          <h4>Chi tiết sản phẩm</h4>
                        </div>
                        <div class="card-block">
                        <div class="container" style="width: 80%">
                            <fieldset class="form-group">
                              <label>Kích cỡ size <span class="text-red">*</span></label>
                              <input type="text" class="form-control" id="size" placeholder="Nhập size của sản phẩm" name="size">
                              <p class="meserr" style="color:red">{{ $errors->first('size') }}</p>
                            </fieldset>
                            <fieldset class="form-group">           
                              <label>Số lượng<span class="text-red">*</span></label>
                              <input type="number" name="quantity" id="quantity" class="form-control">
                              <p class="meserr" style="color:red">{{ $errors->first('quantity') }}</p>
                            </fieldset>
                            <!-- <fieldset class="form-group">
                              <label>Chất liệu<span class="text-red">*</span></label>
                              <input type="text" name="cover" class="form-control">
                              <p class="meserr">{{ $errors->first('cover') }}</p>
                            </fieldset> -->
                        </div>
                      </div>
                    </div>
                <!-- End Normal Form -->
              </div>
            <button style="margin-left: 270px" class="btn btn-success">Tạo sản phẩm</button>
        </form>
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
