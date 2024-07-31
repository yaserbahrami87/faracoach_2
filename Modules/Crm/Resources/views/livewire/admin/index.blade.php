
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">تعداد کاربرها</span>
                <span class="info-box-number">
                      {{$users->count()}}
                      <small>کاربر</small>
                    </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <!-- /.info-box -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کاربرهای پیگیری نشده</span>
                <span class="info-box-number">
                      {{$users->where('type',11)->count()}}
                      <small>کاربر</small>
                    </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">واریزی امروز</span>
                <span class="info-box-number">
                      0
                      <small>تومان</small>
                    </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کاربر جدید</span>
                <span class="info-box-number">
                      0
                      <small>تومان</small>
                    </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">ورودی امروز</span>
                <span class="info-box-number">
                      0
                      <small>نفر</small>
                    </span>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">آخرین اعضا</h3>

                    <div class="card-tools">
                        <span class="badge badge-danger">8 پیام جدید</span>
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        <li>
                            <img src="dist/img/user1-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">حسام موسوی</a>
                            <span class="users-list-date">امروز</span>
                        </li>
                        <li>
                            <img src="dist/img/user8-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">ایمان</a>
                            <span class="users-list-date">دیروز</span>
                        </li>
                        <li>
                            <img src="dist/img/user7-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">فاطمه</a>
                            <span class="users-list-date">۱۷ اسفند</span>
                        </li>
                        <li>
                            <img src="dist/img/user6-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">جان</a>
                            <span class="users-list-date">۱۴ اسفند</span>
                        </li>
                        <li>
                            <img src="dist/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">محمد</a>
                            <span class="users-list-date">۱۲ دی</span>
                        </li>
                        <li>
                            <img src="dist/img/user5-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">سارا</a>
                            <span class="users-list-date">۱۲ دی</span>
                        </li>
                        <li>
                            <img src="dist/img/user4-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">مریم</a>
                            <span class="users-list-date">۱۲ دی</span>
                        </li>
                        <li>
                            <img src="dist/img/user3-128x128.jpg" alt="User Image">
                            <a class="users-list-name mt-2" href="#">نادیا</a>
                            <span class="users-list-date">۱۱ دی</span>
                        </li>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="#">مشاهده همه کاربران</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!-- /.col -->
    </div>


