<?php
session_start(); 

if (isset($_POST['ItemNo'])) {
	
			$filename=dirname(__DIR__)."/data/goods.xml";
	 		$xml = simplexml_load_file($filename);
		
			$loop=0;
			$sxe = new SimpleXMLElement($xml->asXML());
			foreach($xml as $item){
			$var3=$item->quantity;
			$var3 = (int) preg_replace('/\D/', '', $var3);


			if($item->ItemID== $_POST['ItemNo'] && $var3 > 0 ){
			$var =$item->QHold;
			$var2=$item->quantity;
			$var = (int) preg_replace('/\D/', '', $var);
			$var2 = (int) preg_replace('/\D/', '', $var2);
			$var=$var+1;
			$var2=$var2-1;

			$item->QHold= $var;
			$item->quantity=$var2;
			$xml->asXML($filename);
			echo '<p><strong>Shopping Cart</strong></p><br/>'; 

			echo '<p><shopping Cart</strong></p>'; 

			echo "<table border='1'>";
		echo "<tr>";
		echo"<tr> <th>Item ID</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Remove</tr>";
		$price=0;
		foreach($xml as $item){
		
		if($item->QHold > 0)
		{
			//parseInt(text, 10);
		$var4=$item->ItemPrice ;
		$var4 = (int) preg_replace('/\D/', '', $var4);
		$var5=$item->QHold ;
		$var5 = (int) preg_replace('/\D/', '', $var5);
		$var6=$var4 * $var5;
		//echo $var4.$var5.$var6;
		$price=$price+$var6;
		$var=	(string)$item->ItemID;
		echo "<tr><td>".$item->ItemID . "</td>";
		echo "<td>". strtoupper($item->ItemName) . "</td>";
		//echo "<td>". substr(ucfirst($item->ItemDescription),0,19) . "</td>";
		echo "<td>". $item->ItemPrice . "</td>";
		//echo "<td>".$var4.$var5.$var6 . "</td>";
		echo "<td>". $item->QHold . "</td>";
		
		//echo $price;
		echo "<td><input type= 'button' value='Remove Item' id='".$var."' onClick='RemoveCart(this.id);' /></td></tr>";
		$loop=$loop+1;
		}
		
		
	}
	echo "<tr><td>Total</td>";
	echo "<td>". $price . "</td></tr>";
	echo "<td><input type= 'button' value='Confirm Purchase' id='purchaseConfirm' onClick='ConfirmPurchase();' /></td>";
	echo "<td><input type= 'button' value='Cancel Purchase' id='cancelPurchase' onClick='CancelPurchase();' /></td></tr>";


			}
		}
	}

?>