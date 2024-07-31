@slot('headerScript')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                <th></th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>تعداد رویداد</th>
                <th></th>
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
                    <td>{{$organizer->user->fname}}</td>
                    <td>{{$organizer->user->lname}}</td>
                    <td>

                    </td>
                    <td class="p-1">
                       <button type="button" class="btn btn-danger" wire:click="destroy({{$organizer->id}})" onclick="confirm('آیا از حذف برگزار کننده اطمینان دارید؟') || event.stopImmediatePropagation()"> غیر فعال کردن</button>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
