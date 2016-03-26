<?php
	$sqlSelect = "SELECT topicID , topicSubject , topicCategory FROM Topics 
				  WHERE topicID = " . filter_var( $_GET["postID"] , FILTER_VALIDATE_INT );

	$result = mysqli_query( $myConn , $sqlSelect );
	





?>
