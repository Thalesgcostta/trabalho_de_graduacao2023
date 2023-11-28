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

include('include/header.php');
?>
<title>Sistema de Galeria Dinâmica</title>
<style>
        .custom-color {
            color: #eee8aa;
        }
		.text-color {
        color: #84fa84; 
    	}
    </style>
<link rel="stylesheet" href="dist/css/lightbox.min.css">
<script type="text/javascript" src="dist/js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="js/gallery.js"></script>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<?php include('include/container.php'); ?>
<div class="container">
	<div class="row">
		<?php include("top_menu.php"); ?>

		<div class="navbar-collapse gallery">
			<h1>Galeria de Imagens</h1>
			<br>
			<div><a href="upload.php" class="btn btn-success"><strong>Escolher Imagens</strong></a></div>
			<br>
			<ul>
				<?php
				$galleryList = $gallery->getGalleryList();
				while ($image = $galleryList->fetch_assoc()) {
				?>
<li id="gallery_image_<?php echo $image["id"]; ?>" class="text-color">
    <span><?php echo $image["image_description"]; ?></span><br>
    <a href="uploads/<?php echo $image["image_name"]; ?>" data-lightbox="<?php echo $_SESSION['userid']; ?>" data-title="<?php echo $image["image_title"]; ?>">
        <img src="uploads/<?php echo $image["image_name"]; ?>" class="images" width="200" height="200">
    </a>
    <br><br>
    <span class="pull-right">
        <a href="" id="<?php echo $image["id"]; ?>" class="delete"><span class="glyphicon glyphicon-trash custom-color"></span></a>
    </span>
</li>

<style>

</style>

				<?php } ?>
			</ul>
		</div>
	</div>
	<?php include('include/footer.php'); ?>