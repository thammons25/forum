<?php
	include './connect.php';
	include './header.php';
	session_start();
	if( $_SESSION["signedIn"] == false )
	{
		echo "sign the hell in damn";
	}

	else
	{
		
		echo "req meth = " . $_SERVER["REQUEST_METHOD"] ;
		echo "<br />";
		
		// echo "hey ====== " . $sqlCleanup . "<br />";

		include './getSelectTopic.php';
		if( !$result )
		{
			echo "FAILED(1): " . mysqli_error( $myConn );
		}
		else
		{
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				echo "<h2>Posts In '" . $row["topicSubject"] . "'</h2>";
				$myPostTopic = $row["topicID"];
			}
			// echo "mypost topic = " . $myPostTopic . "<br />";

			include './queryTopicPosts.php';
			if( !$result )
			{
				echo "failed(2): " . mysqli_error( $myConn );
			}
			else
			{
				echo "<table border = '1'>
						<tr>
							<th>Author</th>
							<th>Post</th>
						</tr>";
				include './getAllPosts.php';


				include './newPostForm.php';


				//THIS WORKS BUT REQUIRES YOU TO REFRESH PAGE TO SEE RESULTS HMM...
				//-------------------------------
				include './insertPost.php';
				include './postCleanup.php';
				// ------------------------------------
			}
		}
	

		echo "<a href = './categoriesMain.php'>Go Back</a>";
		// echo "<a href = './postsMain.php?postID=" . 
		

	}



	include './footer.php';









?>
