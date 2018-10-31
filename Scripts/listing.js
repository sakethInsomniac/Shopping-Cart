function sItemName_validation()
{
	
var pattern = /^[A-z]+$/;
if(document.getElementById("ItemName").value=="" )
{
alert("Item Name is Blank");
return false;
}
else 
{
return true;
}

}

function sItemDescription_validation()
{	
if(document.getElementById("ItemDescription").value=="" )
{
alert("Item Description is Blank");
return false;
}
else
{
return true;
}
}

//validate price
function price_validation()
{
	
	var pattern = /^\d+$/;;
	
if(document.getElementById("ItemPrice").value=="" )
{
alert("Price is blank");
return false;
}
else if(document.getElementById("ItemPrice").value.match(pattern))
{
return true;
}
else
{
alert("Please enter price properly: eg: 1 or 2 or 3 numeric values not floats ");
return false;
}
}

//validate price
function quantity_validation()
{
	
	var pattern = /^\d+$/;
	
if(document.getElementById("quantity").value=="" )
{
alert("quantity is blank");
return false;
}
else if(document.getElementById("quantity").value.match(pattern))
{
return true;
}
else
{
alert("Please enter quantity properly: ");
return false;
}
}


//Test Form
function validationCheck()
{
	
if(sItemName_validation() && price_validation() && quantity_validation() && sItemDescription_validation())
{

//ajax_post();//ajax post data to php
//changeButtonText();//Change the Text

//alert("validation success");
return true;
}
else 
{
//alert("Please provide proper inputs");
return false;
}
}

function AddItem()
{
	//alert("button clicked");
	if(validationCheck())
	{
	var ItemName = document.getElementById('ItemName').value.trim();
	var ItemPrice = document.getElementById('ItemPrice').value.trim();
	var quantity = document.getElementById('quantity').value.trim();
	var ItemDescription = document.getElementById('ItemDescription').value.trim();
	var requestbody = "ItemName=" + encodeURIComponent(ItemName) + "&ItemPrice=" + encodeURIComponent(ItemPrice) + "&quantity=" + encodeURIComponent(quantity) + "&ItemDescription=" + encodeURIComponent(ItemDescription);
			
	if (xhr)
		createAsyncConection(xhr, "PHP/listing.php", "post", requestbody);
	}
		
	//clearForm();
}

var xhr= createRequest();
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
//refered the code from w3 schools
function createAsyncConection(xhrObj, url, method, requestbody){
	xhrObj.open(method, url, true);
	//alert("test");
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.onreadystatechange = function() {
		    	if (xhr.readyState == 4 && xhr.status == 200) {
				statusxhr.innerHTML = xhr.responseText;
		    } // close if conditon
	    } // end the sync func
	xhrObj.send(requestbody); 
}

