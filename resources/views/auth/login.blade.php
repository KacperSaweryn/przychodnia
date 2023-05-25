<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia - Login</title>
    <script>
        function valid() {
            if (document.forms[0].login.value === '' || document.forms[0].password.value === '') {
                alert('Uzupełnij wszystkie pola')
                return false;
            }
            return true;
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body style="height: 100vh;">
<div class="d-flex flex-column justify-content-center align-items-center h-100 mainContainer">
    <h1 class="mb-4">Zaloguj się do przychodni</h1>
    <form method="POST" class="" action="{{ route('login') }}" onsubmit="return valid()" style="width: 300px;">
        @csrf
        <div class="form-outline mb-4">
            <input type="text" name="login" id="form2Example1" class="form-control" required/>
            <label class="form-label" for="form2Example1">Login</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" class="form-control" required/>
            <label class="form-label" for="form2Example2">Hasło</label>
        </div>

        @if ($errors->has('login'))
            <div class="alert alert-danger">{{ $errors->first('login') }}</div>
        @endif

        <div class="row mb-4">
            <button type="submit" class="btn btn-primary btn-block mb-4">Zaloguj</button>
            <div class="text-center">

            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
