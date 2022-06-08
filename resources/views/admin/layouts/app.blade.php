<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventful | Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('asset/css/main.css?v=1628755089081') }}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</head>

<body>
    <div>
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('admin.layouts.footer')
    </div>

    <script type="text/javascript" src="{{ asset('asset/js/main.min.js?v=1628755089081') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ asset('asset/js/chart.sample.min.js') }}"></script>
</body>

</html>
