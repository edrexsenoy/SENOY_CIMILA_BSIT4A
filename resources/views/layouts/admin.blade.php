<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!--* Preload critical resources *-->
    <link rel="preload" href="{{ asset('admin-assets/css/styles.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" as="style">
    <!--* Load CSS immediately to prevent FOUC *-->
    <link href="{{ asset('admin-assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <!--* Prevent FOUC with critical styles inline if needed *-->

</head>

<body class="sb-nav-fixed">
    @include('layouts.partials.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>

            @include('layouts.partials.footer')

            <!--* Scripts *-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="{{ asset('admin-assets/js/datatables-simple-demo.js') }}"></script>
            <!--* Load FontAwesome asynchronously *-->
            <script>
                (function() {
                    var script = document.createElement('script');
                    script.src = 'https://use.fontawesome.com/releases/v6.3.0/js/all.js';
                    script.crossOrigin = 'anonymous';
                    document.head.appendChild(script);
                })();
            </script>
</body>

</html>