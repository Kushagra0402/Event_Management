<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<style>
			th, td { border: 1px solid black; }
		</style>
		<title> Task 3b </title>
	</head>
  	<body>
    	<?php
			include 'config.php';

			$pdo = new PDO("mysql:dbname=${config['dbname']}; host=${config['host']}; charset=utf8", $config['name'], $config['pass']);
			$event = '%' . $_POST['event'] . '%';
			$sql = 'SELECT name, venue, schedule FROM dbprj_events WHERE name LIKE :event OR venue LIKE :event ORDER BY name, event_id ASC';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':event' => $event]);
			$result = $stmt->fetchAll();

			echo '<table>';
			echo '<tr><th>Event name</th><th>Venue</th><th>Schedule</th></tr>';
			foreach ($result as $row) {
				echo '<tr>';
				echo '<td>' . htmlspecialchars($row['name']) . '</td>';
				echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
				echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
				echo '</tr>';
			}
			echo '</table>';
		?>
  	</body>
</html>
