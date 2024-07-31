@extends('master.index')

@section('headerScript')

    <style>
        .alert
        {
            padding: 0px;
            background-color: transparent;
            border: none;
        }

        .form-group
        {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('ثبت نام') }}</div>

                <div class="card-body">
                    <livewire:auth.register />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

