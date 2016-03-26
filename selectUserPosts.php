<?php
	// include './connect.php';
	$sqlSelect = "SELECT postContent FROM Posts WHERE postBy = " . filter_var( $_SESSION["userID"] , FILTER_VALIDATE_INT);

	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		die( "failed: " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result) > 0 )
	{
		$userPosts = array();
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			array_push( $userPosts , $row["postContent"] );
			// echo $row["postContent"] . "<br />";
		}
	}
	// echo count( $userPosts );


?>
