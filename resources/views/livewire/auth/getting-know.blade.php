<div>
    <select class="form-control" id="gettingknow" wire:model.change="selectedGettingKnow" >
        <option selected value="NULL" >انتخاب کنید</option>
        @foreach($gettingknow as $item)
            <option value="{{$item->id}}"  >{{$item->category}}</option>
        @endforeach
    </select>

    @if(!is_null($this->gettingknowChild) )
        @if($this->gettingknowChild->count()>0)
                <select class="form-control" id="gettingknowChild" name="gettingknow" wire:model.debounce.500ms="selectedGettingKnowChild">
                <option selected value="NULL" >انتخاب کنید</option>
                @foreach($gettingknowChild as $item)
                    <option value="{{$item->id}}" >{{$item->category}}</option>
                @endforeach
            </select>
        @endif
    @endif

    @if(!is_null($selectedGettingKnowChild))

        @if($selectedGettingKnowChild==16)
                <label for="tel" class="text-md-right mt-3">{{ __('تلفن همراه معرف:') }}<span class="alert alert-danger">*</span></label>

                    <input
                        id="introduced"
                        name="introduced"
                        type="text"
                        dir="ltr"
                        class="form-control @error('introduced') is-invalid @enderror"
                        required
                        autocomplete="introduced"
                        wire:model.lazy="introduced"
                    />


                    @error('introduced')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    @if(!is_null($introducedUser))
                        <p>معرف شما: {{$introducedUser->fname}}</p>
                    @else
                        <p class="text-danger">معرف یافت نشد</p>
                    @endif

            <link href="/plugins/intl-tel-input-19.2.16/css/intlTelInput.css" rel="stylesheet" />

            <script src="/dashboard/plugins/jquery/jquery.min.js"></script>
            <script src="/plugins/intl-tel-input-19.2.16/js/intlTelInput.js"></script>
            <script>
                // document.addEventListener("livewire:load", () => {
                //     const input2 = document.querySelector("#introduced");
                //
                //     var intl2=intlTelInput(input, {
                //         formatOnDisplay:false,
                //         separateDialCode:true,
                //         autoPlaceholder:'off',
                //         preferredCountries:["ir", "gb"],
                //         excludeCountries:["il"],
                //
                //     });
                //
                //
                //
                //     input2.addEventListener('countrychange',function()
                //     {
                //         document.querySelector("#introduced").value=intl2.getNumber();
                //     });
                //
                //     $('#introduced').change(function()
                //     {
                //         document.querySelector("#introduced").value=intl2.getNumber();
                //     });
                // });
            </script>

            <script>

                // window.addEventListener('plugins_introduced',()=>
                // {
                //     let head = document.getElementsByTagName('HEAD')[0];
                //     let link4 = document.createElement('link');
                //     link4.rel = 'stylesheet';
                //     link4.href = '/plugins/intl-tel-input-19.2.16/css/intlTelInput.css';
                //     head.appendChild(link4);
                //
                //     let link3 = document.createElement('script');
                //     link3.src='/plugins/intl-tel-input-19.2.16/js/intlTelInput.js';
                //     head.appendChild(link3);
                //     const input2 = document.querySelector("#introduced");
                //     var intl2=intlTelInput(input2, {
                //         formatOnDisplay:false,
                //         separateDialCode:true,
                //         autoPlaceholder:'off',
                //         preferredCountries:["ir", "gb"],
                //         excludeCountries:["il"],
                //         utilsScript: "/plugins/intl-tel-input-19.2.16/js/utils.js"
                //     });
                //     input2.addEventListener('countrychange',function()
                //     {
                //         document.querySelector("#introduced").value=intl2.getNumber();
                //     });
                //
                //     $('#introduced').change(function()
                //     {
                //         document.querySelector("#introduced").value=intl2.getNumber();
                //     })
                // });

            </script>
        @endif
    @endif



</div>


