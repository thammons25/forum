<?php
	while( $row = mysqli_fetch_assoc( $result ) )
	{
		echo "<tr>";
			echo "<td class = 'leftpart'>";
				echo "<h3><a href = './postsMain.php?postID=" . $row["topicID"] . "'>" .
						$row["topicSubject"] . "</a></h3>";
			echo "</td>";
			// echo 
			echo "<td class = 'rightpart'>";
				// echo "hello world";
				echo date( "m-d-Y" , strtotime( $row["topicDate"] ) );
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

?>
