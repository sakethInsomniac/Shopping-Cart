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



var xhr = createRequest();

function loadProcessData()
{
	//alert("Refreshing");
	if (xhr)
		createAsyncConection(xhr, "PHP/process.php", "post", "");	
		//setTimeout(loadData,10000);
}



function ProcessXML()
{
	//alert(elementID);
	//var requestbody = "ItemNo=" + encodeURIComponent(elementID);
	if (xhr)
	    createAsyncConection(xhr, "PHP/processXML.php", "post", "");	

}



