function LoginvalidateForm(){
      var emailId , pass;
      var emailReg =/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	  var lowercaseLetter = /[a-z]/g;
	  var uppercaseLetter = /[A-Z]/g;
	
	emailId = document.getElementById("mailid").value;
	pass = document.getElementById("passwordKey").value;
	
  if(emailId === ''){
    document.getElementById("p1").innerHTML = '<h4>  Please Enter your Email ID* </h4>';
	return false;
  }
  else if(!(emailId).match(emailReg)){
    document.getElementById("p1").innerHTML = '<h4>  Please Enter Correct Email ID* </h4>';
	return false;
  }
  else{
	document.getElementById("p1").innerHTML = '';
  } 
  if( pass ===''){
    document.getElementById("p2").innerHTML = '<h4>  Please Enter Your Password* </h4>';
	return false;
  }
  else if(pass.length <= 7){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 8  characters* </h4>';
	 return false;
  }
  else if(!(pass).match(lowercaseLetter)){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 1 Lower Case character* </h4>';
	 return false;
  }
  else if(!(pass).match(uppercaseLetter)){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 1 Upper Case character*</h4>';
	 return false;
  }
  else{
    document.getElementById("p2").innerHTML = '';
  }
}
function RegvalidateForm(){
      var emailId , pass , name;
      var emailReg =/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	  var lowercaseLetter = /[a-z]/g;
	  var uppercaseLetter = /[A-Z]/g;
	name =  document.getElementById("user_name").value;
	emailId = document.getElementById("mailid").value;
	pass = document.getElementById("passwordKey").value;
  if(name === ''){
    document.getElementById("p").innerHTML = '<h4>  Please Enter your Name* </h4>';
	return false;
  }
  else{
	document.getElementById("p").innerHTML = '';
  }
  if(emailId === ''){
    document.getElementById("p1").innerHTML = '<h4>  Please Enter your Email ID* </h4>';
	return false;
  }
  else if(!(emailId).match(emailReg)){
    document.getElementById("p1").innerHTML = '<h4>  Please Enter Correct Email ID* </h4>';
	return false;
  }
  else{
	document.getElementById("p1").innerHTML = '';
  } 
  if( pass ===''){
    document.getElementById("p2").innerHTML = '<h4>  Please Enter Your Password* </h4>';
	return false;
  }
  else if(pass.length <= 7){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 8  characters* </h4>';
	 return false;
  }
  else if(!(pass).match(lowercaseLetter)){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 1 Lower Case character* </h4>';
	 return false;
  }
  else if(!(pass).match(uppercaseLetter)){
	 document.getElementById("p2").innerHTML = '<h4>  Password must contain 1 Upper Case character*</h4>';
	 return false;
  }
  else{
    document.getElementById("p2").innerHTML = '';
  }
}