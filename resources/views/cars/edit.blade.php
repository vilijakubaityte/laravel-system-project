@extends('layouts.app')
@section('content')

    <div class="container">
        <button class="btn btn-secondary mb-3 d-flex justify-content-center mt-2 col-1" onclick="history.go(-1);">Back</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Redaguoti</div>
                    <div class="card-body">
                        <form method="post" action="{{ route("cars.update",$car->id) }}">
                            @csrf
                            @method("put")
                            <div class="mb-3">
                                <label class="form-label">Registracijos numeris</label>
                                <input type="text" class="form-control" name="reg_number" value="{{$car->reg_number}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Markė</label>
                                <input type="text" class="form-control" name="brand" value="{{$car->brand}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis</label>
                                <input type="text" class="form-control" name="model" value="{{$car->model}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Savininko ID</label>
                                <select name="owners_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ ($owner->id==$car->owners_id)?'selected':'' }}>{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Išsaugoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
