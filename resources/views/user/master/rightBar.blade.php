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
                    @if(is_null(Auth::user()->personal_image))
                        <img src="/images/users/default-avatar.png" class="img-circle elevation-2" />
                    @else
                        <img src="/images/users/{{Auth::user()->personal_image}}" class="img-circle elevation-2" />
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->fname.' '.Auth::user()->lname}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    @foreach(Module::collections() as $module)
                        @if(View::exists("{$module->getLowerName()}::user.rightBar"))
                            @include("{$module->getLowerName()}::user.rightBar")
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
