<div class="mx-auto col-12 col-md-6">
    <div class="card">
        <div class="card-header">اضافه کردن شرکت کننده به  {{$event->event}}</div>
        <div class="card-body">
            <div class="form-group">
                <label for="q">نام یا نام خانوادگی یا نلفن کاربر را وارد کنید:</label>
                <input type="text" class="form-control" id="q" name="q" wire:model.lazy="q" >
                @error('q')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            @if($users!=[])
                @if($users->count()>0)
                    <form method="post" wire:submit.prevent="addparticipant">
                        <div class="form-group">
                            <label for="user">نتیجه جستجو:</label>
                            <select class="form-control" id="user" name="user" wire:model="user">
                                <option selected>انتخاب نمایید</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->lname?$user->fname.' '.$user->lname:$user->tel}}</option>
                                @endforeach
                            </select>
                            @error('user')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_fa">تاریخ ثبت نام</label>
                            <input type="text" class="form-control dateInput" id="date_fa" name="date_fa" wire:model.lazy="date_fa" />
                            <small class="text-muted">تاریخ نمونه: 1402/04/21</small>
                            @error('date_fa')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_fa">ساعت ثبت نام</label>
                            <input type="text" class="form-control time_fa" id="time_fa" name="time_fa" wire:model.lazy="time_fa" />
                            <small class="text-muted">ساعت نمونه: 21:50</small>

                            @error('time_fa')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button class="btn btn-success"> اضافه کردن</button>
                    </form>
                @else
                    <div class="alert alert-warning">کاربری یافت نشد</div>
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
