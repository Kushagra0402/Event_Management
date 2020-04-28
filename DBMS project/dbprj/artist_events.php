<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Task 2b</title>
		<style>
			th, td { border: 1px solid black; }
		</style>
	</head>
	<body>
 		<?php
			include 'config.php';

			$pdo = new PDO("mysql:dbname=${config['dbname']}; host=${config['host']}; charset=utf8", $config['name'], $config['pass']);
			$artistID = $_GET['art'];
			$sql = 'SELECT name, venue, schedule FROM dbprj_events WHERE event_id IN (SELECT event_id FROM dbprj_performs WHERE artist_id = :aid) ORDER BY schedule DESC, event_id ASC';

			$stmt = $pdo->prepare($sql);
			$stmt->execute([':aid' => $artistID]);
			$result = $stmt->fetchAll();

			if (!$result) {
				if ($stmt->errorCode() != '00000') {
					print_r($stmt->errorInfo());
				}
			}

			echo '<table>';
			echo '<tr> <th>Event name</th> <th>Venue</th> <th>Schedule</th> </tr>';
			foreach ($result as $row) {
				echo '<tr>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['venue'] . '</td>';
				echo '<td>' . $row['schedule'] . '</td>';
				echo '</tr>';
			}
			echo '</table>'
		?>

 	</body>
</html>
