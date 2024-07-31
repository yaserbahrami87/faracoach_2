@component("masterView::admin.master.index")

    <div class="col-12 col-md-8 mx-auto card">
        <div class="card-body">

            <div class="card-header">
                <h5 class="card-title">ایجاد آزمون </h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.course.exam.store')}}" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exam">نام آزمون: <span class="text text-danger">*</span></label>
                        <input type="text" class="form-control" id="exam" name="exam" value="{{old('exam')}}"/>
                        @error('exam')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات:</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="certificate_id">نوع دوره: </label>
                        <select id="certificate_id" class="form-control p-0 @error('certificate_id') is-invalid @enderror" name="certificate_id">
                            <option selected disabled>انتخاب کنید</option>
                            @foreach($certificates as $item)
                                <option value="{{$item->id}}" @if($item->id==old('certificate_id')) selected @endif >{{$item->certificate}}</option>
                            @endforeach
                        </select>
                        @error('certificate_id')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass">نمره قبولی:<span class="text text-danger">*</span></label>
                        <input type="number" class="form-control @error('pass') is-invalid @enderror" id="pass" name="pass" value="{{old('pass')}}" />
                        @error('pass')
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

    @slot('footerScript')
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();
                    window.open('/file-manager/fm-button', 'fm', 'width=800,height=800');
                });
            });

            // set file link
            function fmSetLink($url) {
                document.getElementById('image_label').value = $url;
            }
        </script>


        <script src="/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js"></script>
        <script>
            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('.time_fa').simpleMask({
                'mask': ['##:##','##:##']
            });
        </script>

        <script src="/dashboard/plugins/ckeditor4/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'ckeditor',
                {
                    language:'fa',
                    filebrowserImageBrowseUrl: '/file-manager/ckeditor'
                });
        </script>
        <script>
            window.addEventListener('plugins',()=>
            {
                let head = document.getElementsByTagName('HEAD')[0];

                let link = document.createElement('script');
                link.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
                head.appendChild(link);

                $('.dateInput').simpleMask({
                    'mask': ['####/##/##','####/##/##']
                });

                $('.time_fa').simpleMask({
                    'mask': ['##:##','##:##']
                })
            });
        </script>
    @endslot

@endcomponent
