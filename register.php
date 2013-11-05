<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
	$displayname = trim($_POST["displayname"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
	
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	if(minMaxRange(5,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($username)){
		$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
	}
	if(minMaxRange(5,25,$displayname))
	{
		$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($displayname)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new User($username,$displayname,$password,$email);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$user->userCakeAddUser())
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $user->success;
	}
}

require_once("models/header.php");
include("nav.php");
echo resultBlock($errors,$successes);
?>
<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<?php echo "<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'> ";?>
  <div class="form-group">
    <label for="username">Usuario:</label>
    	<input type='text' name='username' class='form-control' placeholder="Ejemplo: admin" />
  </div>
  <div class="form-group">
    <label for="displayname">Nombre para mostrar:</label>
    	<input type='text' name='displayname' class='form-control' placeholder="Ejemplo: Admnistrador" />
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    	<input type='password' id='password' name='password' class='form-control' placeholder="8 a 25 Caracteres" />
  </div>
  <div class="form-group">
    <label for="passwordc">Confimar Password:</label>
    	<input type='password' name='passwordc' class='form-control' placeholder="Confirmar el Password" />
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    	<input type='text' name='email' class='form-control' placeholder="E-mail Valido" />
  </div>
  <div class="form-group">
    <label for="captcha">Captcha: <?php echo "<img src='models/captcha.php'>"; ?></label>
    	<input type='text' name='captcha' class='form-control' placeholder="Captcha" />
  </div>
  <button type="submit" class="btn btn-default">Registrar</button>
</form>
</div>
</div>
</div>
 <script>
    var form = $('form');
      form.validate({
        rules: {
            'username': {
                required: true,
                minlength: '5',
                maxlength: '25'
            },
            'displayname': {
                required: true,
                minlength: '5',
                maxlength: '25',
                alphanumeric: true
            },
            'password': {
                required: true,
                minlength: '8',
                maxlength: '50'
            },
            'passwordc': {
                required: true,
                minlength: '8',
                maxlength: '50',
                equalTo: "#password"
            },
            'email': {
                required: true,
                email: true
            },
            'captcha': {
                required: true
            }
          }
      });
  </script>

<?php
require_once("models/footer.php");
?>
