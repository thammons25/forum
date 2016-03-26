<?php
	echo "<table border = '1'>";
		echo "<tr>";
			echo "<th>Topic Subject</th>";
			echo "<th>Topic Category</th>";
	while( $row = mysqli_fetch_assoc( $result ) )
	{
		echo "<tr>";
			echo "<td class = 'leftpart'>";
				echo $row["topicSubject"];
			echo "</td>";
			echo "<td class = 'topicCategory'>";
				echo $row["topicCategory"];
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

?>
