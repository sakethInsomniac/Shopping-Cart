<?php
session_start(); 


	
			$filename=dirname(__DIR__)."/data/goods.xml";
			if (file_exists($filename)){
	 		$xml = simplexml_load_file($filename);
		
			$loop=0;
			$sxe = new SimpleXMLElement($xml->asXML());
			foreach($xml as $item){
			$var3=$item->quantity;
			$var3 = (int) preg_replace('/\D/', '', $var3);


			if($item->QHold > 0 ){
			$var =$item->QHold;
			$var2=$item->quantity;
			$var = (int) preg_replace('/\D/', '', $var);
			$var2 = (int) preg_replace('/\D/', '', $var2);
			$item->QHold= 0;
			$item->quantity=$var+$var2;
			$xml->asXML($filename);
			//echo '<p><strong>Shopping Cart</strong></p><br/>'; 
			}
			}
			//echo '<p><shopping Cart</strong></p>'; 

			echo "Your cancelled the purchase Shop Again ";
			}
else{
echo "goods.xml is missing please find the file";
}


?>