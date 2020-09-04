<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
    
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

</body>
@include('includes.js')
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
</html>