<div class="col-md-6 mx-auto col-12">
    <div class="card">
        <div class="card-header">ویرایش استاد</div>
        <div class="card-body">
            <form method="post" wire:submit.prevent="update">
                <div class="form-group">
                    <label for="exampleInputEmail1">تلفن یا نام خانوادگی را وارد کنید</label>
                    <input type="text" class="form-control" wire:model.lazy="q">
                    @error('q')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="user_id">لیست جستجو</label>

                    <select class="form-control" id="user_id" wire:model.debounce.500="Teacher.user_id">
                        <option value="NULL" selected>انتخاب کنید</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{!is_null($user->lname)?$user->fname.' '.$user->lname:$user->tel}}</option>
                        @endforeach
                    </select>
                    @error('Teacher.user_id')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="biography">بیوگرافی استاد</label>
                    <textarea class="form-control" id="biography" rows="3" wire:model.lazy="Teacher.biography"></textarea>
                    @error('Teacher.biography')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">توضیحات</label>
                    <select class="form-control" id="status" wire:model.lazy="Teacher.status">
                        <option selected>انتخاب کنید</option>
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                    @error('Teacher.status')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <input type="submit" value="ثبت" class="btn btn-success" >
            </form>
        </div>
    </div>

</div>
