<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-graduation-cap"></i>
        <p>
            آموزش
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.users.all')}}" class="nav-link ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>دوره ها
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.course.all')}}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>همه دوره ها</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.create')}}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد دوره</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.users.all')}}" class="nav-link ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>دسته بندی دوره ها
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.course.coursetypes')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>همه دسته بندی ها</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.coursetype.create')}}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد دسته بندی</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>اساتید
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.course.teachers')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>همه اساتید</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.teacher.create')}}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد استاد</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>دانشجوها
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.course.students')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>دانشجویان</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.student.create')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>افزودن دانشجو</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>آزمون ها
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.course.exams')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>همه آزمون ها</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.exam.create')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>افزودن آزمون</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.course.exam.takes')}}" class="nav-link ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>جواب آزمون ها</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
