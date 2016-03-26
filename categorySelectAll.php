<?php
	include './connect.php';
	include './header.php';
	session_start();
	
	$sqlSelect = "SELECT catID , catName , catDescription FROM Categories";

	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		echo "error - try again";
	}

	else
	{
		echo "<table border = '1'>
				<tr>
					<th>Category</th>
					<th>Last Topic</th>
				</tr>";
				while( $row = $result->fetch_assoc() )
				{
					echo "<tr>";
						echo "<td class = 'leftpart'>";
							echo "<h3><a href = './topicsMain.php?id'>" . $row["catName"]
								 	. "</a></h3>" . $row["catDescription"];
						echo "</td>";
					echo "</tr>";
				}
		echo "</table>";
	}
	include './footer.php';

?>
