
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Automobilių savininkai</div>
                    <div class="card-body">
                        <a href="{{ route("owners.create") }}" class="btn btn-success float-end">Pridėti automobilio savininką:</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Mašinos markė</th>
                                <th></th>
                                <th>Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                            <tr>
                                <td>{{ $owner->name }}</td>
                                <td>{{ $owner->surname }}</td>
                                <td>
                                    @foreach( $owner->cars as $car)
                                    {{ $car->brand }} {{ $car->model }} <br>
                                    @endforeach
                                </td>
                                <td></td>
                                <td style="width: 200px;">
                                    <a href="{{ route("owners.update", $owner->id) }}" class="btn btn-success">Redaguoti</a>
                                    <a href="{{ route("owners.delete", $owner->id) }}" class="btn btn-danger">Ištrinti</a>
                                </td>
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
