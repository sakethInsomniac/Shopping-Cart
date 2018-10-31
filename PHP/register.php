<?php 
if (isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['password'])&& isset($_POST['email']) && isset($_POST['phone']) )
{

 $cusID=uniqid();
 $filename=dirname(__DIR__)."/data/customer.xml";
 
 if (!file_exists($filename)){
$xml = new SimpleXMLElement("<customers></customers>");
		$xmlFile = $xml->addChild("customer");
		$xmlFile->addChild('customerid',$cusID);
		$xmlFile->addChild('firstname', $_POST['firstname']);
		$xmlFile->addChild('surname', $_POST['surname']);
		$xmlFile->addChild('password', $_POST['password']);
		$xmlFile->addChild('email', $_POST['email']);
		$xmlFile->addChild('phone',$_POST['phone']);
		Header('Content-type: text/xml');
		$xml->asXML($filename);
		echo '<p><b>Registration successful.Customer ID:'.$cusID.' </b></p>';
		//header('Location: ../buyonline.htm');
		echo "<br/><a href='buyonline.htm'>Go back to Buy Online</a>";

			exit();
 }
else 
{
			$xml = simplexml_load_file($filename);
		foreach($xml as $search){
			
			echo $search;
			//$last=$item->customerid;

			if (strcasecmp($search->email, $_POST['email']) == 0){
				
				echo '<p><b>Error: '.$_POST['email']. ' is already registered. Please provide unique email address</b></p>';		
				exit();
			}	
		}
		
		$xmlupdate = simplexml_load_file($filename); 
		$xmlNEW = new SimpleXMLElement($xmlupdate->asXML());
		$xmlLoad=$xmlNEW->addChild('customer');
		$xmlLoad->addChild('customerid',$cusID);
		$xmlLoad->addChild('firstname', $_POST['firstname']);
		$xmlLoad->addChild('surname', $_POST['surname']);
		$xmlLoad->addChild('password', $_POST['password']);
		$xmlLoad->addChild('email', $_POST['email']);
		$xmlLoad->addChild('phone',$_POST['phone']);
		$xmlNEW->asXML($filename);  
		echo '<p><b>Registration successful.Customer ID:'.$cusID.' </b></p>';
		//header('Location: ../buyonline.htm');
		echo "<br/><a href='buyonline.htm'>Go Back to Buy Online</a>";

		
			exit();

		

}


}

?>