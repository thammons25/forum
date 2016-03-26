<?php
	include './connect.php';
	include './header.php';
	session_start();
	// echo $_SERVER["REQUEST_METHOD"];
	// echo "<br />";
	if( $_SESSION["signedIn"] == false )
	{
		echo "You need to <a href = './signin.php'>Sign In</a> or <a href = './signup.php'>Sign Up</a>
				to interact with categories";
	}
	else
	{

		if( $_SERVER["REQUEST_METHOD"] == "GET" )
		{
			include './newCategoryForm.php';
		}

		if( $_SERVER["REQUEST_METHOD"] == "POST" )
		{
			include './insertCategory.php';
		}

		include './selectAllCategories.php';
	}









	include './footer.php';
?>
