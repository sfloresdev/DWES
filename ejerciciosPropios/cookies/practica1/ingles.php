<?php
// Simple Formula 1 themed page - English
$teams = [
    'Mercedes',
    'Red Bull Racing',
    'Ferrari',
    'McLaren',
    'Aston Martin'
];
$topDrivers = [
    ['name' => 'Max Verstappen', 'team' => 'Red Bull Racing', 'points' => 416],
    ['name' => 'Lewis Hamilton', 'team' => 'Mercedes', 'points' => 258],
    ['name' => 'Charles Leclerc', 'team' => 'Ferrari', 'points' => 200]
];
$today = date('F j, Y');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>F1 Fan Page (EN)</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0b1221;
            color: #e6eef8;
            margin: 0
        }

        header {
            background: #d90429;
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

        ul.teams {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            list-style: none;
            padding: 0
        }

        ul.teams li {
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
        <h1>Formula 1 — Fan Page</h1>
        <div>Today: <?php echo $today; ?></div>
    </header>
    <main class="container">
        <section class="card">
            <h2>Top Drivers</h2>
            <ol>
                <?php foreach ($topDrivers as $d): ?>
                    <li><?php echo htmlspecialchars($d['name']); ?> — <?php echo htmlspecialchars($d['team']); ?> (<?php echo $d['points']; ?> pts)</li>
                <?php endforeach; ?>
            </ol>
        </section>


        <section class="card">
            <h2>Teams</h2>
            <ul class="teams">
                <?php foreach ($teams as $t): ?>
                    <li><?php echo htmlspecialchars($t); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>


        <section class="card">
            <h2>Quick Poll</h2>
            <p>Who's your pick for the next race winner?</p>
            <form method="get" action="index_en.php">
                <select name="pick">
                    <?php foreach ($topDrivers as $d): ?>
                        <option value="<?php echo htmlspecialchars($d['name']); ?>"><?php echo htmlspecialchars($d['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Vote</button>
            </form>
            <?php if (!empty($_GET['pick'])): ?>
                <p>Thanks — you voted for: <strong><?php echo htmlspecialchars($_GET['pick']); ?></strong></p>
            <?php endif; ?>
        </section>


        <footer>
            <p>Simple demo page — static data for illustration only.</p>
        </footer>
    </main>
</body>

</html>