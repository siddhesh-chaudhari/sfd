function updateTime() {
    var now = new Date();
	
	document.getElementById("header-time").innerHTML = now.toUTCString();
}

function logout(){

 var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
		window.location.replace("index.php");	
    }
  }
  xmlhttp.open("POST","logout.php",true);
  xmlhttp.send();

}

function checkLogin() {
	
  var user = document.getElementById("uid").value;
  var pass = document.getElementById("upass").value;
  
  var ucheck = false;
  var pcheck = false;
  
  if(user == ""){
	ucheck = true;
  }
  if(pass == ""){
	pcheck = true;
  }
  
  if(ucheck && pcheck){
	alert("Enter Login id and password");
	return;
  }else if(ucheck){
	alert("Login id must be entered");
	return;
  }else if(pcheck){
	alert("Password  must be entered");
	return;
  }
  
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
			var ans = parseInt(xmlhttp.responseText);
			if(ans==1){
				window.location.replace("cpanel.php");
			}else if(ans==2){
				alert("Account is not activated");
			}else{
				alert("Invalid user name or password.");
			}
			
    }
  }
  xmlhttp.open("POST","login.php?uid="+user+"&upass="+pass,true);
  xmlhttp.send();
 
}

function validateRegistration() {


	//Company Name validation
    var company_name = document.forms["reg"]["company_name"].value;
    if (company_name == null || company_name == "") {
        alert("Company name must be filled out");
        return false;
    }else if(company_name.length > 100){
		alert("Company name must be less than 100 characters");
		return false;
	}
	
	//Address Validation
    var address = document.forms["reg"]["address"].value;
    if (address == null || address == "") {
        alert("Address must be filled out");
        return false;
    }else if(address.length > 255){
		alert("Address must be less than 255 characters");
		return false;
	}
	
	//City Validation
    var city = document.forms["reg"]["city"].value;
    if (city == null || city == "") {
        alert("City name must be filled out");
        return false;
    }else if(city.length > 40){
		alert("City name must be less than 40 characters");
		return false;
	}
	
	//Country Validation
    var country = document.forms["reg"]["country"].value;
    if (country == null || country == "") {
        alert("Country name must be filled out");
        return false;
    }else if(country.length > 40){
		alert("Country name must be less than 40 characters");
		return false;
	}
	
	//pincode Validation
    var pincode = document.forms["reg"]["pincode"].value;
    if (pincode == null || pincode == "") {
        alert("Pincode must be filled out");
        return false;
    }else if(pincode.length != 6){
		alert("Pincode must be 6 digit long");
		return false;
	}
	
	//User ID Validation
    var username = document.forms["reg"]["username"].value;
    if (username == null || username == "") {
        alert("User ID must be filled out");
        return false;
    }else if(username.length > 40){
		alert("User ID must be less than 40 characters");
		return false;
	}
	
	//Password Validation
    var password = document.forms["reg"]["password"].value;
    if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }else if(password.length > 40){
		alert("Password must be less than 40 characters");
		return false;
	}
	
	//First Name Validation
    var firstname = document.forms["reg"]["firstname"].value;
    if (firstname == null || firstname == "") {
        alert("First name must be filled out");
        return false;
    }else if(firstname.length > 40){
		alert("First name must be less than 40 characters");
		return false;
	}
	
	//Last Name Validation
    var lastname = document.forms["reg"]["lastname"].value;
    if (lastname == null || lastname == "") {
        alert("Last name must be filled out");
        return false;
    }else if(lastname.length > 40){
		alert("Last name must be less than 40 characters");
		return false;
	}
	
	//Gender Validation
    var gender = document.forms["reg"]["gender"].value;
    if (gender == null || gender == "") {
        alert("Gender must be selected");
        return false;
    }
	
	//Pan Validation
    var pan = document.forms["reg"]["pan"].value;
    if(pan.length > 40){
		alert("PAN must be less than 40 characters");
		return false;
	}
	
	//Email Validation
    var email = document.forms["reg"]["email"].value;
    if (email == null || email == "") {
        alert("Email must be filled out");
        return false;
    }else if(email.length > 80){
		alert("Email must be less than 80 characters");
		return false;
	}
	
	//Contact No Validation
    var contact_no = document.forms["reg"]["contact_no"].value;
    if (contact_no == null || contact_no == "") {
        alert("Contact number must be filled out");
        return false;
    }else if(contact_no.length > 100){
		alert("Contact number must be less than 100 digits");
		return false;
	}
	
	//TOC Validation
	var toc = document.forms["reg"]["toc"].checked;
    if (toc == null || toc == "") {
        alert("Cannot progress further until you agree the terms & conditions");
        return false;
    }
	
}

//DEFAULT LIGHTBOX
function showLightbox(){
	$('#lightbox').fadeIn(100);
	$('#blackoverlay').fadeIn(100);
}

function hideLightbox(){
	$('#lightbox').fadeOut(100);
	$('#blackoverlay').fadeOut(100);
}

//EDIT CATEGORY LIGHTBOX
function editLightbox(a,b,c,d,e,f){
	
	document.getElementById('cat_id').value=a;
	document.getElementById('cat_name_u').value=f;
	
	var parent = document.getElementById('parent_u');
	for(var i = 0;i<parent.options.length;i++){
		if(parent.options[i].value == b){
			parent.selectedIndex=i;
			break;
		}		
	}
	
	var oc_id = document.getElementById('category_oc_id_u');
	for(var i = 0;i<oc_id.options.length;i++){
		if(oc_id.options[i].value == c){
			oc_id.selectedIndex=i;
			break;
		}		
	}
	
	var cat_status = document.getElementById('cat_status_u');
	for(var i = 0;i<cat_status.options.length;i++){
		if(cat_status.options[i].value == d){
			cat_status.selectedIndex=i;
			break;
		}		
	}
	
	var req_approval = document.getElementById('req_approval_u');
	for(var i = 0;i<req_approval.options.length;i++){
		if(req_approval.options[i].value == e){
			req_approval.selectedIndex=i;
			break;
		}		
	}

	$('#lightbox-edit').fadeIn(100);
	$('#blackoverlay').fadeIn(100);
}

function hideeditLightbox(){
	$('#lightbox-edit').fadeOut(100);
	$('#blackoverlay').fadeOut(100);
}

//GET SUB CATEGORY AJAX CALL
function getSubCats (a){
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var cont = document.getElementById('sub-cats-container');
			cont.innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","libs/functions.php?action=1&cat_id="+a,true);
  xmlhttp.send();
}

function getLastCats (a){
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var cont = document.getElementById('last-cats-container');
			cont.innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","libs/functions.php?action=2&cat_id="+a,true);
  xmlhttp.send();
}

function validateOnebyOneUpload (){

	//Product Name
	if(document.getElementById('product_name').value == ""){
		alert("Enter product name");
		return;
	}else if(document.getElementById('product_name').value.length > 40){
		alert("Product name must be less than 40 characters");
		return;
	}
	//Product Description
	if(document.getElementById('product_desc').value == ""){
		alert("Enter product description");
		return;
	}else if(document.getElementById('product_desc').value.length > 1000){
		alert("Product name must be less than 1000 characters");
		return;
	}
	//model
	if(document.getElementById('model').value == ""){
		alert("Enter product model id");
		return;
	}else if(document.getElementById('model').value.length > 40){
		alert("Model ID must be less than 40 characters");
		return;
	}
	//Selling price
	if(document.getElementById('special_price').value == ""){
		alert("Enter Product selling price");
		return;
	}else if(document.getElementById('special_price').value.length > 8){
		alert("Seeling price must be less than 8 digits");
		return;
	}
	//Image file
	if(document.getElementById('image').value == ""){
		alert("Select valid product image");
		return;
	}
	
	//Check for valid Categories structure
	var div_cont = document.getElementById('last-cats-container').innerHTML;
	if(div_cont == ""){
		alert("Select Categories until the final children");
		return;
	}else{
		var last_cats = document.getElementById('last-cats').value;
		if(last_cats == -1){
			alert("Select the final category");
			return;
		}
	}
	
	alert("success");

}