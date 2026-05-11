<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Posiciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .titulo {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin: 20px;
        }

        table {
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">

    <div class="titulo">🏆 Tabla de Posiciones</div>

    <table class="table table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th>Equipo</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DG</th>
                <th>Puntos</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tabla as $t)
            <tr>
                <td>{{ $t['equipo'] }}</td>
                <td>{{ $t['pj'] }}</td>
                <td>{{ $t['pg'] }}</td>
                <td>{{ $t['pe'] }}</td>
                <td>{{ $t['pp'] }}</td>
                <td>{{ $t['gf'] }}</td>
                <td>{{ $t['gc'] }}</td>
                <td>{{ $t['dg'] }}</td>
                <td><b>{{ $t['puntos'] }}</b></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>