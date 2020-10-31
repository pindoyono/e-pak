@extends('layouts.global')
@section('title')
    Dashboard
@endsection
@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="rose" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Website Views</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="green" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="blue" data-header-animation="true">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Completed Tasks</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="fas fa-chalkboard-teacher"></i>

                </div>
                <div class="card-content">
                    <p class="category">Jumlah Guru</p>
                        <h3 class="card-title"> {{  jumlah('guru') }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <!-- <i class="material-icons text-danger">warning</i> -->
                        <!-- <a href="#pablo">Get More Space...</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah Penilai</p>
                    <h3 class="card-title">{{  jumlah('penilai') }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <!-- <i class="material-icons">date_range</i> Last 24 Hours -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="fas fa-school"></i>
                </div>
                <div class="card-content">
                    <p class="category">Jumlah Sekolah</p>
                    <h3 class="card-title">{{jumlah_sekolah()}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <!-- <i class="material-icons">local_offer</i> Tracked from Google Analytics -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <!-- <i class="fa fa-twitter"></i> -->
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="card-content">
                    <p class="category">Usulan Dupak</p>
                    <h3 class="card-title">{{jumlah_usulan()}} </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <h3>Manage Listings</h3>
    <br> -->
    <!-- <div class="row">
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('material/img/card-2.jpg')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>
                        <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                    <h4 class="card-title">
                        <a href="#pablo">Cozy 5 Stars Apartment</a>
                    </h4>
                    <div class="card-description">
                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                    </div>
                </div>
                <div class="card-footer">
                    <div class="price">
                        <h4>$899/night</h4>
                    </div>
                    <div class="stats pull-right">
                        <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('material/img/card-3.jpg')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>
                        <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                    <h4 class="card-title">
                        <a href="#pablo">Office Studio</a>
                    </h4>
                    <div class="card-description">
                        The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
                    </div>
                </div>
                <div class="card-footer">
                    <div class="price">
                        <h4>$1.119/night</h4>
                    </div>
                    <div class="stats pull-right">
                        <p class="category"><i class="material-icons">place</i> London, UK</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('material/img/card-1.jpg')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>
                        <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                    <h4 class="card-title">
                        <a href="#pablo">Beautiful Castle</a>
                    </h4>
                    <div class="card-description">
                        The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
                    </div>
                </div>
                <div class="card-footer">
                    <div class="price">
                        <h4>$459/night</h4>
                    </div>
                    <div class="stats pull-right">
                        <p class="category"><i class="material-icons">place</i> Milan, Italy</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>            
@endsection

@section('js')
<script src="{{asset('material/js/demo.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>

@endsection