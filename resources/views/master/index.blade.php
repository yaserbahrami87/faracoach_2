<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>

    <title>Fara Coach</title>
    <link rel="icon" type="image/x-icon" href="Favicon.svg">
    <script defer src="/js/main.js"></script><link href="/css/main.css" rel="stylesheet"></head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <livewire:styles />

    @if(isset($headerScript))
        {{  $headerScript }}
    @endif

<body dir="rtl">

@include('master.navbarTop')

<!-- MAIN
================================================== -->
<main class="mb-5">
    @include('sweet::alert')
    @include('sweetalert::alert')

    <div class="container">
        @if($errors->any())
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <!-- WELCOME
    ================================================== -->
    {{$slot}}
</main>

@include('master.footer')


<script src="{{mix('/js/app.js')}}"></script>
<livewire:scripts />
@if(isset($footerScript))
    {{  $footerScript }}
@endif
</body>
</html>
