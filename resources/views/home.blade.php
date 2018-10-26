@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content">
                @if (sizeof($casinos) == 0)
                    <h2>No Casinos have been added</h2>
                @else
                    <form role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <div class="col-md-4">
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') }}" placeholder="Enter your latitude">

                                @if ($errors->has('latitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude') }}" placeholder="Enter your longitude">

                                @if ($errors->has('longitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/" class="btn btn-primary">Reset</a>
                            </div>
                        </div>
                    </form>

                    @if (isset($latitude))
                        <p>This is the closest casino to the following location: {{ $latitude }},{{ $longitude }}</p>
                    @endif

                    <div id="map" style="width:100%;height:400px;"></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScripts')
    <script>
        var pins = [];
        var pin;
        @foreach($casinos as $casino)
        pin = ["{{ $casino->name }}","{{ $casino->latitude }}","{{ $casino->longitude }}","{{ $casino->opening_times }}"];
        pins.push(pin);
        @endforeach
    </script>
    <script type="text/javascript" src="/js/map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
@endsection