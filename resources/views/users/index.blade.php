@section('content')
    @extends('main')
@can('admin')
    <div class="container">
        <br>
        <h1>Lista użytkowników</h1>
        <hr>

        <form method="POST" action="{{ route('users.search') }}">
            @csrf
            <div class="form-group">
                <label for="search" style="margin-bottom: 10px;width: 25%">Szukaj:</label>
                <input type="text" name="search" id="search" style="margin-bottom: 10px;width: 25%" class="form-control" placeholder="Wyszukaj...">
            </div>

            <button type="submit" class="btn btn-primary mb-2">Szukaj</button>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Typ</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Login</th>
                <th style="text-align: center"><b>
                        <form method="GET" action="{{ route('users.create') }}">
                            <button type="submit" class="btn btn-primary btn-block">Dodaj</button>
                        </form>
                    </b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->types->type }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->login }}</td>
                    <td align="center">
                        <form method="GET" action="{{ route('users.edit', $user->id) }}" style="display: inline;">
                            <button type="submit" class="btn btn-warning btn-block">Edytuj</button>
                        </form>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;" onsubmit="return confirm('Czy na pewno chcesz usunąć?')">@csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endcan
@endsection
