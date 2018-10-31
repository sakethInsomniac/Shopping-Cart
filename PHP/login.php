<?php	

	/* <!--    File: login.php  --> PHPSCRIPT for login.htm
        //  Student ID : 101734216
        //  Name : Lakshmi Saketh
        //  Assignment 2: WAD -->
	*/
	if (isset($_POST['email']) && isset($_POST['password']))
	{
	
	 $filename=dirname(__DIR__)."/data/customer.xml";
	$xml = simplexml_load_file($filename);
	$checkUser=0;
	foreach($xml as $element){
		
		
		if (strcasecmp($element->email, $_POST['email']) == 0 && $element->password == $_POST['password']){
			
			session_start();
			$customerid = $element->customerid . " ";
			//$_SESSION['username'] = $_POST['email'];
			//$_SESSION['customerid'] = $customerid;
			$_SESSION['username']= $customerid;
			session_write_close();
			
			$checkUser=1;
			header("Location: ../buying.htm");
			exit();
		} 	
	}
	if($checkUser==0){
	echo '<p><strong>Username/Password does not match</strong></p>';	
    echo "<br/><a href='../login.htm'>Please Login</a>";
}
	}
?>