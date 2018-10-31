
function sFirstName_validation()
{
	
	var pattern = /^[A-z]+$/;
if(document.getElementById("firstname").value=="" )
{
alert("First Name is Blank");
return false;
}
else if(document.getElementById("firstname").value.match(pattern))
{
return true;
}
else
{
alert("Please enter proper name Eg:Lakshmi");
return false;
}
}

//validate student FamilyName
function sLastName_validation()
{
var result = document.getElementById("surname").value;
var pattern = /^[A-z]+$/;
if(document.getElementById("surname").value=="" )
{
alert("surname  is Empty");
return false;
}
else if(document.getElementById("surname").value.match(pattern))
{
return true;

}
else
{
alert("Enter proper surname  eg:chebrolu");
return false;
}
}

//validate password
function password_validation()
{
var result = document.getElementById("password").value;
if(document.getElementById("password").value=="" )
{
alert("password  is Empty");
return false;
}
else 
{
return true;
}
}

//validate cpassword
function cpassword_validation()
{
var result = document.getElementById("cpassword").value;
var result2 = document.getElementById("password").value;
if(document.getElementById("cpassword").value=="" )
{
alert("password  is Empty");
return false;
}
else if(result==result2)
{
return true;

}
else
{
alert("Password Mismatch");
return false;
}
}


//validate Email
function email_validation()
{
	
	var pattern =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(document.getElementById("email").value=="" )
{
alert("Email is Blank");
return false;
}
//else if(document.getElementById("email").value.match(pattern) && mailcheck(document.getElementById("email").value) )
else if(document.getElementById("email").value.match(pattern))
{
//alert("alert");
//alert("alert");
return true;
}
else
{
//alert(document.getElementById("email").value);
alert("Please enter proper email Eg:sample@gmail.com");
return false;
}
}

//validate PhoneNumber
function phone_validation()
{
	
	var pattern = /^(?:0\d\s|\(0\d\))\d{8}$/;
	
if(document.getElementById("phone").value=="" )
{

return true;
}
else if(document.getElementById("phone").value.match(pattern))
{
return true;
}
else
{
alert("Please enter contact properly  Eg:03 6106666 or (03)6106666");
return false;
}
}

//Test Form
function validationCheck()
{
	
if(sFirstName_validation() && sLastName_validation() && password_validation() && cpassword_validation() && email_validation() && phone_validation())
{

//ajax_post();//ajax post data to php
//changeButtonText();//Change the Text


return true;
}
else 
{
alert("Please provide proper inputs");
return false;
}
}



function register()
{
if(validationCheck())
{
	
	var firstname = document.getElementById('firstname').value.trim();
	var surname = document.getElementById('surname').value.trim();
	var cpassword = document.getElementById('password').value.trim();
	var email = document.getElementById('email').value.trim();
	var phone = document.getElementById('phone').value.trim();

	var requestbody = "firstname=" + encodeURIComponent(firstname) + "&surname=" + encodeURIComponent(surname) + "&password=" + encodeURIComponent(cpassword) + "&email=" + encodeURIComponent(email)+ "&phone=" + encodeURIComponent(phone);

	if (xhr){

		createAsyncConection(xhr, "PHP/register.php", "post", requestbody);
		//window.location.href = "https://mercury.swin.edu.au/cos80021/s101734216/Assignment2/buyonline.htm";
}



		

}
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
	if (method == "post")
		xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.onreadystatechange = function() {
		    	if (xhr.readyState == 4 && xhr.status == 200) {
				statusxhr.innerHTML = xhr.responseText;
		    } // close if conditon
	    } // end the sync func
	xhrObj.send(requestbody); 
}
