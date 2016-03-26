<?php
	$sqlCleanup = "DELETE FROM Posts WHERE postContent = ' ' ";
	$result = mysqli_query( $myConn , $sqlCleanup );
	if( !$result )
	{
		echo "issue ... " . mysqli_error( $myConn );
	}
?>
