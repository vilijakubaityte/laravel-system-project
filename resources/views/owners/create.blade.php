@extends('layouts.app')
@section('content')

    <div class="container">
        <button class="btn btn-secondary mb-3 d-flex justify-content-center mt-2 col-1" onclick="history.go(-1);">Back</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Automobilio savininkas</div>
                    <div class="card-body">

                        @if ($errors->any())
{{--                            <div class="alert alert-danger">--}}
{{--                            <ul>--}}
                                @foreach($errors->all() as $error)
{{--                                <li>{{$error}}</li>--}}
                                @endforeach
{{--                            </ul>--}}
{{--                            </div>--}}
                        @endif

                        <form method="post" action="{{ route("owners.store") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                                @error ('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{old('surname')}}">
                                @error ('surname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
