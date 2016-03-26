<?php
	session_start();
	if( isset($_SESSION["signedIn"]) )
	{
		$_SESSION["signedIn"] = true;
	}
	// else if( )
	// $_SESSION["signedIn"] = true;

	// echo $_SESSION["signedIn"];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<meta name="description" content="Forum" />
		<meta name = "keywords" content="forum,post" />
		<title> PHP/MYSQL FORUM</title>
		<link rel = "stylesheet" href = "./style.css" type = "text/css" />
<!--		<style>
			#wrapper {
				border: 1px solid black;
				background-color: pink;
			}

			#menu {
				border: 1px solid black;
				background-color: navy;
			}



		</style> -->
	</head>
	<body>
		<h1>Forum</h1>
		<!-- <br /> -->
		<div id = "wrapper">
			<!-- <br /> -->
			<div id = "menu">
				<!-- <br /> -->
				<a class = "item" href = "./index.php">Home</a>
				<!-- <a class = "item" href = "./topicsMain.php">Topics</a> -->
				<!-- <a class = "item" href = "./createCategory.php">Create Category</a> -->
				<!-- <a class = "item" href = "./categorySelectAll.php">View Categories</a> -->
				<a class = "item" href = "./categoriesMain.php">Categories</a>
				<?php
					if( $_SESSION["signedIn"] == true )
					{
						echo "<a class = 'item' href = './signout.php'>Sign Out</a>";
					}
					else
					{
						echo "<a class = 'item' href = './signin.php'>Sign In</a>";
					}
				?>

				
				<!-- <a class = "item" href = './signin.php'>Sign In</a> -->
				<!-- <div id = "userbar" -->
				<div id = "userbar">
					<?php
						if( $_SESSION["signedIn"] == true )
						{
							echo "Welcome back, " . $_SESSION["userName"] ;
							//. "! - userID = " . $_SESSION["userID"];
							// echo " ---- topicID: " . $_GET["id"];
							// echo " ---- postID: " . $_GET["postID"];
						}
						else
						{
							echo "Hello! - <a href = './signup.php'>Sign Up</a> or <a href = './signin.php'>Sign In</a>";
						}


					?>


				</div> <!-- ends userbar1 -->
				<div id = "content">




