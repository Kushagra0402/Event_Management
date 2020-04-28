<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Task 4b</title>
		<style>
			th, td { border: 1px solid black; }
		</style>
	</head>
 	<body>
 		<?php
			include 'config.php';

			$pdo = new PDO("mysql:dbname=${config['dbname']};host=${config['host']};charset=utf8", $config['name'], $config['pass']);

			$eventid = $_GET['eventid'];
			$flag = 0;
			$sql = 'SELECT staff, GROUP_CONCAT(equipment) AS eq FROM dbprj_talks t, dbprj_equipments e WHERE t.event_id = :eid AND e.event_id = :eid';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':eid' => $eventid]);
			$result = $stmt->fetchAll();

			if ($result[0]['staff'] == null) {
				$flag = 1;

				$sql = 'SELECT musicians, GROUP_CONCAT(instrument) AS instruments FROM dbprj_concerts c, dbprj_instruments i WHERE c.event_id = :eid AND i.event_id = :eid';
				$stmt = $pdo->prepare($sql);
				$stmt->execute([':eid' => $eventid]);
				$result2 = $stmt->fetchAll();

				if ($result2[0]['musicians'] == null) {
					$flag = 2;
				}
			}

	    $sql_artist = 'SELECT name, gender FROM dbprj_artists WHERE artist_id IN (SELECT artist_id FROM dbprj_performs WHERE event_id = :eid) ORDER BY name ASC, artist_id ASC';
			$stmt_artist = $pdo->prepare($sql_artist);
			$stmt_artist->execute([':eid' => $eventid]);
			$result_artist = $stmt_artist->fetchAll();

			$sql_event = 'SELECT name, venue, schedule FROM dbprj_events WHERE event_id = :eid';
			$stmt_event = $pdo->prepare($sql_event);
			$stmt_event->execute([':eid' => $eventid]);
			$result_event = $stmt_event->fetchAll();

			echo htmlspecialchars('Name: ' . $result_event[0]['name']) . '<br>';
			echo htmlspecialchars('Venue: ' . $result_event[0]['venue']) . '<br>';
			echo htmlspecialchars('Schedule: ' . $result_event[0]['schedule']) . '<br>';

			if ($flag == 0) {
				foreach ($result as $row) {
					echo htmlspecialchars('Staff: ' . $row['staff']) . '<br>';
					echo htmlspecialchars('Equipment: ' . $row['eq']) . '<br>';
					//echo htmlspecialchars($row['schedule']).'<br>';
				}
			} else if ($flag == 1) {
				foreach ($result2 as $row) {
					echo htmlspecialchars('Musicians: ' . $row['musicians']) . '<br>';
					echo htmlspecialchars('Instruments: ' . $row['instruments']) . '<br>';
					//echo htmlspecialchars($row['schedule']).'<br>';
				}
			}

			echo '<table>';
			echo '<tr><th>Artist name</th><th>Gender</th></tr>';
			foreach ($result_artist as $artist) {
				echo '<tr>';
				echo '<td>' . $artist['name'] . '</td>';
				echo '<td>' . $artist['gender'] . '</td>';
				echo '</tr>';
			}
			echo '</table>';

			if ($flag == 1) {
				$sql_parts = 'SELECT * FROM dbprj_concerts_parts WHERE event_id = :eid ORDER BY part_no ASC';
				$stmt_parts = $pdo->prepare($sql_parts);
				$stmt_parts->execute([':eid' => $eventid]);
				$result_parts = $stmt_parts->fetchAll();

				if ($result_parts[0]['part_no'] != null) {
					echo '<table>';
					echo '<tr><th>Part number</th><th>Person in charge</th></tr>';
					foreach ($result_parts as $part) {
						echo '<tr>';
						echo '<td>' . $part['part_no'] . '</td>';
						echo '<td>' . $part['pic'] . '</td>';
						echo '</tr>';
					}
					echo '</table>';
				}
			}
		?>
 	</body>
</html>
