<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

if (!securePage($_SERVER['PHP_SELF'])){die();}
 
 echo "<div class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#'>Altikamp</a>
        </div>
        <div class='collapse navbar-collapse'>";
//Links for logged in user
if(isUserLoggedIn()) {
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
    <ul class='nav navbar-nav'>
			<li><a href='account.php'><span class='glyphicon glyphicon-home'></span> Home</a></li>
			<li><a href='montanistas.php'><span class='glyphicon glyphicon-tree-conifer'></span> Montañistas</a></li>
			<li><a href='staffs.php'><span class='glyphicon glyphicon-user'></span> Staff</a></li>
			<li><a href='account.php'><span class='glyphicon glyphicon-list'></span> Eventos</a></li>
			<li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-stats'></span> Reportes <b class='caret'></b></a>
        <ul class='dropdown-menu'>
			<li><a href='user_settings.php'>Reportes</a></li>
        </ul>
        </li>
		 <ul class='nav navbar-nav navbar-right'>
      <li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-cog'></span> Configuración <b class='caret'></b></a>
        <ul class='dropdown-menu'>
			<li><a href='user_settings.php'>Mi Cuenta</a></li>
			<li><a href='admin_configuration.php'>Configuración del Sitio</a></li>
			<li><a href='admin_users.php'>Usuarios</a></li>
			<li><a href='admin_permissions.php'>Permisos</a></li>
			<li><a href='admin_pages.php'>Páginas</a></li>
          <li class='divider'></li>
			<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Cerrar Sesión, 
			$loggedInUser->displayname</a></li>
        </ul>
	</ul>";
	}
} 
//Links for users not logged in
else {
	echo "
	<ul class='nav navbar-nav'>
		<li><a href='index.php'><span class='glyphicon glyphicon-home'></span> Home</a></li>
		<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
		<li><a href='register.php'><span class='glyphicon glyphicon-list-alt'></span> Register</a></li>
		<li><a href='forgot-password.php'><span class='glyphicon glyphicon-hand-right'></span> Forgot Password</a></li>";
	if ($emailActivation)
	{
	echo "<li><a href='resend-activation.php'><span class='glyphicon glyphicon-send'></span> Resend Activation Email</a></li>";
	}
	echo "</ul>";
}
       echo " </div><!--/.nav-collapse -->
      </div>
    </div>";
?>
