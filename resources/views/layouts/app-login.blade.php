<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/font-awesome.js') }}"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <br>
                    <br>
                    <div class="container">
                        @yield('main')
                    </div>
                </main>
            </div>
        </div>
        <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
