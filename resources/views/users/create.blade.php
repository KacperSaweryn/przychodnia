@extends('main')

@section('content')
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <br>
        </div>
    @endif
    @can('admin')
    <br>
    <div class='container'>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="type_id" class="col-sm-2 col-form-label"><strong>Typ</strong></label>
                <div class="col-sm-10">
                    <select class='form-select' style="width: 25%" name='type_id'>
                        <option value='1'>Admin</option>
                        <option value='2'>Lekarz</option>
                        <option value='3'>Pacjent</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label"><strong>Imię</strong></label>
                <div class="col-sm-10">
                    <input type="text" value="" class="form-control" id="name" name="name" placeholder="Imię" required
                           style="margin-bottom: 10px; width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="surname" class="col-sm-2 col-form-label"><strong>Nazwisko</strong></label>
                <div class="col-sm-10">
                    <input type='text' value='' class="form-control" id="surname" name="surname" placeholder="Nazwisko"
                           required style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="login" class="col-sm-2 col-form-label"><strong>Login</strong></label>
                <div class="col-sm-10">
                    <input type="text" value="" class="form-control" id="login" name="login" placeholder="Login"
                           required style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label"><strong>Hasło</strong></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Hasło"
                           style="margin-bottom: 10px;width: 25%">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="Zapisz" class="btn btn-primary" style="width:100px">Zapisz</button>
                </div>
            </div>
            </table>
        </form>
    </div>
    @endcan
@endsection
