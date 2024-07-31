@component("masterView::admin.master.index")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                داشبورد
            </div>
            <div class="card-body">
                <div class="row">
                    <livewire:crm::admin.index />

                </div>
            </div>
        </div>
    </div>

    @slot('footerScript')
        <script>

        </script>
    @endslot
@endcomponent
