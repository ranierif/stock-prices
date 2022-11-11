<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', array('title'=> ' :: '.config('app.name')))
</head>

<body>
    <main>
        <div class="container py-4">
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
        </div>
    </main>

    @yield('styles')
    @yield('scripts_default')
    @yield('scripts')
</body>
</html>
