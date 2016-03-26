<?php
	$sqlPrep = $myConn->prepare( "INSERT INTO Users( userName , userPass , userEmail )
								  VALUES( ? , ? , ? )" );
	$sqlPrep->bind_param( "sss" , $newName , $newPass , $newEmail );

	$goodName = filter_var( $_POST["userName"] , FILTER_SANITIZE_STRING );
	$goodPass = md5( $_POST["userPass"] );
	$goodEmail = filter_var( $_POST["userEmail"] , FILTER_SANITIZE_EMAIL );
	if( !filter_var( $goodEmail , FILTER_VALIDATE_EMAIL ) === false )
	{
		$newEmail = $goodEmail;
	}
	else 
	{
		die( "EMAIL IS NO GOOD" );
	}
	// $goodEmail = filter_var( $_POST["userEmail"] , FILTER_SANITIZE_EMAIL );
	// $emailCheck = filter_var( $goodEmail , FILTER_VALIDATE_EMAIL );
	// if( $emailCheck == true )
	// {
	// 	die( "EMAIL IS NO GOOD" );
	// }

	$newName = $goodName;
	// $goodPass = $
	$newPass = $goodPass;
	// $newEmail = $goodEmail;
	$sqlPrep->execute();
	echo "Sucess<br />Sign in <a href = './signin.php'>HERE</a> and post";







?>








































<!-- 
	// include './connect.php';
	$sqlPrep = $myConn->prepare( "INSERT INTO Users( userName , userPass , userEmail) 
								  VALUES( ? , ? , ?)" );

	$sqlPrep->bind_param( "sss" , $uName , $pWord , $e_mail );

	$uName = $_POST['userName'];
	$pWord = $_POST['userPass'];
	$e_mail = $_POST['userEmail'];
	$sqlPrep->execute();


	// $result = mysql_query( $sql );
	$result = mysql
	if( !result)
	{
		echo "something went wrong try again";
	}
	else 
	{
		echo "<p> success! </p>";
		echo "<br />";
		echo "<p>You can <a href = './signin.php > sign in </a> and post </p>";
	}

 -->