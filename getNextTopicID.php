<?php
	$selectTopic = "SELECT topicID FROM Topics ORDER BY topicID DESC LIMIT 1";
	$selectResult = mysqli_query( $myConn , $selectTopic );
	while( $row = mysqli_fetch_assoc( $selectResult ) )
	{
		$topicID = $row["topicID"];
	}
	$topicID = $topicID+1;







?>
