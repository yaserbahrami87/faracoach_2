<div class="mx-auto col-12 col-md-6">
    <div class="card">
        <div class="card-header">اضافه کردن دانشجو</div>
        <div class="card-body">
            <div class="form-group">
                <label for="user">جستجو کاربر:</label>
                <input id="user" type="text" class="form-control" autocomplete="off" wire:model.lazy="q"  />
                <small class="text-muted">نام یا نام خانوادگی یا تلفن کاربر را وارد کنید</small>
                @error('q')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            @if($Users!=[] )
                @if($Users->count()!=0)
                <form method="post" wire:submit.prevent="addStudent">
                    <div class="form-group">
                        <label for="student">نتیجه جستجو:</label>
                        <select class="form-control" id="student" wire:model.change="user_id">
                            <option value="NULL" selected>انتخاب کنید</option>
                            @foreach($Users as $user)
                                <option value="{{$user->id}}">{{!is_null($user->lname)?$user->fname.' '.$user->lname:$user->tel}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="courses">دوره:</label>
                        <select class="form-control" id="student" wire:model.change="course_id">
                            <option value="NULL" selected>انتخاب کنید</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->course}}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div id="insertStudent">
                        <div class="form-group">
                            <label for="date">تاریخ ثبت نام:</label>
                            <input type="text" class="form-control dateInput" id="date" name="date_fa" autocomplete="off" wire:model.lazy="date_fa"  />
                            <small class="text-muted">تاریخ نمونه: 1402/04/21</small>
                            @error('date_fa')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">وضعیت
                                <span class="text-danger text-bold">*</span>
                            </label>
                            <select class="form-control" id="status" name="status" wire:model="status">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach($student_status as $key=>$status)
                                    <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">اضافه</button>
                    </div>
                </form>
                @else
                    <div class="alert alert-warning">
                        کاربری با این مشخصات یافت نشد
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

@slot('footerScript')



    <script src="/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js"></script>
    <script>
        $('.dateInput').simpleMask({
            'mask': ['####/##/##','####/##/##']
        });

        $('.time_fa').simpleMask({
            'mask': ['##:##','##:##']
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let head = document.getElementsByTagName('HEAD')[0];
            let link = document.createElement('script');
            link.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
            head.appendChild(link);

            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('.time_fa').simpleMask({
                'mask': ['##:##','##:##']
            })

            Livewire.hook('element.updated', (el, component) => {
                let head = document.getElementsByTagName('HEAD')[0];
                let link = document.createElement('script');
                link.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
                head.appendChild(link);

                $('.dateInput').simpleMask({
                    'mask': ['####/##/##','####/##/##']
                });

                $('.time_fa').simpleMask({
                    'mask': ['##:##','##:##']
                })
            })


        });
        window.addEventListener('plugins',()=>
        {
            let head = document.getElementsByTagName('HEAD')[0];

            let link = document.createElement('script');
            link.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
            head.appendChild(link);

            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('.time_fa').simpleMask({
                'mask': ['##:##','##:##']
            })

        });
    </script>
@endslot
