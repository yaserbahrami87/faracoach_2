<div class="col-md-8 mx-auto ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن نوع دوره</h5>
        </div>
        <div class="card-body">
            <form method="post" wire:submit.prevent="register" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="type">نوع دوره</label>
                    <input type="text" class="form-control {{(is_null($type))?'is-invalid':'is-valid'}}" id="type" name="type" wire:model.lazy="type" />
                    <small>نباید تکراری باشد</small>
                    @error('type')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="shortlink">شورت لینک</label>
                    <input type="text" class="form-control {{(is_null($shortlink))?'is-invalid':'is-valid'}}" id="shortlink" name="shortlink" wire:model.lazy="shortlink" />
                    <small>نباید تکراری باشد</small>
                    @error('shortlink')
                        <p class="text text-danger" role="alert">
                           {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select id="status" class="form-control p-0 {{(is_null($status))?'is-invalid':'is-valid'}}" name="status" wire:model="status">
                        <option selected value="NULL">انتخاب کنید</option>
                        <option value="1">نمایش</option>
                        <option value="0">عدم نمایش</option>
                    </select>
                    @error('status')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">افزودن</button>
            </form>
        </div>
    </div>
</div>
