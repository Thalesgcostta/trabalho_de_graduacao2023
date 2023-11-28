<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Gallery.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (!$user->loggedIn()) {
	header("Location: index.php");
}

$gallery = new Gallery($db);

$message = '';
if (isset($_POST["upload"]) && $_SESSION["userid"]) {
	$image_title = $_POST["image_title"];
	$img_description = $_POST["img_description"];
	$fk_uid = $_SESSION["userid"];
	$image_name = $_FILES["uploaded_file"]["name"];
	if (
		$_FILES["uploaded_file"]["type"] == "image/gif"
		|| $_FILES["uploaded_file"]["type"] == "image/jpeg"
		|| $_FILES["uploaded_file"]["type"] == "image/pjpeg"
		|| $_FILES["uploaded_file"]["type"] == "image/png"
		&& $_FILES["uploaded_file"]["size"] < 20000
	) {
		if ($_FILES["uploaded_file"]["error"] > 0) {
			$message = "Código:" . $_FILES["uploaded_file"]["error"] . "<br />";
		} else {
			$i = 1;
			$success = false;
			$new_image_name = $image_name;
			while (!$success) {
				if (file_exists("uploads/" . $new_image_name)) {
					$i++;
					$new_image_name = $i . "_" . $image_name;
				} else {
					$success = true;
				}
			}

			move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], "uploads/" . $new_image_name);

			$gallery->image_title = $image_title;
			$gallery->description = $img_description;
			$gallery->image_name = $image_name;
			$gallery->insert();
			$message = "Imagem salva com sucesso";
		}
	} else {
		$message = "Formato de arquivo não suportado";
	}
}
include('include/header.php');
?>
<title>Galeria Dinâmica</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<?php include('include/container.php'); ?>
<div class="container">
	<?php include("top_menu.php"); ?>
	<br><br>
	<br><br>
	<h1>Tela para Upload de imagens</h1>
	<br><br>
	<?php
	if ($message != '') {
		echo "<div class='text-info'><strong>" . $message . "</strong></div><br>";
	}
	?>
	<form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<div class="form-group">
				<label style="color: #ccff33;" for="name">Título:</label>
				<input type="text" name="image_title" placeholder="Título da Imagem" class="form-control" />
			</div>
			<div class="form-group">
				<label style="color: #ccff33;" for="name">Descrição:</label>
				<input type="text" name="img_description" placeholder="Descrição da Imagem" class="form-control" />
			</div>
			<div class="form-group">
				<label style="color: #ccff33;" for="name">Selecionar:</label>
				<input type="file" name="uploaded_file" placeholder="Selecione" class="form-control" />
			</div>
			<div class="form-group">
				<input type="submit" name="upload" value="Enviar" class="btn btn-success" />
			</div>
		</fieldset>
	</form>
	<span class="text-danger"><?php if (isset($error_message)) {
									echo $error_message;
								} ?></span>
</div>
<?php include('include/footer.php'); ?>