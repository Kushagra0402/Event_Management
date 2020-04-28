<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Task 2a</title>
        <style>
            th, td { border: 1px solid black; }
        </style>
    </head>

    <body>
        <?php
            include 'config.php';

            $pdo = new PDO("mysql:dbname=${config['dbname']}; host=${config['host']}; charset=utf8", $config['name'], $config['pass']);
            $sql = 'SELECT DISTINCT p.artist_id, name, gender FROM dbprj_artists a, dbprj_performs p where a.artist_id=p.artist_id ORDER BY name, artist_id ASC';
            $result = $pdo->query($sql);
            echo '<table>';
            echo '<tr>';
            echo '<th>Artist name</th>';
            echo '<th>Gender</th>';
            echo '</tr>';

            foreach ($result as $row) {
                echo '<tr>';
                //echo htmlspecialchars($row['name']);
                $name = htmlspecialchars($row['name']);
                //echo htmlspecialchars($row['artist_id']);
                $aid = htmlspecialchars($row['artist_id']);

                echo '<td>';
                echo '<a href="artist_events.php?art=' . $aid . '">' . $name . '</a>';
                echo '</td>';
                echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';

        ?>
    </body>
</html>
