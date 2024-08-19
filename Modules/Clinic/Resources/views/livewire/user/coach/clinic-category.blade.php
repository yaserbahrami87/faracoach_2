<div class="col-12">
    <div class="card">
        <div class="card-header">افزودن خدمت</div>
        <div class="card-header">
            <form wire:submit.prevent="register">
                <div class="row">

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="services">سرویس ها<span class="text-danger">*</span></label>
                            <select class="form-control " id="services" wire:model.change="service" name="service[]" >
                                <option selected value="NULL">انتخاب کنید</option>
                                @foreach($clinicCategories->whereNull('parent_id') as $service)
                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                            @error('service')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    @if($expertises!=[])
                        @if($expertises->count()>0)
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="expertise">تخصص ها<span class="text-danger">*</span></label>
                                    <select class="form-control" id="expertise" wire:model.lazy="expertise" name="expertise[]" >
                                        <option selected value="NULL">انتخاب کنید</option>
                                        @foreach($expertises  as $expertise)
                                            <option value="{{$expertise->id}}">{{$expertise->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('expertise')
                                        <p class="text text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    @endif
                    @if($tendencies!=[])
                        @if($tendencies->count()>0)
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="tendency">گرایش ها<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tendency" wire:model.lazy="tendency" name="tendency" >
                                        <option selected value="NULL">انتخاب کنید</option>
                                        @foreach($tendencies  as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('tendency')
                                        <p class="text text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-success">ثبت خدمات</button>

                        @endif
                    @endif


                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-12 table-responsive">
    <table class="text-center table-bordered table table-striped">
        <tr  >
            <th colspan="2">
                اقدامات انجام شده
            </th>
        </tr>
        <tr>
            <th>اقدام</th>
            <th>وضعیت</th>
        </tr>

        @foreach($requestPortals as $item)
            <tr>
                <td>{{$item->description}}</td>
                <td>{{$item->status()}}</td>
            </tr>
        @endforeach

    </table>
</div>



<script>
    window.addEventListener('plugins',()=>
    {
        let head = document.getElementsByTagName('HEAD')[0];

        let link3 = document.createElement('link');
        link3.rel = 'stylesheet';
        link3.href = '/dashboard/plugins/multi-select-checkboxes/jquery.multiselect.css';
        head.appendChild(link3);


        let link4 = document.createElement('script');
        link4.src = '/dashboard/plugins/multi-select-checkboxes/jquery.multiselect.js';
        head.appendChild(link4);

        $('select[multiple]').multiselect({
            columns: 2,
        });

    });
</script>

