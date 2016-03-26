<?php
	$sqlSelect = "SELECT catID , catName , catDescription FROM Categories 
				  WHERE catID = " . filter_var( $_GET["id"] , FILTER_VALIDATE_INT );

	$result = mysqli_query( $myConn , $sqlSelect );
?>
