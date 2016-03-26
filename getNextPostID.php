<?php
	// include './getNextPostID.php'
	$sqlSelect = "SELECT postID FROM Posts ORDER BY postID DESC LIMIT 1";
	$selectResult = mysqli_query( $myConn , $sqlSelect );
	if( !$selectResult )
	{
		echo "error: " . mysqli_error( $selectResult );
	}
	else
	{
		// $nextPostID = $row
		while( $row = mysqli_fetch_assoc( $selectResult ) )
		{
			// $row["postID"] = $
			$nextPostID = $row["postID"];
		}
		$nextPostID = $nextPostID + 1;
		// echo "nextPostID = " . $nextPostID ;
		// echo "<br />";

	}

?>