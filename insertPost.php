<?php
	$sqlPrep = $myConn->prepare( "INSERT INTO Posts( postContent , postTopic , postBy )
								  VALUES( ? , ? , ? )" );

	$sqlPrep->bind_param( "sii" , $newContent , $newTopic , $newBy );

	$newContent = filter_var( $_POST["postContent"] , FILTER_SANITIZE_STRING );
	$newTopic = filter_var( $myPostTopic , FILTER_VALIDATE_INT );
	$newBy = filter_var( $_SESSION["userID"] , FILTER_VALIDATE_INT );



	// $sqlPrep->execute();
	// $sqlPrep->close();

	// if( ($sqlPrep->execute() ) == true )
	// {
	// 	$sqlCleanup = "DELETE FROM Posts WHERE postContent = " . filter_var( " " , FILTER_SANITIZE_STRING );
	// 	echo "<br />";
	// 	echo $sqlCleanup;
	// 	echo "<br />";
	// 	$result = mysqli_query( $myConn , $sqlCleanup );
	// 	// if( !$result )
	// 	// {
	// 	// 	echo "ERROR(3): " . mysqli_error( $myConn );
	// 	// }
	// }
	$sqlPrep->execute();

	$sqlPrep->close();

?>
