@extends('admin.layouts.master')

@section('content')

<main class="app-layout-content">
  
  <div class="container-fluid p-y-md">
      <!-- Card Tabs -->
      <h2 class="section-title">Quản lý người dùng</h2>
        <div class="row">
          <div class="col-md-12">
          <!-- Card Tabs Default Style -->
            <div class="card">
              <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active">
                  <a href="#btabs-static-home">Chỉnh sửa người dùng</a>
                </li>
              </ul>
              <div class="card-block tab-content">
                <div class="tab-pane fade in active" id="profile-tab1">
                  <form class="fieldset" action="{{ route('admin.user.update', ['id' => $user->id ]) }}" method="post">
                    @csrf
                    <div class="form-group row">
                      <div class="col-xs-6">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" />
                      </div>
                      <div class="col-xs-6">
                        {{-- <input type="hidden" hidden class="form-control" id="password" name="password" value="{{$user->password}}" /> --}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-xs-6">
                        <label>First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"  value="{{$user->first_name}}" />
                      </div>
                      <div class="col-xs-6">
                        <label>Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-xs-4">
                        <label>Tel</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="{{$user->tel}}" />
                      </div>
                      <div class="col-xs-4">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" />
                      </div>   
                      <div class="col-xs-4">
                        <label for="formGroupExampleInput">Role_name</label>
                              <select class="form-control" name="role_id" >
                              @foreach ($roles as $key => $value)
                              @if ($user->role_id == $key) 
                              <option value="{{$key}}" selected>{{$value}}</option>
                              @else
                              <option value="{{$key}}">{{$value}}</option>
                              @endif
                              @endforeach
                              </select>
                      </div>
                    </div>
        
                          <button style="margin-left: 270px" class="btn btn-primary">Save User</button>

                  </form>
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

@endsection
