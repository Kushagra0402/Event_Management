<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 <title>Task 5a</title>
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

  $sql = 'SELECT e.event_id, name, venue, schedule, COUNT(artist_id) AS performers FROM dbprj_events e, dbprj_performs p WHERE e.event_id = p.event_id GROUP BY e.event_id ORDER BY schedule DESC, e.event_id ASC';
  $result = $pdo->query($sql);
      echo '<table>';
      echo '<tr><th>Event name</th><th>Venue</th><th>Schedule</th><th>Performers</th><th>Add artist</th></tr>';
      foreach($result as $row){
	echo '<tr>';
	//$name = htmlspecialchars($row['name']);
	//$eid = htmlspecialchars($row['event_id']);
	echo '<td>';
	echo htmlspecialchars($row['name']);
	//echo '<a href="view_event.php?eventid='.$eid.'">'.$name . '</a>';
	echo '</td>';
	echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
	echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
	echo '<td>' . htmlspecialchars($row['performers']) . '</td>';
	echo '<td>';
	echo '<form action = "add_artist.php" method = "get">';
	echo '<input type = "hidden" name = "id"' . 'value = "' . htmlspecialchars($row['event_id']) . '">';
	echo '<input type = "submit" value = "Add artist">';
	echo '</form>';
	echo '</td>';
	echo '</tr>';
      }
      echo '</table>';
 ?>
 </body>
</html>
