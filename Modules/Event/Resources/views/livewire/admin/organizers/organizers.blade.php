@slot('headerScript')
    <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />


    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endslot
<div class="col-12 table-responsive card">
    <div class="card-header">لیست برگزارکننده های دوره</div>

        <div class="row card-body" >
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label>افزودن برکزار کننده:</label>
                    <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" wire:model.lazy="q" />
                    <small class="text-muted">لطفا نام یا نام خانوادگی یا تلفن همراه فرد مورد نظر را وارد کنید</small>
                    @error('q')
                        <span class="text-danger" >
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @if(!is_null($result))
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="result">نتیجه جستجو:</label>
                        @if($result->count()==0)
                            <div class="alert alert-warning">کاربری با این مشخصات یافت نشد</div>
                        @else
                            <form method="post" wire:submit.prevent="insert">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="submit">افزودن</button>
                                    </div>
                                    <select class="form-control" id="result" wire:model.debounce.500="organizer">
                                        <option value="NULL" selected>انتخاب کنید</option>
                                        @foreach($result as $item)
                                            <option value="{{$item->id}}">{{(!is_null($item->lname)?$item->fname.' '.$item->lname:$item->tel)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('organizer')
                                    <p class="text-danger" >
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </form>
                        @endif
                    </div>

                </div>
            @endif

        </div>

        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
            <tr class="text-center">
                <th>ردیف</th>
                <th>عکس</th>
                <th>نام و نام خانوادگی</th>
                <th>تعداد رویداد</th>
                <th>فعال/غیرفعال</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($organizers as $organizer)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if(is_null($organizer->user->personal_image))
                            <img src="/images/users/default-avatar.png" width="50px" class="rounded-circle" />
                        @else
                            <img src="{{'/images/'.$organizer->user->personal_image}}" width="50px" class="rounded-circle" />
                        @endif
                    </td>
                    <td>{{$organizer->user->fname.' '.$organizer->user->lname}}</td>
                    <td>

                    </td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" title="{{$organizer->id}}"  wire:change="changeStatus('{{$organizer->id}}')" {{($organizer->status==1)?'checked':''}}  />
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td class="p-1">
                       <button type="button" class="btn btn-danger" wire:click="destroy({{$organizer->id}})" onclick="confirm('آیا از حذف برگزار کننده اطمینان دارید؟') || event.stopImmediatePropagation()"> حذف برگزارکننده</button>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
@slot('footerScript')
    <script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>
@endslot
