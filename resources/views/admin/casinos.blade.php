@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Casinos</div>

                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <div class="col-md-8">
                                <a class="btn btn-primary" href="/admin/casinos/add">Add Casino</a>
                            </div>
                        </div>
                        <table class="col-12">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Times</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($casinoList as $casino)
                                <tr>
                                    <td>{{ $casino->id }}</td>
                                    <td>{{ $casino->name }}</td>
                                    <td>{{ $casino->latitude }}</td>
                                    <td>{{ $casino->longitude }}&nbsp;&nbsp;&nbsp;</td>
                                    <td>{{ $casino->opening_times }}</td>
                                    <td><a href="/admin/casinos/{{ $casino->id }}/edit">Edit</a></td>
                                    <td><a href="/admin/casinos/{{ $casino->id }}/delete">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
