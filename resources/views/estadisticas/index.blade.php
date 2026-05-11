<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .titulo {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin: 30px 0;
            color: #1f2937;
        }

        /* 📦 Cards estilo profesional */
        .card-est {
            background: white;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 25px;
            text-align: center;
            transition: 0.3s;
        }

        .card-est:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .numero {
            font-size: 40px;
            font-weight: bold;
            color: #2563eb;
        }

        .texto {
            color: #6b7280;
            font-size: 16px;
            margin-top: 5px;
        }

        .icono {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
     

    <div class="mb-3">
       <a href="{{ route('dashboard') }}" class="btn btn-dark">
             🏠 Menú Principal
        </a>
        </div>

    <div class="titulo">
        📊 Panel de Estadísticas
    </div>

    <div class="row g-4">

        <!-- Total puntos -->
        <div class="col-md-3">
            <div class="card-est">
                <div class="icono">🏆</div>
                <div class="texto">Total Puntos</div>
                <div class="numero">{{ $totalPuntos }}</div>
            </div>
        </div>

        <!-- Victorias local -->
        <div class="col-md-3">
            <div class="card-est">
                <div class="icono">🏠</div>
                <div class="texto">Victorias Local</div>
                <div class="numero">{{ $victoriasLocal }}</div>
            </div>
        </div>

        <!-- Victorias visitante -->
        <div class="col-md-3">
            <div class="card-est">
                <div class="icono">🚀</div>
                <div class="texto">Victorias Visitante</div>
                <div class="numero">{{ $victoriasVisitante }}</div>
            </div>
        </div>

        <!-- Empates -->
        <div class="col-md-3">
            <div class="card-est">
                <div class="icono">🤝</div>
                <div class="texto">Empates</div>
                <div class="numero">{{ $empates }}</div>
            </div>
        </div>

    </div>

</div>

</body>
</html>