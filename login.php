<?php
include 'config.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($db,$sql);
	//login Query
	echo '<!--';var_dump($result);
	echo '\n\n';var_dump(mysqli_error($db));var_dump($sql);echo '-->';

	$count = mysqli_num_rows($result);

	if($count == 1) {
		$_SESSION["login_user"] = $myusername;
		//assigning the global variable Session as the logged in user
		$error = "Success:Logging in!";
		header("Refresh:1; url=index.php");
			}else {
		         $error = ("Your credentials are invalid, please try again.");
      }
   }
?>


<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#F0f0f0">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
