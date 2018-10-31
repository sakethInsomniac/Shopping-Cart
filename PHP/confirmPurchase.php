<?php
session_start(); 


	
			$filename=dirname(__DIR__)."/data/goods.xml";
	 		$xml = simplexml_load_file($filename);
		
			$loop=0;
			$sxe = new SimpleXMLElement($xml->asXML());
			foreach($xml as $item){
			$var3=$item->quantity;
			$var3 = (int) preg_replace('/\D/', '', $var3);


			if($item->QHold > 0 ){
			$var =$item->QHold;
			$var2=$item->QSold;
			$var = (int) preg_replace('/\D/', '', $var);
			$var2 = (int) preg_replace('/\D/', '', $var2);
			$item->QHold= 0;
			$item->QSold=$var+$var2;
			$xml->asXML($filename);
			//echo '<p><strong>Shopping Cart</strong></p><br/>'; 
			}
			}
			//echo '<p><shopping Cart</strong></p>'; 

		$price=0;
		foreach($xml as $item){
		
		if($item->QSold > 0)
		{
			//parseInt(text, 10);
		$var4=$item->ItemPrice ;
		$var4 = (int) preg_replace('/\D/', '', $var4);
		$var5=$item->QSold;
		$var5 = (int) preg_replace('/\D/', '', $var5);
		$var6=$var4 * $var5;
		//echo $var4.$var5.$var6;
		$price=$price+$var6;
		$var=	(string)$item->ItemID;
				
		}
		
		
	}
		echo "Please Pay the Bill of the purchased Items Total Bill: ".$price;


			
		
	

?>