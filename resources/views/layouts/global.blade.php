<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<!-- oncontextmenu="return false" onkeydown="return false;" onmousedown="return false; -->
<body>
    <div class="wrapper">
        @include('includes.sidebar')
        <div class="main-panel">

            @include('includes.nav')

            <!-- Konten -->
            <div class="content">
                @yield('content')
            </div>
            <!-- Tutup Konten -->

            @include('includes.footer')

        </div>
    </div>
    @include('sweetalert::alert')
</body>
@include('includes.js')

</html>