<?php
    ob_start();
	session_start();
	session_destroy();
	header("location: ../index.php");// find the login index
	ob_end_flush();
?>