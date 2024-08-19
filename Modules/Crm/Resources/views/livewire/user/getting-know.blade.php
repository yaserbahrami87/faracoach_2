<div>
    <form method="post" wire:submit.prevent="updateProfile"  >
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="card card-user " id="infogettingKnow">
            <div class="card-body bg-secondary-light">
                <div class="row">
                    <div class="col-md-6 px-1">
                        <div class="form-group">
                            <label>نحوه آشنایی</label>

                            <select id="gettingknow_parent" class="form-control p-0  {{!is_null(Auth::user()->gettingknow?'is-valid':'')}}" name="gettingKnow_parent" wire:model.lazy="gettingKnow_parent">
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($gettingKnow_parents as $item)
                                    <option value="{{$item->id}}" {{$gettingKnow_parent==$item->id?'selected':''}} >{{$item->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                        <div class="col-md-6 px-1" id="gettingknow2" >
                            <div class="form-group">
                                <label>عنوان آشنایی</label>
                                <select id="gettingknow" class="form-control p-0 {{!is_null(Auth::user()->gettingknow?'is-valid':'')}} " name="gettingknow" wire:model.lazy="gettingknow">
                                    <option selected disabled>انتخاب کنید</option>
                                    @foreach($gettingknows as $item)
                                        <option value="{{$item->id}}"  {{Auth::user()->gettingknow==$item->id?'selected': '' }}>{{$item->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    <div class="col-md-6 px-1">
                        <div class="form-group">
                            <label>معرف</label>
                            <input type="hidden" class="form-control" value="{{!is_null($introduced_info)?$introduced_info->id:''}}"  id="introduced" name="introduced" />
                            <input dir="ltr"  type="text" class="form-control {{!is_null(Auth::user()->introduced?'is-valid':'')}}"  {{!is_null(Auth::user()->introduced)?'disabled':''}} value="{{!is_null($introduced_info)?$introduced_info->tel:'' }}" wire:model.lazy="introduced"  id="introduced_profile" />
                            <small class="text-muted">لطفا تلفن همراه معرف خود را وارد کنید</small>
                            <p>{{(!is_null($introduced_info)? "معرف شما: ".$introduced_info->fname.' '.$introduced_info->lname:'معرف یافت نشد')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mb-5">بروزرسانی</button>

    </form>
</div>
