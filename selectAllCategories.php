<?php
	$sqlSelect = "SELECT catID , catName , catDescription FROM Categories";

	// $sqlSelectTopics = "SELECT topicID FROM"

	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		die( "FAILED: " . mysqli_error() );
	}

	echo "<table border = '1'>
			<tr>
				<th>Category</th>
				<th>Last Topic</th>
			</tr>";
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				echo "<tr>";
					echo "<td class = 'leftpart'>";
						echo "<h3><a href = './topicsMain.php?id=" . $row["catID"] . "'>" . $row["catName"] . 
								"</a></h3>" . $row["catDescription"];

						// echo "<h3><a href = './categoriesMain.php?id'>" . $row["catName"] . "</a></h3>" . $row["catDescription"];
					echo "</td>";
					echo "<td class = 'rightpart'>";
						echo "<a href = './topicsMain.php?id='>Topic Subject</a>";
					echo "</td>";
				echo "</tr>";
			}
	echo "</table>";







?>
