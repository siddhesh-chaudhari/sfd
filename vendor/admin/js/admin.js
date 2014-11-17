function addCategory() {
	
	var cat_name = document.getElementById("cat_name").value;
	var parent = document.getElementById("parent").value;
	var category_oc_id = document.getElementById("category_oc_id").value;
	var cat_status = document.getElementById("cat_status").value;
	var req_approval = document.getElementById("req_approval").value;
	
	if(cat_name == ""){
		alert("Category name must not be empty");
		return;
	}else if(cat_name.length > 20){
		alert("Category name must be less than 20 characters");
		return;
	}
	
	
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
			var ans = parseInt(xmlhttp.responseText);
			if(ans==1){
				alert("Category Added successfully");
				window.location.replace("categories.php");
			}else if(ans==2){
				alert("Category addition failed");
			}
			
    }
  }
  xmlhttp.open("POST","ajax/functions.php?action=1&cat_name="+cat_name+"&parent="+parent+"&category_oc_id="+category_oc_id+"&cat_status="+cat_status+"&req_approval="+req_approval,true);
  
  xmlhttp.send();
 
}

function updateCategory() {
	
	var cat_name = document.getElementById("cat_name_u").value;
	var parent = document.getElementById("parent_u").value;
	var category_oc_id = document.getElementById("category_oc_id_u").value;
	var cat_status = document.getElementById("cat_status_u").value;
	var req_approval = document.getElementById("req_approval_u").value;
	var id = document.getElementById("cat_id").value;
	
	if(cat_name == ""){
		alert("Category name must not be empty");
		return;
	}else if(cat_name.length > 20){
		alert("Category name must be less than 20 characters");
		return;
	}
	
	
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
			var ans = parseInt(xmlhttp.responseText);
			if(ans==1){
				alert("Category Updated successfully");
				window.location.replace("categories.php");
			}else if(ans==2){
				alert("Category update failed");
			}
			
    }
  }
  xmlhttp.open("POST","ajax/functions.php?action=2&id="+id+"&cat_name="+cat_name+"&parent="+parent+"&category_oc_id="+category_oc_id+"&cat_status="+cat_status+"&req_approval="+req_approval,true);
  
  xmlhttp.send();
 
}

function deleteCategory (a){
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
			var ans = parseInt(xmlhttp.responseText);
			if(ans==1){
				alert("Category deleted successfully");
				window.location.replace("categories.php");
			}else if(ans==2){
				alert("Category removal failed");
			}else if(ans==3){
				alert("Category is assigned as parent to another category");
			}
			
    }
  }
  xmlhttp.open("POST","ajax/functions.php?action=3&id="+a,true);
  
  xmlhttp.send();

}