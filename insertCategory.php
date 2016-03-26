<?php
	$sqlPrep = $myConn->prepare( "INSERT INTO Categories( catName , catDescription) 
				VALUES( ? , ? )" );
	$sqlPrep->bind_param( "ss" , $newName , $newDescription );

	$newName = filter_var( $_POST["catName"] , FILTER_SANITIZE_STRING );
	$newDescription = filter_var( $_POST["catDescription"] , FILTER_SANITIZE_STRING );

	$result = $sqlPrep->execute();
	if( !$result )
	{
		// $dummyIndicator = false;
		echo "error - " . mysqli_error( $myConn );

	}
	echo "You've successfully added category '" . $newName . "'!";
	// $dummyIndicator = true;

?>
