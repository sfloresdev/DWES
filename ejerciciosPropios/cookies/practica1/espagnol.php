<?php
// Página simple temática de Fórmula 1 - Español
$equipos = [
    'Mercedes',
    'Red Bull Racing',
    'Ferrari',
    'McLaren',
    'Aston Martin'
];
$pilotos = [
    ['nombre' => 'Max Verstappen', 'equipo' => 'Red Bull Racing', 'puntos' => 416],
    ['nombre' => 'Lewis Hamilton', 'equipo' => 'Mercedes', 'puntos' => 258],
    ['nombre' => 'Charles Leclerc', 'equipo' => 'Ferrari', 'puntos' => 200]
];
$hoy = date('j \d\e F, Y');
setlocale(LC_TIME, 'es_ES.UTF-8');
$hoy = strftime('%e de %B de %Y');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Página Fan F1 (ES)</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0b1221;
            color: #f2efe9;
            margin: 0
        }

        header {
            background: #c8102e;
            padding: 18px 24px;
            color: white
        }

        .container {
            padding: 20px
        }

        .card {
            background: #0f1724;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px
        }

        ul.equipos {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            list-style: none;
            padding: 0
        }

        ul.equipos li {
            background: #14203a;
            padding: 8px 10px;
            border-radius: 6px
        }

        footer {
            font-size: 12px;
            opacity: 0.8;
            margin-top: 20px
        }
    </style>
</head>

<body>
    <header>
        <h1>Fórmula 1 — Página de fans</h1>
        <div>Hoy: <?php echo htmlspecialchars($hoy); ?></div>
    </header>
    <main class="container">
        <section class="card">
            <h2>Mejores Pilotos</h2>