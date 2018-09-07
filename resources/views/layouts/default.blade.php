<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    @include('includes.sidebar')
    <div id="content">
        @include('includes.breadcrumbs')
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
</body>
</html>