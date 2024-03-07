<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>Reporte de Chirps</title>
</head>

<body>
    <h1 class="text-center">Listado de Chirps</h1>
    <br><br>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">MESSAGE</th>
                <th scope="col">NOMBRE USUARIO</th>
                <th scope="col">FECHA DE CREACION</th>
                <th scope="col">FECHA DE ACTUALIZACION</th>
            </tr>
        </thead>
        <br>
        @foreach ($chirps as $chirp)
            <tbody class="table-group-divider">
                <tr>
                    <td scope="row">{{ $chirp->id }}</td>
                    <td>{{ $chirp->message }}</td>
                    <td>{{ $chirp->user->name }}</td>
                    <td>{{ $chirp->created_at->format('j M Y, g:i a') }}</td>
                    <td>{{ $chirp->updated_at->format('j M Y, g:i a') }}</td>
                </tr>
            </tbody>
        @endforeach

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
