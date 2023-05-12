@section('content')
    @extends('main')

    <div class="container">
        <br>
        <h1>Lista wizyt</h1>
        <hr>

        <form method="POST" action="{{ route('visits.search') }}">
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
                <th scope="col">Numer</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina</th>
                <th scope="col">Lekarz</th>
                <th scope="col">Pacjent</th>
                <th style="text-align: center"><b>
                        <form method="GET" action="{{ route('visits.create') }}">
                            <button type="submit" class="btn btn-primary btn-block">Dodaj</button>
                        </form>
                    </b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($visits->sortByDesc('id') as $visit)
                <tr>
                    <td>{{ $visit->id }}</td>
                    <td>{{ $visit->visit_date->format('Y-m-d') }}</td>
                    <td>{{ $visit->visit_time->format('H:i:s') }}</td>
                    <td>{{ $visit->doctor->name }} {{ $visit->doctor->surname }}</td>
                    <td>{{ $visit->patient->name }} {{ $visit->patient->surname }}</td>
                    <td align="center">
                        <form method="GET" action="{{ route('visits.edit', $visit->id) }}" style="display: inline;">
                            <button type="submit" class="btn btn-warning btn-block">Edytuj</button>
                        </form>
                        <form method="POST" action="{{ route('visits.destroy', $visit->id) }}" style="display: inline;" onsubmit="return confirm('Czy na pewno chcesz usunąć?')">@csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
