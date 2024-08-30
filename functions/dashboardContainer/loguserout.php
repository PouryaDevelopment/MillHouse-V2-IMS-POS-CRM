<?php 
	session_start();

	session_unset();
	//this destroys the session we had made and clears the elements so you can have a fresh login or just so the session doesnt remember you.
	session_destroy();

	 header('Refresh: 0, url = /pos/index.php');


 ?>