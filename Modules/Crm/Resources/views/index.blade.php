@extends('masterView::admin.master.index');

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('crm.name') !!}
    </p>
@endsection
