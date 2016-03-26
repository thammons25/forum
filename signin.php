<?php
	session_start();
	include './connect.php';
	include './header.php';


?>

<script language = "JavaScript">
	function headBack()
	{
		window.location = './signin.php';
	}
</script>
<?php

	echo "<h3>Sign In</h3>";

	if( isset( $_SESSION["signedIn"] ) && $_SESSION["signedIn"] == true )
	{
		echo "Already signed in, <a href = './signout.php'>sign out here</a>";
	}
	else 
	{
		if( $_SERVER["REQUEST_METHOD"] != "POST" )
		{
			echo "<form method = 'post' action = ''>
				  Username: <input type = 'text' name = 'userName' required>
				  <br />
				  Password: <input type = 'password' name = 'userPass' required>
				  <br />
				  <br />
				  <input type = 'submit' value = 'Sign In' />
				  </form>";
		}
		else
		{
			$errors[] = array();
			if( !isset( $_POST["userName"] ) )
			{
				$errors[] = "username was left blank";
			}
			if( !isset( $_POST["userPass"] ) )
			{
				$errors[] = "password was left blank";
			}


			$errorCount = count( $errors );
			if( $errorCount > 1 )
			{
				echo $errors[0];
				echo "There were several errors";
				echo "<ul>";
					foreach( $errors as $key => $value )
					{
						echo "<li>" . $value . "</li>";
					}
				echo "</ul>";
			}
			else 
			{
			// else 
			// {
			// 	include './selectUser.php';
			// }
			// // {
				// include './prepSelect.php';
				$dummyName = filter_var( $_POST["userName"] , FILTER_SANITIZE_STRING );
				// $dummyName = mysql_real_escape_string( $_POST["userName"] );
				$dummyPass = md5( $_POST["userPass"] );
				// echo "md5(PASSWORD): " . md5( $_POST["userPass"] ) . "<br />";
				// echo "USERNAME: " . $dummyName . "<br />";
				// echo "md5(PASSWORD): " . $dummyPass . "<br />";
				// echo $dummyName . "<br />";
				// echo $dummyPass . "<br />";


				// $sqlSelect = "SELECT userID , userName FROM Users WHERE userName=" . $dummyName .  "AND userPass=" . $dummyPass . "";
				$sqlSelect = "SELECT userID , userName , userLevel FROM Users WHERE 
							  userName = '" . $dummyName . "' 
							  AND userPass = '" . $dummyPass . "' ";
				// echo $sqlSelect . "<br />";

				$result = mysqli_query( $myConn , $sqlSelect );
				// echo $result 
				// echo $result . "<br />";
				// echo "<p>hmm..." . $result . "</p>";
				// echo "hmm ... <br />";

				if( !$result ) 
				{
					echo "IF YOURE SEEING THIS MESSAGE THEN YOU HAVE NO IDEA WHY THIS DOES NOT WORK FUCK";
					echo mysql_errno( $myConn ) . "<br />";

				} 
				else
				{
					if( mysqli_num_rows( $result ) == 0 )
					{
						echo "invalid username or password ";
						echo "<br />";
						echo "<button onclick = 'headBack()'>Return To Login</button>";

					}
					else 
					{
						$_SESSION["signedIn"] = true;
						while( $row = mysqli_fetch_array( $result ) )
						{
							// echo $row["userName"] . "<br />";
							$_SESSION["userID"] = $row["userID"];
							$_SESSION["userName"] = $row["userName"];
							$_SESSION["userLevel"] = $row["userLevel"];
						}
						echo "Welcome, " . $_SESSION["userName"] . "<br /><a href = './index.php'>Proceed here to forum</a>";
						echo "<br />";
						echo $_SESSION["signedIn"];
					}
				}
			}
		}
	}

	include './footer.php';



?>
