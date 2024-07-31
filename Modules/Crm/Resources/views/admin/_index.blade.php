@component("masterView::admin.master.index")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                داشبورد
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>

    @slot('footerScript')
        <script>
            alert('TEST');
        </script>
    @endslot
@endcomponent
