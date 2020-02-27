<?php 
session_start();
mysql_connect("localhost","root","");
mysql_select_db("faculty");

if(isset($_REQUEST['login']))
{
  $username=$_REQUEST["username"];
  $password=$_REQUEST["password"];
  $query=mysql_query("select * from users where username='$username' && password='$password'");
  $rowcount=mysql_num_rows($query);
  if($rowcount==true)
  {
    $_SESSION["username"]=$username;
    header('location: post.php');
  }
  else
  {
    echo "Wrong";
  }

}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/faculty_style.css" type="text/css">
	<title>Login</title>
</head>
<body>

<div id="login" class="container">
  <div class="row-fluid">
    <div class="span12">
      <div class="login well well-small">
        <div class="center">
          <img src="images/fcritlogo.png" alt="logo" height="40%" width="40%"> 
        </div>
        <br><br>
        <form class="login-form" id="UserLoginForm" method="post" accept-charset="utf-8">
          <div class="control-group">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>
              <input name="username" required="required" placeholder="Username" maxlength="255" type="text" id="UserUsername"> 
            </div>
          </div>
          <div class="control-group">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-lock"></i></span>
              <input name="password" required="required" placeholder="Password" type="password" id="UserPassword"> 
            </div>
          </div>
          <div class="control-group">
            <label id="remember-me">
              <input type="checkbox" name="data[User][remember_me]" value="1" id="UserRememberMe"> Remember Me?</label>
          </div>
          <div class="control-group">
            <input class="btn btn-primary btn-large btn-block" type="submit" value="Sign in" name="login"> 
          </div>
        </form>
      </div><!--/.login-->
    </div><!--/.span12-->
  </div><!--/.row-fluid-->
</div><!--/.container-->

</body>
</html>

