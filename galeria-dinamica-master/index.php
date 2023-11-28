<?php
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($user->loggedIn()) {
	header("Location: gallery.php");
}

$loginMessage = '';
if (!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
	$user->email = $_POST["email"];
	$user->password = $_POST["password"];
	if ($user->login()) {
		header("Location: gallery.php");
	} else {
		$loginMessage = 'Email ou senha incorretos';
	}
}

include('include/header.php');
?>
<title>Sistema de Galeria Dinâmica</title>
<?php include('include/container.php'); ?>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<div class="container">
	<h1>Sistema de Galeria Dinâmica</h1>
	<br>
	<br>
	<div class="col-md-4">
		<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
			<fieldset>
				<legend style="color: #ccff33;"> Insira suas Credenciais</legend>
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>
				<?php } ?>
				<div class="form-group">
					<label style="color: #ccff33;" for="name">Email</label>
					<input type="text" name="email" placeholder="Seu email" required class="form-control" />
				</div>
				<div class="form-group">
					<label style="color: #ccff33;" for="name">Senha</label>
					<input type="password" name="password" placeholder="Sua senha" required class="form-control" />
				</div>
				<div class="form-group">
					<input type="submit" name="login" value="Entrar" class="btn btn-success" />
				</div>
			</fieldset>
		</form>
	</div>

</div>
<?php include('include/footer.php'); ?>