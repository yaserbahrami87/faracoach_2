@slot('headerScript')

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endslot



<div class="col-12 col-md-6 mx-auto card">
    <div class="card-header">دسته بندی موضوعات کلینیک</div>
    <div class="card-body table-responsive">
        <button class="btn btn-outline-primary btn-sm"
                wire:click="$emit('openModal', 'clinic::admin.clinic-category-insert',{{ json_encode(['user' => Auth::user()->id]) }})">
            افزودن دسته<i class="nav-icon material-icons">add</i>
        </button>
        <table class="table">
            <tr>
                <th>نام</th>
                <th>دسته بندی</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            @foreach($categories->whereNotNull('parent_id') as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->parent_category->title}}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm"
                                data-toggle="tooltip" data-placement="top" title="ویرایش"
                                wire:key="{{$category->id}}"
                                wire:click="$emit('openModal', 'clinic::admin.clinic-category-edit',{{ json_encode(['ClinicCategory' =>$category->id]) }})">
                            <i class="nav-icon material-icons">edit</i>
                        </button>
                    </td>
                    <td>
                        <form method="post" action="{{route('admin.clinic.category.destroy',['ClinicCategory'=>$category->id])}}" onsubmit="return window.confirm('آیا از حذف دسته بندی اطمینان دارید؟')" >
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-sm btn-danger">
                                <i class="nav-icon material-icons">delete</i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </table>
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
