<?php

	echo "<h3>Add Topic!</h3>";
	echo " - session status: " . $_SESSION["signedIn"] ;
	echo " - userLevel status: " . $_SESSION["userLevel"] ;
	echo " - userID status: " . $_SESSION["userID"];
	// echo " - " . mysql_insert_id() ;
	echo "<form method = 'post' action = ''>
		   	Subject: <input type = 'text' name = 'topicSubject' />
		   	<br />";
		   	echo "Category: <select name = 'topicCategory'>";
			   while( $row = $result->fetch_assoc() )
			   {
			   	echo "<option value = '" . $row["catID"] . "'>" . $row["catName"] . "</option>";
			   }
			echo "</select>";
			echo "<br />";
			echo "Message: <br />
			<textarea name = 'postContent'></textarea>
			<br />
			<br />
			<input type = 'submit' value = 'Create Topic' />
	</form>";
	
?>
