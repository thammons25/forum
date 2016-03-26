<?php
	$sqlSelect = "SELECT userID , userName FROM Users WHERE 
				  userName = '" . filter_var( $_POST["userName"] , FILTER_SANITIZE_STRING ) . " ' AND 
				  userPass = '" . md5( $_POST["userPass"] ) "' ";
	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		echo "error, try again";
	}

	else 
	{
		if( mysqli_num_rows( $result ) == 0 )
		{
			echo "invalid username/password";
		}
		else
		{
			$_SESSION["signedIn"] = true;
			while( $row = mysqli_fetch_array( $result ) )
			{
				$_SESSION["userID"] = $row["userID"];
				$_SESSION["userName"] = $row["userName"];
			}
			echo "Welcome, " . $_SESSION["userName"] . "<br />
				  <a href = './index.php'>Proceed here to forum</a>";
		}
	}
?>
