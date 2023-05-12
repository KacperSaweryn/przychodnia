@extends('main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <h1>Edytuj Wizytę</h1>
        <hr>

        <form method="POST" action="{{ route('visits.update', $visit->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="visit_date" class="col-sm-2 col-form-label"><strong>Data wizyty</strong></label>
                <div class="col-sm-10">
                    <label for="visit_date">Poprzednia wartość: {{ $visit->visit_date }}</label>
                    <input type="date" value="{{ $visit->visit_date }}"  class="form-control" id="visit_date" name="visit_date" placeholder="Data wizyty" required style="margin-bottom: 10px; width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="visit_time" class="col-sm-2 col-form-label"><strong>Godzina wizyty</strong></label>
                <div class="col-sm-10">
                    <label for="visit_date">Poprzednia wartość: {{ $visit->visit_time }}</label>
                    <input type="time" value="{{ $visit->visit_time }}"  class="form-control" id="visit_time" name="visit_time" placeholder="Godzina wizyty" required style="margin-bottom: 10px; width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="doctor_id" class="col-sm-2 col-form-label"><strong>Lekarz</strong></label>
                <div class="col-sm-10">
                    <select class="form-select" style="width: 25%" name="doctor_id">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $visit->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }} {{ $doctor->surname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="patient_id" class="col-sm-2 col-form-label"><strong>Pacjent</strong></label>
                <div class="col-sm-10">
                    <select class="form-select" style="width: 25%" name="patient_id">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $visit->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }} {{ $patient->surname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label"><strong>Opis</strong></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" placeholder="Opis" style="margin-bottom: 10px;width: 25%">{{ $visit->description }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="Zapisz" class="btn btn-primary" style="width:100px">Zapisz</button>
                </div>
            </div>
        </form>

@endsection
