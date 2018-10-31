<?php
session_start(); 
	
	
	$filename=dirname(__DIR__)."/data/goods.xml";
if (file_exists($filename)){
 //$doc=null;
$doc = new DOMDocument("1.0","UTF-8");
//$doc->preserveWhiteSpace = false;
//$doc = new SimpleXMLElement($filename);
$doc->load('../data/goods.xml');
//$doc->loadxml($doc);

$xpath = new DOMXPath($doc);
foreach( $xpath->query("/Items/Item[quantity='0'][QHold='0']") as $node) {
    $node->parentNode->removeChild($node);
}
$doc->formatOutput = true;
 $doc->save('../data/goods.xml');

	$xml = simplexml_load_file($filename);
	
	$loop=1;
	echo "<form>";
		echo "<table border='1'>";
		echo "<tr>";
		echo"<tr> <th>Item ID</th><th>Name</th><th>Price</th><th>Quantity Available</th><th>Quantity on Hold</th><th>Quantity Sold</th></tr>";
		foreach($xml as $item){
		
					//parseInt(text, 10);
		$var=	(string)$item->ItemID;
		$item->QSold=0;
		$var2=$item->QSold;
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
else {
echo "No file exists with name goods.xml";
}	
?>
