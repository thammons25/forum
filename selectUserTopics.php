<?php
	$sqlSelect = "SELECT topicSubject , topicCategory FROM Topics 
				  WHERE topicBy = " . filter_var( $_SESSION["userID"] , FILTER_VALIDATE_INT );

	$result = mysqli_query( $myConn , $sqlSelect );

?>
