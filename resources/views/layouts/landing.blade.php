<!doctype html>
<html lang="en">


<head>
    @include('includes_landing.head')
</head>

<body>
    <!-- @include('includes_landing.nav') -->
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="{{asset('material/img/login.jpg')}}">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
                @include('includes_landing.footer')
        </div>
    </div>
</body>

@include('includes.js')
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>