
<div>
    <div class="card">
        <div class="card-header bg-primary text-light">{{ __('ورود به سایت') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" wire:submit.prevent="login" >
                {{csrf_field()}}
                <div class="form-group row mb-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی:') }}</label>

                    <div class="col-md-6">
                        <div class="input-group ">

                            <input id="tel" type="text" dir="ltr" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus wire:model.lazy="email" />
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" dir="ltr">
                                    <span class="text-danger">(+98)0</span>
                                </span>
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <small class="text-muted">تلفن همراه خود را بدون صفر وارد کنید</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور:') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" wire:model.lazy="password" />

                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ورود به سایت') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center" >
                    <div class="spinner-border" role="status" wire:loading wire:target="login">
                        <span class="sr-only" ></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
