<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Task 5c</title>
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
        $id = $_POST['id'];
        $artist = $_POST['artist'];

        $sql = 'INSERT INTO dbprj_performs (artist_id, event_id) VALUES (:artist, :id)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':id' => $id , 'artist' => $artist]);
        $row = $stmt->fetchAll();

        echo htmlspecialchars('Artist added');
    ?>

    </body>
</html>
