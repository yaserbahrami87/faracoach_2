<div class="card p-3 text-right" dir="rtl" >
    <div class="card-header">تعیین تکلیف جلسه</div>
    <div class="card-body">
        <form method="POST" wire:submit.prevent="save()" >
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">وضعیت جلسه:<span class="text-danger">*</span></label>
                <select class="custom-select" id="inputGroupSelect03" name="status" wire:model.lazy="status">
                    <option selected value="NULL">انتخاب کنید</option>
                    <option value="2">برگزارشد</option>
                    <option value="3">لغو توسط مراجع</option>
                    <option value="4">لغو توسط کوچ</option>
                    <option value="5">غیبت مراجع</option>
                    <option value="6">غیبت کوچ</option>
                </select>
                @error('status')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="result">گزارش / توضیحات جلسه:<span class="text-danger">*</span></label>
                <textarea class="form-control" id="result" rows="3" wire:model.lazy="result"></textarea>
                <small class="text-muted">در صورت برگزاری جلسه خلاصه ای از نتیجه جلسه را وارد کنید و در صورت عدم برگزاری دلیل آن را وارد کنید</small>
                @error('result')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button class="btn btn-outline-success" type="submit">ذخیره</button>
        </form>
    </div>

</div>
