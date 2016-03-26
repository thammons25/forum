<?php
	session_start();
	include './connect.php';
	include './header.php';
	$_SESSION = array();

	if( ini_get( "session.user_cookies" ) )
	{
		$params = session_get_cookie_params();
		setcookie( session_name() , ' ' , time()-42000, 
			$params["path"] , $params["domain"] , 
			$params["secure"] , $params["httponly"]);
	}



	session_destroy();





	include './footer.php';





?>
