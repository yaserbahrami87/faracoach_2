<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/images/logo-colored.png"  class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(is_null(Auth::user()->personal_image) )
                            <img src="/images/users/default-avatar.png" class="img-circle elevation-2" >
                    @else
                            <img src="/documents/users/{{Auth::user()->personal_image}}" class="img-circle elevation-2" >
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->fname.' '.Auth::user()->lname}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>داشبورد</p>
                        </a>
                    </li>

                    @foreach(Module::collections() as $module)
                        @if(View::exists("{$module->getLowerName()}::admin.rightBar"))
                            @include("{$module->getLowerName()}::admin.rightBar")
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
