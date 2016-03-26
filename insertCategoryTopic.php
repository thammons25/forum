<?php
	//SUCCESSFULLY LINKS NEW TOPICS,CATEGORIES AND POSTS YOU JUST NEED TO CREATE A PAGE TO SELECT 
	//ALL THE POSTS FOR A TOPIC AND DISPLAY THAT SHIT 
	include './getNextTopicID.php';
	$sqlPrep = $myConn->prepare( "INSERT INTO Topics( topicSubject , topicCategory , topicBy ) 
								  VALUES( ? , ? , ?)" );
	$sqlPrep->bind_param( "sii" , $newSubject , $newCategory , $newBy );

	$newSubject = filter_var( $_POST["topicSubject"] , FILTER_SANITIZE_STRING );
	$newCategory = filter_var( $_POST["topicCategory"] , FILTER_VALIDATE_INT );
	$newBy = filter_var( $_SESSION["userID"] , FILTER_VALIDATE_INT );


	// $allVars = array( $newSubject , $newCategory , $newBy );
	// $i = 0;
	// echo "<ul>";
	// 	while( $i < count( $allVars ) )
	// 	{
	// 		echo "<li>" . $allVars[$i] . "</li>";
	// 		$i++;
	// 	}
	// echo "</ul>";


	// $topicID = mysqli_insert_id( $myConn );

	if( ($sqlPrep->execute() ) == true )
	{
		$sqlPrepTwo = $myConn->prepare( "INSERT INTO Posts( postContent , postTopic , postBy ) 
										 VALUES( ? , ? , ? )" );
		$sqlPrepTwo->bind_param( "sii" , $someSubject , $someTopic , $someBy );

		$someSubject = filter_var( $_POST["postContent"] , FILTER_SANITIZE_STRING );
		$someTopic = filter_var( $topicID , FILTER_VALIDATE_INT );
		$someBy = filter_var( $_SESSION["userID"] , FILTER_VALIDATE_INT );

		// $j = 0;
		// $allVarsAgain = array( $someSubject , $someTopic , $someBy );
		// echo "<ul>";
		// 	// while( $j < $allVarsAgain)
		// 	while( $j < count( $allVarsAgain) )
		// 	{
		// 		echo "<li>" . $allVarsAgain[$j] . "</li>";
		// 		$j++;
		// 	}


		$sqlPrepTwo->execute();
		// echo "woo!<br />";
	}









?>
