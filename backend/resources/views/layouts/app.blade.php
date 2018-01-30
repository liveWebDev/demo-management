<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ config('app.url') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ config('app.url') }}/css/font-awesome.css" rel="stylesheet">
    <link href="{{ config('app.url') }}/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ config('app.url') }}/css/style.css" rel="stylesheet">
    <link href="{{ config('app.url') }}/js/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.url') }}/js/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/vendor/chosen/chosen.min.css">
    @yield('css')
</head>
<body>
<div class="wrapper">
    @include("layouts.header")
    <div class="main-body">
        @yield("content")
    </div>
    <div class="clearfix"></div>
    @include("layouts.footer")
</div>

@include("layouts.svg")

<script src="{{ config('app.url') }}/js/jquery.min.js"></script>
<script src="{{ config('app.url') }}/js/moment.js"></script>
<script src="{{ config('app.url') }}/js/bootstrap.js"></script>
<script src="{{ config('app.url') }}/js/jquery-ui.js"></script>
<script src="{{ config('app.url') }}/js/owl.carousel.js"></script>
<script src="{{ config('app.url') }}/js/slurve.js"></script>
<script src="{{ config('app.url') }}/js/plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="{{ config('app.url') }}/js/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ config('app.url') }}/vendor/chosen/chosen.jquery.min.js"></script>
@if(Session::has('success'))
    <script type="text/javascript">
        swal("{!! Session::get('title') !!}", "{!! Session::get('success') !!}", "success");
    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        swal("{!! Session::get('title') !!}", "{!! Session::get('error') !!}", "error");
    </script>
@endif
<script src="{{ config('app.url') }}/js/front.js"></script>
<script src="{{ config('app.url') }}/js/ajax.js"></script>
@yield("js")
<script src="{{ config('app.url') }}/js/custom.js"></script>
<!-- let people make clients -->
<passport-clients></passport-clients>
<!-- list of clients people have authorized to access our account -->
<passport-authorized-clients></passport-authorized-clients>
<!-- make it simple to generate a token right in the UI to play with -->
<passport-personal-access-tokens></passport-personal-access-tokens>
</body>
</html>