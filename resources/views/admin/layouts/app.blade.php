<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.layouts.head')
    <title>Eventful | Administrator Dashboard</title>
    @yield('styles')
</head>

<body>
    <div>
        @include('shared.layouts.navbar')
        @include('admin.layouts.sidebar')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('shared.layouts.footer')
    </div>

    @include('shared.layouts.scripts')
    @yield('scripts')
</body>

</html>
