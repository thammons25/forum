<?php
	include './connect.php';
	include './header.php';
	if( $_SESSION["signedIn"] == false )
	{
		echo "sign in god damn";
	}
	include './showCategoriesForTopic.php';
	if( !$result )
	{
		echo "FAILED(1): " . mysqli_error( $myConn );
	}
	else
	{
		if( $_SERVER["REQUEST_METHOD"] != "POST" )
		{
			echo "<h2>Create New Topic!</h2>";
			echo "<form method = 'post' action = ''>
					Subject: <input type = 'text' name = 'topicSubject' />
					<br />
					Category:";
					echo "<select name = 'topicCategory'>";
						while( $row = mysqli_fetch_assoc( $result ) )
						{
							echo "<option value = '" . $row["catID"] . "'>" . $row["catName"] . "</option>";
						}
					echo "</select>";
					// echo "Message"
					echo "<br />";
					echo "Message:<br /><textarea name = 'postContent'></textarea>
						<br />
						<br />
						<input type = 'submit' value = 'Add Topic' />
				  </form>";
		}
		else
		{
			include './insertCategoryTopic.php';
			// THIS SHOULD BE FIXED TO BE A LINK TO THE CATEGORY FOR WHICH THE TOPIC WAS JUST CREATED
			// WIL BE SOMETHING LIKE ./topicsMain.php?id=$row["catID"];
			echo "You can <a href = './categoriesMain.php'>now return to Categories</a>";

		}
	}
	include './footer.php';







?>
