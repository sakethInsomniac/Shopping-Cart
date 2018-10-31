<?php
if(isset($_POST['username']) && isset($_POST['passwordt']))
{

$filename=dirname(__DIR__)."/data/manager.txt";
$val=0;

$fh = fopen($filename,'r');
while ($line = fgets($fh)) {
  
  $arrfields = explode(',', $line);
 
	//trim($arrfields[1]);
	$savedPassword = trim(preg_replace('/\s\s+/', ' ', $arrfields[1]));
   if(($_POST['passwordt']==$savedPassword) && ($_POST['username']==$arrfields[0]))
  {
	
	$val=1;
	
	
  }
  
}
if($val==1)
{
			session_start();
			$_SESSION['username'] = $_POST['username'];
			session_write_close();
			echo "Login Success";
			header('Location: ../listing.htm');
			//echo "<br/><a href='listing.htm'>Click Here to go Listing</a>";
	
}
else {
	echo "Login Fail";
	echo "<br/><a href='../mlogin.htm'>Back to Login</a>";
}
fclose($fh);
}
?>