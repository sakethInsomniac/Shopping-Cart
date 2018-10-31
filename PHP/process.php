<?php
session_start(); 
	
	
	$filename=dirname(__DIR__)."/data/goods.xml";
	if (file_exists($filename)){
	
	$xml = simplexml_load_file($filename);
	$loop=1;
	echo "<form>";
		echo "<table border='1'>";
		echo "<tr>";
		echo"<tr> <th>Item ID</th><th>Name</th><th>Price</th><th>Quantity Available</th><th>Quantity on Hold</th><th>Quantity Sold</th></tr>";
		foreach($xml as $item){
		
					//parseInt(text, 10);
		$var=	(string)$item->ItemID;
		echo "<tr><td>". $item->ItemID. "</td>";
		echo "<td>". strtoupper($item->ItemName) . "</td>";
		//echo "<td>". substr(ucfirst($item->ItemDescription),0,19) . "</td>";
		echo "<td>". $item->ItemPrice . "</td>";
		echo "<td>". $item->quantity . "</td>";
		echo "<td>". $item->QHold . "</td>";
		echo "<td>". $item->QSold . "</td></tr>";
		
		
		//$loop=$loop+1;
		
		
	}
	echo "<tr><td><input type= 'button' value='Process'  onClick='ProcessXML();' /></td></tr>";
	echo "</form>";
	}
?>
