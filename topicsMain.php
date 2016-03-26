<script language = "JavaScript">
<!--
	function goMakeTopic()
	{
		window.location="./createTopic.php";
	}





//-->
</script>
<?php
	include './connect.php';
	include './header.php';
	session_start();
	// echo "req_meth: " . $_SERVER["REQUEST_METHOD"];
	// echo "<br />";
	if( $_SESSION["signedIn"] == false )
	{
		echo "You need to be <a href = './signin.php'>Signed In</a> or <a href = './signup.php'>Signed Up</a> 
				to view Topics";
	}
	else
	{
		// if( $_SERVER["REQUEST_METHOD"] )
		include './getSelectCategory.php';
		if( !$result )
		{
			echo "Failed(1): " . mysqli_error( $myConn );
		}
		else
		{
			if( mysqli_num_rows( $result ) == 0 )
			{
				echo "This category doesn't exist yet - <a href = './categoriesMain.php'>Create it though!</a>";
			}
			else
			{
				while( $row = mysqli_fetch_assoc( $result ) )
				{
					echo "<h2>Topics in '" . $row["catName"] . "' Category</h2>";
				}
				include './queryCategoryTopics.php';
				if( !$result )
				{
					echo "Topics unavailable - " . mysqli_error( $myConn );
				}
				else
				{
					if( mysqli_num_rows( $result ) == 0 )
					{
						echo "Topic doesn't exist yet - <a href = './createTopic.php'>Create One Now!</a>";
					}
					else
					{
						echo "<table border = '1'>
								<tr>
									<th>Topic</th>
									<th>Created At</th>
								</tr>";
						include './getAllTopics.php';
					}
				}
			}
		}
	}
	echo "<br />";
	echo "<br />";
	echo "<button onclick = 'goMakeTopic()'>Create New Topic!</button>";
	include './footer.php';





?>
