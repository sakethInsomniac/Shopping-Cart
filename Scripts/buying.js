function createRequest() 
{
	var xhr = false;	
	if (window.XMLHttpRequest)
		//W3C Compliant code
		xhr = new XMLHttpRequest();
	else if (window.ActiveXObject)
		//IE6 Code
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	
	return xhr;
}

function createAsyncConection(xhrObj, url, method, requestbody)
{
	xhrObj.open(method, url, true);
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				targetDiv.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}


function createAsyncConection2(xhrObj, url, method, requestbody)
{
	xhrObj.open(method, url, true);
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				addCart.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	xhrObj.send(requestbody); 
}

var xhr = createRequest();

function loadData()
{
	//alert("Refreshing");
	if (xhr)
		createAsyncConection(xhr, "PHP/buying.php", "post", "");	
		setTimeout(loadData,10000);
}


function AddToCart(elementID)
{
	//alert(elementID);
	var requestbody = "ItemNo=" + encodeURIComponent(elementID);
	if (xhr)
	    createAsyncConection2(xhr, "PHP/addtoCart.php", "post", requestbody);	

}
function RemoveCart(elementID)
{
	//alert(elementID);
	var requestbody = "ItemNo=" + encodeURIComponent(elementID);
	if (xhr)
	    createAsyncConection2(xhr, "PHP/removeCart.php", "post", requestbody);	

}

function ConfirmPurchase()
{
	//alert(elementID);
	//var requestbody = "ItemNo=" + encodeURIComponent(elementID);
	if (xhr)
	    createAsyncConection2(xhr, "PHP/confirmPurchase.php", "post", "");	

}

function CancelPurchase()
{
	//alert(elementID);
	//var requestbody = "ItemNo=" + encodeURIComponent(elementID);
	if (xhr)
	    createAsyncConection2(xhr, "PHP/cancelPurchase.php", "post", "");	

}


