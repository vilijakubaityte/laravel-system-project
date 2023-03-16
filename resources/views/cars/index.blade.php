@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Automobiliai</div>
                    <div class="card-body">
                        <div class="float-end d-flex flex-column gap-2">
                        <a href="{{ route("cars.create") }}" class="btn btn-success float-end">Pridėti naują automobilį</a>
                            <form class="mt-2" method="post" action="{{ route("cars.forget") }}">
                                @csrf
                                <button class="btn btn-secondary">Išvalyti paiešką</button>
                            </form>
                        </div>
                        <form method="post" action="{{ route('cars.search') }}">
                            @csrf
                            <div class="mb-3 col-md-6 my-4">
                                <label class="form-label">Automobilio paieška</label>
                                <input class="form-control" type="text" name="search">
                            </div>
                            <button class="btn btn-success">Paieška</button>

                        </form>
                        <form method="post" action="{{ route('cars.ownerName') }}" >
                            @csrf
                            <div class="mb-3 col-md-6 my-4">
                            <label for="form-label">Automobilio savininkas</label>
                            <select class="form-select" name="ownerName">
                                <option value=""></option>
                                @foreach($owners as $owner)
                                    <option value="{{ $owner->id }}"  >{{ $owner->name }} {{ $owner->surname }}</option>
                                @endforeach
                            </select>
                            </div>
                            <button class="btn btn-success my-2">Paieška pagal savininką</button>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Registracijos numeris</th>
                                <th>Markė</th>
                                <th>Modelis</th>
                                <th>Savininkas</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->reg_number}}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->owners->name }} {{ $car->owners->surname }}</td>
                                    <td style="width: 150px;">
                                        <a href="{{ route("cars.edit", $car->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route("cars.destroy", $car->id) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
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
