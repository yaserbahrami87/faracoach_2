<div class="p-3">
    <div class="card  card-primary">
        <div class="card-header">ویرایش دسته {{$category->title}}</div>

        <div class="card-body">
            <form method="post" wire:submit.prevent="update">
                <div class="form-row">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >نام دسته بندی</span>
                            </div>
                            <input type="text" class="form-control" placeholder="نام دسته بندی" wire:model.lazy="category.title" />
                            @error('category.title')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <select class="custom-select" id="parent" wire:model.lazy="category.parent_id" >
                                <option selected value="NULL">انتخاب کنید</option>
                                @foreach($parents as $parent)
                                    <option value="{{$parent->id}}" {{$parent->id==$category->parent_id?'selected':'' }}  >{{$parent->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category.parent_id')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>توضیحات:<span class="text text-danger">*</span></label>
                            <textarea class="form-control" id="description" rows="3" wire:model.lazy="category.description"></textarea>
                            @error('category.description')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm">افزودن</button>
                </div>
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
    <script src="/dashboard/plugins/ckeditor4/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });
    </script>
@endslot
