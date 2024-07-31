@component("masterView::admin.master.index")
    <div class="col-12 col-md-6 mx-auto card">
        <div class="card-header">
            <h5 class="card-title">اضافه کردن کاربر از طریق اکسل</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.user.excelStore')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>فایل اکسل</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('excel') is-invalid @enderror" id="excel" name="excel" />
                        <label class="custom-file-label" for="excel">Choose file</label>
                    </div>
                </div>
                @error('excel')
                    <p class="text text-danger" >
                         <strong>{{ $message }}</strong>
                    </p>
                @enderror
                <button type="submit" class="btn btn-primary">ارسال فایل</button>
            </form>
        </div>
    </div>
@endcomponent
