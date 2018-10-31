<?php
	session_start();
	$var=$_SESSION['username'];
	Echo "User ID: ".$_SESSION['username']." Thank you";
	session_destroy();
	echo "<br/><a href='mlogin.htm'>Click to Login As Manager </a>";
	echo "<br/><a href='login.htm'>Click Login As Customer</a>";
?>