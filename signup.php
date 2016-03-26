<?php
	include './connect.php';
	include './header.php';

	echo "<h3>Signup</h3>";

	if( $_SERVER['REQUEST_METHOD'] != 'POST' )
	{
		echo "<form method = 'post' action = ''>
				Username: <input type = 'text' name = 'userName' />
				<br />
				Password: <input type = 'password' name = 'userPass' />
				<br />
				Password Again: <input type = 'password' name = 'userPassCheck' />
				<br />
				Email: <input type = 'email' name = 'userEmail' />
				<br />
				<input type = 'submit' value = 'Sign Up' />
			</form>";
	}
	else 
	{
		$errors = array();
		if( isset( $_POST['userName']))
		{
			if( !ctype_alnum( $_POST['userName'] ) )
			{
				// echo "<p>USERNAME: " . $_POST['userName'] . "</p>";
				$errors[] = 'only letters/digits';
			}
			if( strlen( $_POST['userName'] > 30 ) )
			{
				$errors[] = 'cannot exceed 30 characters';
			}
		}
		else 
		{
			$errors[] = 'username cannot be empty';
		}

		if( isset( $_POST['userPass'] ) )
		{
			if( $_POST['userPass'] != $_POST['userPassCheck'] )
			{
				$errors[] = 'passwords dont match';
			}
		}
		else 
		{
			$errors[] = "password cant be empty";
		}

		if( !empty( $errors) )
		{
			echo "several fields wrong";
			echo "<ul>";
				foreach( $errors as $key => $value )
				{
					echo "<li>" . $value . "</li>";
				}
			echo "</ul>";

		}
		else 
		{
			include './prepInsert.php';
		}

		
	}
	include './footer.php';


?>
