@component('masterView::admin.master.index')
    @slot('headerScript')
        <link rel="stylesheet" href="/dashboard/plugins/datatables/dataTables.bootstrap4.css">

    @endslot
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                همه کاربرها
            </div>
            <div class="card-body" >
                <livewire:crm::admin.users.users-all :users="$users" />
            </div>
        </div>
    </div>

    @slot('footerScript')
        <script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.js"></script>
        <script>
            $("#example1").DataTable();

        </script>


    @endslot
@endcomponent



