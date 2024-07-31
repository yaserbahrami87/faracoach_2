<div class="col-12 col-md-9 mx-auto">
    <div class="card">
        <div class="card-header">
            ثبت نام کاربر جدید
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}"  wire:submit.prevent="register">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام:') }}<span class="text-danger">*</span> </label>

                    <div class="col-md-6">
                        <input id="fname"
                               type="text"
                               class="form-control @error('fname') is-invalid @enderror"
                               value="{{ old('fname') }}"
                               name="fname"
                               autocomplete="fname"
                               autofocus
                               wire:model.lazy="fname"
                        />

                        @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <input id="lname"
                               type="text"
                               class="form-control @error('lname') is-invalid @enderror"
                               name="lname"
                               value="{{ old('name') }}"
                               autocomplete="lname"
                               autofocus
                               wire:model.lazy="lname"
                        />

                        @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sex1" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="radio"
                                   name="sex"
                                   id="sex1"
                                   value="1"
                                   wire:model.lazy="sex"
                            />
                            <label class="form-check-label" for="sex1">مرد</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="radio"
                                   name="sex"
                                   id="sex2"
                                   value="0"
                                   wire:model.lazy="sex"
                            />
                            <label class="form-check-label" for="sex2">زن</label>
                        </div>

                        @error('sex')
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی:') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" wire:model.debounce.1000ms="email" />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('تلفن همراه:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input id="tel" type="text" dir="ltr" class="form-control @error('tel') is-invalid @enderror" name="tel"  required  autofocus wire:model.lazy="tel" />
                            <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <span class="text-danger">0</span>
                    </span>
                            </div>
                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <small class="text-muted">تلفن همراه خود را بدون صفر وارد کنید</small>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="gettingknow" class="col-md-4 col-form-label text-md-right">{{ __('نحوه آشنایی با فراکوچ:') }}</label>
                    <div class="col-md-6">

                        <livewire:auth.getting-know />
                    </div>

                </div>

                <div class="form-group row">
                    <label for="type1" class="col-md-4 col-form-label text-md-right">متقاضی: <span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="type1" name="types" class="custom-control-input"  value="1" wire:model.lazy="type">
                            <label class="custom-control-label" for="type1" >دوره های آموزشی</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="type2" name="types" class="custom-control-input" value="30" wire:model.lazy="type" >
                            <label class="custom-control-label" for="type2" >جلسه کوچینگ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="type3" name="types" class="custom-control-input" value="-1" wire:model.lazy="type" >
                            <label class="custom-control-label" for="type3" >مارکتینگ</label>
                        </div>

                        @error('type')
                            <span class="text text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور:') }} <span class="text-danger">*</span> </label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" wire:model.lazy="password" readonly >
                        <small>رمز پیش فرض: 1234</small>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار رمز عبور:') }} <span class="text-danger">*</span> </label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" wire:model.lazy="password_confirmation" readonly>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <label for="sendSMS" class="col-md-2 col-form-label text-md-right  text-dark">ارسال پیامک</label>
                    <div class="col-md-10 ">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sms" id="sendsms0" value="0" wire:model.change="send_sms">
                            <label class="form-check-label  text-dark" for="sendsms0">
                                ارسال نشود
                            </label>
                        </div>


                        @foreach($sms as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sms" id="sendsms{{$item->id}}" value="{{trim($item->value)}}" wire:model.change="send_sms" @if($send_sms==$item->value) checked @endif >
                                <label class="form-check-label  text-dark" for="sendsms{{$item->id}}">{!!$item->value!!}</label>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ثبت نام') }}
                        </button>
                    </div>
                </div>
            </form>


            <link href="/plugins/intl-tel-input-19.2.16/css/intlTelInput.css" rel="stylesheet" />

            <script src="/dashboard/plugins/jquery/jquery.min.js"></script>
            <script src="/plugins/intl-tel-input-19.2.16/js/intlTelInput.js"></script>
        </div>
    </div>
</div>
