<?php
session_start(); 
	
	
	$filename=dirname(__DIR__)."/data/goods.xml";
	if (file_exists($filename)){
	
	$xml = simplexml_load_file($filename);
	$loop=1;
	echo "<form>";
		echo "<table border='1'>";
		echo "<tr>";
		echo"<tr> <th>Item No</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity Available</th><th>AddItems</th></tr>";
		foreach($xml as $item){
		
		if($item->quantity > 0)
		{
			//parseInt(text, 10);
		$var=	(string)$item->ItemID;
		echo "<tr><td>". $loop. "</td>";
		echo "<td>". strtoupper($item->ItemName) . "</td>";
		echo "<td>". substr(ucfirst($item->ItemDescription),0,19) . "</td>";
		echo "<td>". $item->ItemPrice . "</td>";
		echo "<td>". $item->quantity . "</td>";
		
		echo "<td><input type= 'button' value='Add to Cart' id='".$var."' onClick='AddToCart(this.id);' /></td></tr>";
		$loop=$loop+1;
		}
		
	}
	
	echo "</form>";
	}
else{
echo " No File Exists Please Insert data";
}
?>
