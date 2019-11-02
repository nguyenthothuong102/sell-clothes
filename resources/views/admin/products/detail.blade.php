@extends('admin.layouts.master')

@section('content')
<main class="app-layout-content">
  <div  class="container-fluid p-y-md">
    <h2 class="section-title">Quản lý chi sản phẩm</h2>
      <div class="row">
        <div class="col-md-12">
        <!-- Card Tabs Default Style -->
          <div class="card">
            <ul class="nav nav-tabs" data-toggle="tabs">
              <li class="active">
                <a href="#btabs-static-home">Chi tiết</a>
              </li>
            </ul>
              <div class="card-block tab-content">
                <div class="tab-pane active" id="btabs-static-home">
                    <div class="card-body">
                        <div class="row"  >
                          
                            <div class="col-md-3" style="padding: 0 0.5em">
                              @foreach($product->images as $image)
                                <img id="imgShow" src="{{asset($image->path)}}" width="200" height="50%" 
                                     alt="..." class="img-thumbnail">
                              @endforeach
                            </div>
                            <div class="col-sm-4" > 
                              @if(count($images))
                              <img style="width: 400px; height: 500px;float:left" src="{{asset($product->images[0]->path)}}"> 
                              @else
                              <img style="width: 400px; height: 500px;float:left" src="">
                              @endif

                            </div>

                            <div class="col-sm-5">
                              <div style="margin-left: 80px; color: red">
                            <p><b>Mã sản phẩm:</b> {{$product->code}}</p><br>
                            <p><b>Tên sản phẩm:</b> {{$product->name}}</p><br>
                            <p><b>Hãng:</b> {{$product->brand}}</p><br>
                            
                            <p><b>Size :</b> {{implode(',', $productSize->pluck('size')->toArray())}}</p>
                            <br>

                            <p><b>Số lượng :</b> {{$productSize->sum('quantity')}}</p><br>
                           
                            <p><b>Giá: </b>{{number_format($product->price)}}đ</p><br>
                              </div>
                            </div>
                      </div>
                    </div>
                </div>
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

<!-- Page JS Code -->
<script src="{{ asset('admin/js/pages/index.js') }}"></script>
<script>
  $(function () {
        // Init page helpers (Slick Slider plugin)
        App.initHelpers('slick');
      });

  $(document).ready(function ($) {
    $('.logout').on('click', function () {
      event.preventDefault();
      $('form[name=logout]').submit();
      console.log('working');
    });
  });
</script>

@endsection
