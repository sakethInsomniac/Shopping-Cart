<?php 
if (isset($_POST['ItemName']) && isset($_POST['ItemPrice']) && isset($_POST['quantity'])&& isset($_POST['ItemDescription']))
{

 $itemID=uniqid();
 $filename=dirname(__DIR__)."/data/goods.xml";

 if (!file_exists($filename)){

$xml = new SimpleXMLElement("<Items></Items>");
		$xmlFile = $xml->addChild("Item");
		$xmlFile->addChild('ItemID',$itemID);
		$xmlFile->addChild('ItemName',$_POST['ItemName']);
		$xmlFile->addChild('ItemPrice', $_POST['ItemPrice']);
		$xmlFile->addChild('quantity', $_POST['quantity']);
		$xmlFile->addChild('ItemDescription', $_POST['ItemDescription']);
		$xmlFile->addChild('QHold',0);
		$xmlFile->addChild('QSold',0);
		Header('Content-type: text/xml');
		$xml->asXML($filename);
		echo '<p><b>Registration successful.Item  ID:'.$itemID.' </b></p>';
		
 }
else 
{
	
		
		$xmlupdate = simplexml_load_file($filename); 
		$xmlNEW = new SimpleXMLElement($xmlupdate->asXML());
		$xmlLoad=$xmlNEW->addChild('Item');
		$xmlLoad->addChild('ItemID',$itemID);
		$xmlLoad->addChild('ItemName',$_POST['ItemName']);
		$xmlLoad->addChild('ItemPrice', $_POST['ItemPrice']);
		$xmlLoad->addChild('quantity', $_POST['quantity']);
		$xmlLoad->addChild('ItemDescription', $_POST['ItemDescription']);
		$xmlLoad->addChild('QHold',0);
		$xmlLoad->addChild('QSold',0);
		//..Header('Content-type: text/xml');
		$xmlNEW->asXML($filename);
		echo '<p><b>Registration successful.Item  ID:'.$itemID.' </b></p>';
				

}


}

?>