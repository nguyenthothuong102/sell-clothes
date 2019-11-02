@extends('manager.layouts.master')

@section('content')
<main class="app-layout-content" style="padding-top: 30px;">
  <div  class="container-fluid p-y-md">
    <ul style="list-style: none;padding-bottom: 40px" class="navbar-nav mr-auto">
                        <li><a href="{{route('manager.products.index')}}"> Quần áo</a></li>
                        <li>&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;</li>
                        <li><a href="{{ route('manager.product.create')}}"> Tạo Quần áo mới </a></li>
    </ul>
  </div>

  <div  class="container-fluid p-y-md">
    <div class="container">
      <div class="card">
        <div class="card-header">Chỉnh sửa Quần áo</div>
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
          <div class="card-body">
            <form action="{{ route('manager.products.update', $product->id)}}" method="POST">
             @csrf
             @method('PUT')
              <div class="container mt-3">
                <!-- <fieldset class="form-group">
                   <label>Code</label>
                   <input type="text" class="form-control" id="code" value="{{$product->code}}" name="code">
                </fieldset> -->
                <fieldset class="form-group">
                   <label>Name</label>
                   <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name">
                </fieldset>
                <fieldset class="form-group">
                   <label>Brand</label>
                   <input type="text" class="form-control" id="brand" value="{{$product->brand}}" name="brand">
                </fieldset>
                <fieldset class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="5" id="description" name="description">{{$product->description}}</textarea>
                </fieldset>
                <fieldset class="form-group">
                  <label for="image">Price</label>
                  <input type="number" name="price" value="{{$product->price}}" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                  <label for="formGroupExampleInput">Category_id</label>
                  <select class="form-control" name="category_id">
                    @foreach ($categories as $key => $value)
                    @if ($product->category_id == $key)
                    <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                    <option value="{{$key}}">{{$value}}</option>
                    @endif
                    @endforeach
                    </select>
                    </fieldset>
                <div class="form-group row">

                        <div class="col-md-4 @error('images_up') has-error @enderror">
                            <img id="blah" src="{{asset($product->images[0]->path)}}" alt="your image" width="100" height="100" style="display: block"/>

                            <label for="images">Images <sup class="title-danger">*</sup>:</label>
                            <input type="file" @error('images_up') id="inputError" @enderror class="form-control" name="images_up[]" id="images" multiple
                                   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            >
                            @error('images_up')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
              </div>


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
