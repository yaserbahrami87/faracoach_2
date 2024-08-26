<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>
            کاربرها
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.users.all')}}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>همه کاربرها</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.insert')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>اضافه کردن کاربر</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.excelCreate')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>اضافه کردن از طریق اکسل</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{route('admin.setting.all')}}" class="nav-link">
        <i class="nav-icon material-icons">settings</i>
        <p>
            تنظیمات سایت
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
</li>
