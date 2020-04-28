<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Task 5b</title>
        <style>
            th, td { border: 1px solid black; }
        </style>
    </head>
    <body>
    <?php
        include 'config.php';
    ?>
    <?php
        $pdo = new PDO("mysql:dbname=${config['dbname']};host=${config['host']};charset=utf8", $config['name'], $config['pass']);
        $id = $_GET['id'];
        $sql = 'SELECT artist_id, name FROM dbprj_artists WHERE artist_id NOT IN (SELECT artist_id FROM dbprj_performs WHERE event_id = :id) ORDER BY name, artist_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':id' => $id ]);
        $row = $stmt->fetchAll();

        echo '<form action="save_artist.php" method="POST">';
        echo '<label for="artists">Add Artist: </label>';

        echo '<select name="artist" id="artists">';
        foreach($row as $option) {
            echo '<option value="' . $option['artist_id'] . '">'
                . $option['name']
                . '</option>';
            }
        echo '</select><br>';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<input type="submit" value="Save">';
        echo '</form>';
    ?>

    </body>
</html>
