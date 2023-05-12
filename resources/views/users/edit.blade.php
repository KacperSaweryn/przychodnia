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
    @can('admin')
    <div class="container mt-5">
        <h1>Edytuj użytkownika</h1>
        <hr>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="type_id" class="col-sm-2 col-form-label"><strong>Typ</strong></label>
                <div class="col-sm-10">
                    <select class="form-select" style="width: 25%" name="type_id">
                        <option value="1" {{ $user->type_id == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->type_id == 2 ? 'selected' : '' }}>Lekarz</option>
                        <option value="3" {{ $user->type_id == 3 ? 'selected' : '' }}>Pacjent</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label"><strong>Imię</strong></label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $user->name }}"  class="form-control" id="name" name="name" placeholder="Imię" required style="margin-bottom: 10px; width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="surname" class="col-sm-2 col-form-label"><strong>Nazwisko</strong></label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $user->surname }}" class="form-control" id="surname" name="surname" placeholder="Nazwisko" required style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="login" class="col-sm-2 col-form-label"><strong>Login</strong></label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $user->login }}" class="form-control" id="login" name="login" placeholder="Login" required style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label"><strong>Hasło</strong></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="Zapisz" class="btn btn-primary" style="width:100px">Zapisz</button>
                </div>
            </div>
        </form>
    </div>
    @endcan

@endsection
