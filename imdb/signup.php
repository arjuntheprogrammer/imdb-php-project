
<html>


<?php
session_start(); 
if(!isset($_SESSION['username'])){
	include("headimdbfinal.php");
	}
	else
	{include("headimdbfinalal.php");
	
	}

include 'db.php';

?>
<body style="margin:0px; "  width="100%" height="100%" align="center">
<div id="main" >

<div id="top">

	<?php
	//session_start(); 
	if(!isset($_SESSION['username'])){
	include("header.php");
	}
	else
	{include("headeral.php");
	
	}	
	?>
	 
</div>


<div id="mid3" >


<?php
// define variables and set to empty values
$fnameErr =$emailErr = $lnameErr = $usernameErr=$passwordErr  = "";
$fname = $email = $lname = $username = $password = "";
$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
                    $fname=$_POST['fname'];
                    $lname=$_POST['lname'];                 
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
	$flag=0;
   if (empty($_POST["fname"])) {
     $fnameErr = "* Name is required";
   } else {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $fnameErr = "* Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "* Email is required";
   } 
   
   
   else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "* Invalid email format";
     }
	 else{
		 
		  $sql = "SELECT * FROM user WHERE email='$email'";
				if($result = mysqli_query($link, $sql))
				{
					if(mysqli_num_rows($result) > 0){
						 $emailErr = "* This Email-Id is already registered";
					}
					
				}
	   
	 }
	 
	 
	 
	 
	 
   }
    
   if (empty($_POST["username"])) { 
     $usernameErr = "* Username is required";
   }
	else if(!preg_match('/^[a-zA-Z0-9@_]*$/',$username))
                            {
                                 $usernameErr='* Re-Enter Your UserName! Format Inccorrect!( only alpha, numbers,@_ are allowed)';                     
							}
   else
   {
	   $sql = "SELECT * FROM user WHERE username='$username'";
				if($result = mysqli_query($link, $sql))
				{
					if(mysqli_num_rows($result) > 0){
						 $usernameErr = "* This Username is already registered";
					}
					
				}
	   
	   
	   
	   
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "* Password is required";
   } 
   else{
	   
	   if(!preg_match('/^[a-zA-Z0-9@_]*$/',$password))
                            {
                                 $passwordErr='*Invalid Format! Re-Enter Password!';
                            }
		
			
   }

   if (empty($_POST["lname"])) {
     $lnameErr = "* Last-Name is required";
   } else {
     $lname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $lnameErr = "* Only letters and white space allowed";
     }
   }
   
   if($fnameErr=="" and $emailErr =="" and $lnameErr =="" and $usernameErr=="" and $passwordErr == "")
	   $flag=1;
   else
	   header($_SERVER['PHP_SELF']);
   
   if (isset($_POST['submit']) and $flag==1)
    {      
		include 'db.php';
   

		$_SESSION['username']=$username;
		$sql = "INSERT INTO user(fname,lname,email,username,password) 
			   VALUES ('$fname','$lname','$email','$username','$password')";
		if(mysqli_query($link, $sql)){
		   // echo "Records added successfully.";
		   header("location:imdbfinal.php");
			
		} 
	}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<form action="" method="post">
  <table id="title" align="center"      style="background-image: url('1.jpg');" border=4 >
  
    <tr>
      <td>First Name:</td>
        <td><input type="text" name="fname" />
		<span class="error"><?php echo $fnameErr;?></span>
   </td>
      </tr>
    <tr>
      <td>Last Name:</td>
        <td><input type="text" name="lname" />
		<span class="error"> <?php echo $lnameErr;?></span>
   </td>
      </tr>
    <tr>
      <td>Email:</td>
        <td><input type="text" name="email" />
		<span class="error"> <?php echo $emailErr;?></span>
   </td>
      </tr>
    <tr>
      <td>Username:</td>
        <td><input type="text" name="username" />
		<span class="error"> <?php echo $usernameErr;?></span>
   </td>
      </tr>
    <tr>
      <td>Password:</td>
        <td><input type="password" name="password" />
		<span class="error"> <?php echo $passwordErr;?></span>
   </td>
      </tr>
    <tr>
        <td align =center colspan=2><input type="submit" name="submit" value="Sign Up" /></td>
      </tr>
  

	  </table>
</form>
  </div>




</div>


<div id="bottom">
<marquee  >
<font style="font-size: 25px;padding-top: 10px">IMDB 2015.</font></marquee>
</div>





</div>

</body>
</html>
