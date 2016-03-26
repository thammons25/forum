<?php
	session_start();
	include './connect.php';
	if( isset( $_SESSION["signedIn"] ) )
	{
		include './header.php';
		include './selectUserTopics.php';
		if( !$result )
		{
			echo "error(1): " . mysqli_error( $myConn );
		}
		else
		{
			if( mysqli_num_rows( $result ) == 0 )
			{
				echo "Youre not involved in any topics yet!";
			}
			else
			{
				echo "<h2>Your Active Topics</h2>";
				include './showUserTopicTable.php';
				// echo "<br />";
				// echo "hello";
				// echo "<br />";
				include './selectUserPosts.php';

			}
		}







	}
	else if( !isset( $_SESSION["signedIn"] ) )
	{
		include './signup.php';
	}

	include './footer.php';









?>
