<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon material-icons">video_label</i>
        <p>
            رویدادها
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.event.all')}}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>همه رویدادها</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.event.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>اضافه کردن رویداد</p>
            </a>
        </li>

    </ul>
</li>