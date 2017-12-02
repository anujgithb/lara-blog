<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    @include('layouts._head')
    @yield('other_css')
    </head>
<body>
    <div id="app">
        @include('layouts._nav')
        @include('layouts._message')
        
        @yield('content')

        @include('layouts._footer')
    </div>

    @include('layouts._scripts')
    @yield('other_js')
</body>
</html>
