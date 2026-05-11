<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Liga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
            font-family: 'Segoe UI', sans-serif;
        }

        /* 🏀 HEADER */
        .header {
            background: linear-gradient(90deg, #111827, #1d4ed8);
            color: white;
            padding: 25px;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            border-radius: 0 0 20px 20px;
        }

        /* 📊 CARDS */
        .card-stat {
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            color: white;
            animation: fadeIn 0.6s ease-in-out;
        }

        .card-stat:hover {
            transform: translateY(-8px) scale(1.03);
        }

        .card-puntos {
            background: linear-gradient(135deg, #2563eb, #60a5fa);
        }

        .card-partidos {
            background: linear-gradient(135deg, #16a34a, #4ade80);
        }

        .card-promedio {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        .num {
            font-size: 36px;
            font-weight: bold;
        }

        .label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* 📋 SECCIONES */
        .section {
            margin-top: 40px;
        }

        .card-table {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            animation: fadeIn 0.7s ease-in-out;
        }

        /* 📋 TABLAS */
        .table thead {
            background: #1e3a8a;
            color: white;
        }

        .table tbody tr {
            transition: 0.2s;
        }

        .table tbody tr:hover {
            background: #e0f2fe;
            transform: scale(1.01);
        }

        /* 🏀 BADGE */
        .badge-score {
            background: #00000056;
            padding: 6px 12px;
            border-radius: 10px;
            color: white;
            font-weight: bold;
        }

        /* ➕ BOTÓN */
        .btn-create {
            background: #0c0323;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-create:hover {
            background: #15803d;
            color: white;
        }

        /* ✨ ANIMACIÓN */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>

<!--  HEADER -->
<div class="header">
    🏀 LIGA DE BÁSQUET PROFESIONAL - CUSCO
</div>

<div class="container mt-4">

    <div class="mb-3">
       <a href="{{ route('dashboard') }}" class="btn btn-dark">
             🏠 Menú Principal
        </a>
        </a>
        </div>

    <!-- 📊 CARDS -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card-stat card-puntos">
                <div class="label">Total Puntos</div>
                <div class="num">{{ $totalPuntos }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-stat card-partidos">
                <div class="label">Partidos Jugados</div>
                <div class="num">{{ $totalPartidos }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-stat card-promedio">
                <div class="label">Promedio</div>
                <div class="num">{{ $promedioPuntos }}</div>
            </div>
        </div>

    </div>

    <!-- ➕ BOTÓN -->
    <div class="text-end mt-4">
        <a href="{{ route('partidos.create') }}" class="btn-create">
            ➕ Crear Partido
        </a>
    </div>

    <!-- 📋 PARTIDOS -->
    <div class="section card-table">
        <h4 class="text-center mb-3">📋 Partidos</h4>

        <table class="table text-center align-middle">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Marcador</th>
                    <th>Visitante</th>
                </tr>
            </thead>

            <tbody>
                @foreach($partidos as $partido)
                <tr>
                    <td>{{ $partido->fecha }}</td>
                    <td><b>{{ $partido->equipoLocal->nombre }}</b></td>

                                        @php
                        $local = $partido->puntos_local;
                        $visitante = $partido->puntos_visitante;
                    @endphp

                    <td>
                        <span class="badge-score">
                            @if($local > $visitante)
                                <span style="color:#16a34a; font-weight:bold;">
                                    {{ $local }}
                                </span>
                            @elseif($local < $visitante)
                                <span style="color:#dc2626; font-weight:bold;">
                                    {{ $local }}
                                </span>
                            @else
                                <span style="color:#6b7280; font-weight:bold;">
                                    {{ $local }}
                                </span>
                            @endif

                            -

                            @if($visitante > $local)
                                <span style="color:#16a34a; font-weight:bold;">
                                    {{ $visitante }}
                                </span>
                            @elseif($visitante < $local)
                                <span style="color:#dc2626; font-weight:bold;">
                                    {{ $visitante }}
                                </span>
                            @else
                                <span style="color:#6b7280; font-weight:bold;">
                                    {{ $visitante }}
                                </span>
                            @endif
                        </span>
                    </td>

                    <td><b>{{ $partido->equipoVisitante->nombre }}</b></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 🏆 TABLA POSICIONES -->
    <div class="section card-table">
        <h4 class="text-center mb-3">🏆 Tabla de Posiciones</h4>

        <table class="table text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PE</th>
                    <th>PP</th>
                    <th>PF</th>
                    <th>PC</th>
                    <th>DP</th>
                    <th>Puntos</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tabla as $i => $t)
                <tr>
                    <td><b>{{ $i + 1 }}</b></td>
                    <td><b>{{ $t['equipo'] }}</b></td>
                    <td>{{ $t['pj'] }}</td>
                    <td>{{ $t['pg'] }}</td>
                    <td>{{ $t['pe'] }}</td>
                    <td>{{ $t['pp'] }}</td>
                    <td>{{ $t['pf'] }}</td>
                    <td>{{ $t['pc'] }}</td>
                    <td>{{ $t['dp'] }}</td>
                    <td><span class="badge-score">{{ $t['puntos'] }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</body>
</html>