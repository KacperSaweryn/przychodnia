@extends('main')

@section('content')

    <div class="container mt-5">
        <h1>Wizyta</h1>
        <hr>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><strong>Data wizyty:</strong></label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $visit->visit_date }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><strong>Godzina wizyty:</strong></label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $visit->visit_time }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><strong>Lekarz:</strong></label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $visit->doctor->name }} {{ $visit->doctor->surname }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><strong>Pacjent:</strong></label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $visit->patient->name }} {{ $visit->patient->surname }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><strong>Opis:</strong></label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $visit->description }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('visits.edit', $visit) }}" class="btn btn-warning btn-block">Edytuj</a>
            </div>
            <div class="col-sm-12 mt-3">
                <form action="{{ route('visits.destroy', $visit) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę wizytę?')">Usuń</button>
                </form>
            </div>
            <div class="col-sm-12 mt-3">
                <a href="{{ route('visits.index') }}" class="btn btn-primary">Powrót</a>
            </div>
        </div>
    </div>

@endsection
