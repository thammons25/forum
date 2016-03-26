<?php
	$sqlSelect = "SELECT postID , postContent , postTopic , postBy , postDate FROM Posts 
				  WHERE postTopic = " . filter_var( $_GET["postID"] , FILTER_VALIDATE_INT );

	$result = mysqli_query( $myConn , $sqlSelect );









?>
