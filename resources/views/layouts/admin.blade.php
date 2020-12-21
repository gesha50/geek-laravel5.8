<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/app.css') }}" />
    <title>@yield('title')</title>
</head>
<body>
<div>
    <div class="container-fluid jumbotron content">
        @include('inc.header')
        <div class="main">
            <div class="row">
                <div class="col-md-2">
                    @include('inc.aside')
                </div>
                <div class="col-md-10 text-center">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                @include('admin._partials.flash-message')
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
</body>
</html>
