$(document).ready(function() {
var $checkAllData = 0;
$("#registerSubmit").click(function(){

	
	var $password = $("#password").val();
	var $firstname = $("#firstname").val();
	var $lastname = $("#lastname").val();
	var $phonenumber = $("#phonenumber").val();
	var $email = $("#email").val();
	var $address1 = $("#address_line1").val();
	var $address2 = $("#address_line2").val();
	var $city = $("#city").val();
	var $state = $( "#state option:selected" ).text();
	var $zipcode = $("#zipcode").val();
	
	

	var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var strength = 0;

if ($password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if ($password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if ($password.match(/([a-zA-Z])/) && $password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if ($password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if ($password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
    
	if($("#username").val() == "")
	{
		$("#usernameerror").text( "Invalid User Name" );
		
	}
		
	if($password == "" || strength<2)
	{
		$("#passworderror").text( "Invalid Password" );
		$checkAllData = 0;
	}
	else
	{
		$("#passworderror").text( "" );
		$checkAllData += 1;
	}
	if($firstname == "")
	{
		$("#firstnameerror").text( "Invalid First Name" );
				
	}
	else
	{
		$("#firstnameerror").text( "" );
		$checkAllData += 1;
	}
	if($lastname == "")
	{
		$("#lastnameerror").text( "Invalid Last Name" );
			$checkAllData = 0;
	}
	else
	{
		$("#lastnameerror").text( "" );
		$checkAllData += 1;
	}
	if($phonenumber == "" || !(/^[0-9]+$/).test($phonenumber) || !($phonenumber.length==10))
	{
		$("#phonenumbererror").text( "Invalid Phone Number" );
		$checkAllData = 0;
	}
	else
	{
		$("#phonenumbererror").text( "" );
		$checkAllData += 1;
		
	}
	if($email == "" || !pattern.test($email))
	{
		$("#emailerror").text( "Invalid Email" );
		$checkAllData = 0;
	}
	else
	{
		
		$("#emailerror").text( "" );
		$checkAllData += 1;
	}
	if($address1 == "")
	{
		$("#address_line1error").text( "Invalid Address" );
		$checkAllData = 0;
		
			
	}
	else
	{
		$("#address_line1error").text( "" );
		$checkAllData += 1;
	}
	if($city == "")
	{
		$("#cityerror").text( "Invalid City" );
		$checkAllData = 0;
		
			
	}
	else
	{
		$("#cityerror").text( "" );
		$checkAllData += 1;
	}
	if($state == "")
	{
		$("#stateerror").text( "Invalid State" );
		$checkAllData = 0;
		
			
	}
	else
	{
		$("#stateerror").text( "" );
		$checkAllData += 1;
	}

	if($zipcode == "" || !($zipcode.length==5))
	{
		$("#zipcodeerror").text( "Invalid Zipcode" );
		$checkAllData = 0;
		
			
	}
	else
	{
		$("#zipcodeerror").text( "" );
		$checkAllData += 1;
	}
	
	if($checkAllData >= 10)
	{
		fname = $('#firstname').val();
		lname = $("#lastname").val() ;
		phone = $("#phonenumber").val();
		email_address = $("#email").val();
		address_1 = $("#address_line1").val();
		address_2 = $("#address_line2").val();
		city_name = $("#city").val(); 
		state_name = $("#state").val();
		zip = $("#zipcode").val();
		user = $('#username').val();
		pass = $('#password').val();

	var datastr = 'firstname='+ fname + '&lastname=' + lname+ '&phonenumber=' + phone + '&email=' + email_address + '&address1=' +address_1+ '&address2=' +address_2+  '&city=' + city_name+ '&state=' + state_name+ '&zipcode=' + zip+ '&username=' + user + '&password=' + pass;
		
		$.ajax({
            type:'POST',
            url:'newRegister.php',
            data:datastr,
            success:function(data)
            {
            	if(data=="1")
            	{
            		console.log("Success");
            		window.open("../login.html", "_self");
            	}
            	else
            		alert(data);
          
           	}
            
         });

   		
	}
	return false;
			
});

$("#username").change(function(){
	var $username = $("#username").val();
	var alphaNumeric = /^[0-9a-zA-Z]+$/;

	if($username == "" || !alphaNumeric.test($username))
	{
		$("#usernameerror").text( "Invalid User Name" );
		$checkAllData = 0;
		
			
	}
	else
	{
		$.post('validate.php',{username: $('#username').val()}, function(data){
		if(data==1)
		{
        	$("#usernameerror").text( "User Name exists" );
        	$checkAllData = 0;
        	
		}
        else
        {
        	$("#usernameerror").text( "" );
        	$checkAllData += 1;
        }
    	});

    }
    
});

	
});
    	