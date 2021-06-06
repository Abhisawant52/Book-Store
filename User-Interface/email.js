
	function testFun(){
      var name, emailId,subject;
      var emailReg =/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

 

	name = document.getElementById("name").value;
	emailId = document.getElementById("mailid").value;
	subject = document.getElementById("subject").value;
		msg = document.getElementById("txt").value;
  if( name ===''){
    document.getElementById("demo1").innerHTML = '<h6 style="color:red">  Please Fill Your Name** </h6>';
  }
  else{
    document.getElementById("demo1").innerHTML = '';
  }
  if( subject ===''){
    document.getElementById("demo3").innerHTML = '<h6 style="color:red">  Please Write Subject** </h6>';
  }else{
    document.getElementById("demo3").innerHTML = '';
  }
  if( msg ===''){
    document.getElementById("demo4").innerHTML = '<h6 style="color:red">  Please Write Message** </h6>';
  }
  else{
    document.getElementById("demo4").innerHTML = '';
  }
  if(emailId === ''){
    document.getElementById("demo2").innerHTML = '<h6 style="color:red">  Please Enter your Email ID** </h6>';
  }
  else if(!(emailId).match(emailReg)){
    document.getElementById("demo2").innerHTML = '<h6 style="color:red">  Please Enter Correct Email ID** </h6>';
  }
  else{
  document.getElementById("demo2").innerHTML = '';
  if((name !=='')&&(emailId!=='')&&(subject !=='')&&(msg !=='')){
  body =  'Name : ' + name +'\nEmail : '+ emailId +'\nSubject : '+ subject +'\nMessage : '+ msg;
  emailBody = encodeURIComponent(body);
  window.open("mailto:abhisawant52.as@gmail.com?subject=MessageQuery&body=" + emailBody);
  //document.getElementById("demo").innerHTML = body;
    }
  }
	}