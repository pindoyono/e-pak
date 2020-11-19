
<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
<head>
    @include('includes.head')

    <style>
        body{
                text-align: center;
            }

            h1{
            color: #396;
            font-weight: 100;
            font-size: 40px;
            }

            #clockdiv{
                font-family: sans-serif;
                color: #fff;
                display: inline-block;
                font-weight: 100;
                text-align: center;
                font-size: 30px;
            }

            #clockdiv > div{
                padding: 10px;
                border-radius: 3px;
                background: #00BF96;
                display: inline-block;
            }

            #clockdiv div > span{
                padding: 15px;
                border-radius: 3px;
                background: #00816A;
                display: inline-block;
            }

            .smalltext{
                padding-top: 5px;
                font-size: 16px;
            }
    </style>

</head>

<body >
    <div class="wrapper" id="app">
        @include('includes.sidebar')
        <div class="main-panel" >
            @include('includes.nav')
            <!-- Konten -->
            <div class="content">
            <h1>Batas Waktu Pengusulan DUPAK</h1>
                <div id="clockdiv">
                <div>
                    <span class="days"></span>
                    <div class="smalltext">Days</div>
                </div>
                <div>
                    <span class="hours"></span>
                    <div class="smalltext">Hours</div>
                </div>
                <div>
                    <span class="minutes"></span>
                    <div class="smalltext">Minutes</div>
                </div>
                <div>
                    <span class="seconds"></span>
                    <div class="smalltext">Seconds</div>
                </div>
            </div>
                @yield('content')
            </div>
            <!-- Tutup Konten -->
            @include('includes.footer')
        </div>
    </div>

</body>

@include('includes.js')
<script>
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

// var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
var deadline = new Date(Date.parse(new Date()) + 23 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>

@include('sweetalert::alert')


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
</html>