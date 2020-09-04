@extends('layouts.landing')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
        <form method="#" action="#">
            <div class="card card-login card-hidden">
                <div class="card-header text-center" data-background-color="rose">
                    <img style="width: 20%;" src="{{asset('material/img/kaltara.png')}}"/>
                    <h4 class="card-title">Penilaian Angka Kredit</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    <div class="card-content">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <div class="form-group label-floating">
                                <label class="control-label">NIP</label>
                                    <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" required autocomplete="identity" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock_outline</i>
                            </span>
                            <div class="form-group label-floating">
                                <label class="control-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> -->
                               
                    </div>
                    <div class="footer text-center">
                        <button type="submit"  class="btn btn-rose btn-round">LOGIN<div class="ripple-container"></div></button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection