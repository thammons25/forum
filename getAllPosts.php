<?php
	while( $row = mysqli_fetch_assoc( $result ) )
	{
		echo "<tr>";
			echo "<td class = 'rightpart'>";
				echo "<h3>" . $row["postBy"] . "</h3>";
			echo "</td>";
			echo "<td class = 'leftpart'>";
				echo $row["postContent"];
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
