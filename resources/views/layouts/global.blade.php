
<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
<head>
    @include('includes.head')

</head>

<body >
    <div class="wrapper" id="app">
        @include('includes.sidebar')
        <div class="main-panel" >
            @include('includes.nav')
            <!-- Konten -->
            <div class="content">
            
                @yield('content')
            </div>
            <!-- Tutup Konten -->
            @include('includes.footer')
        </div>
    </div>

</body>

@include('includes.js')


@include('sweetalert::alert')


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
</html>