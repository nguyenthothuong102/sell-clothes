<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://salt.tikicdn.com/desktop/img/avatar.png?v=3" height="25" width="25" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->first_name}}</p>
                <a href="/"><i class="fa fa-circle text-success"></i> Hoạt động</a>
            </div>
        </div>
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản lý hệ thống</li>
            <li>
                <a href="{{ route('shipper.orders.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Đơn hàng</span>
                    <span class="pull-right-container"><small class="label pull-right bg-green"></small></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
