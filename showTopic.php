<?php
	include './connect.php';
	include './header.php';
	if( $_SESSION["signedIn"] == false )
	{
		echo "sign the fuck in";
	}


	$sqlSelect = "SELECT topicID , topicSubject , topicBy , topicDate FROM Topics 
				  WHERE topicCategory = " . filter_var( $_GET["id"] , FILTER_VALIDATE_INT );


	$result = mysqli_query( $myConn , $sqlSelect );

	if( mysqli_num_rows( $result) == 0 )
	{
		echo "Not topics yet - <a href = './createTopic.php'>Create One Now</a>";
	}
	else
	{
		echo "<table border = '1'>
				<tr>
					<th>Topic</th>
					<th>Created At</th>
				</tr>";
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			echo "<tr>";
				echo "<td class = 'leftpart'>";
					echo "<h3><a href = './topicsMain.php?id=" . $row["topicID"] . "'>" . $row["topicSubject"] . "</a></h3>";
				echo "</td>";
				echo "<td class = 'rightpart'>";
					// echo date( "d-m-Y" , strtotime( $row["topicDate"] ) );
					echo date( "m-d-Y" , strtotime( $row["topicDate"] ) );
					// echo $row["topicDate"];
				echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	include './footer.php';








?>
