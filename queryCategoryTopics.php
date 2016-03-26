 <?php
	$sqlSelect = "SELECT topicID , topicSubject , topicCategory , topicDate FROM Topics
				  WHERE topicCategory = " . filter_var( $_GET["id"] , FILTER_VALIDATE_INT );

	$result = mysqli_query( $myConn , $sqlSelect );

?>
