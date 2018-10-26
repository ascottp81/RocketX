@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Casinos</div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/admin/casinos') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="itemid" id="itemid" value="{{ $id }}">

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? $casino->name ?? '' }}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="latitude" class="col-sm-4 col-form-label text-md-right">Latitude</label>

                                <div class="col-md-6">
                                    <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') ?? $casino->latitude ?? '' }}">

                                    @if ($errors->has('latitude'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('latitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="longitude" class="col-sm-4 col-form-label text-md-right">Longitude</label>

                                <div class="col-md-6">
                                    <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude') ?? $casino->longitude ?? '' }}">

                                    @if ($errors->has('longitude'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('longitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opening_times" class="col-sm-4 col-form-label text-md-right">Opening Times</label>

                                <div class="col-md-6">
                                    <input id="opening_times" type="text" class="form-control{{ $errors->has('opening_times') ? ' is-invalid' : '' }}" name="opening_times" value="{{ old('opening_times') ?? $casino->opening_times ?? '' }}">

                                    @if ($errors->has('opening_times'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('opening_times') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-primary" href="/admin/casinos">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
