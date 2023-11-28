<div class="collapse navbar-collapse pull-right" id="navbar">
	<ul class="nav navbar-nav navbar-left">
		<?php if (isset($_SESSION['userid'])) { ?>
			<li>
				<p class="navbar-text"><strong><span style="color: white; font-size: 16px">Bem-vindo</span></strong> <span style="color: white; font-size: 16px">você está logado como <strong><a style="color: #eee8aa;"><?php echo $_SESSION['name']; ?></a></strong> | 
				<a style="color: #eee8aa;" href="gallery.php">Galeria</a> | <a  style="color: #eee8aa;" href="logout.php">Encerrar Sessão</a> | <a style="color: #eee8aa;" href="..\index.html">Voltar para TimeLine</a></p>
			</li>
		<?php } else { ?>
			<li>
				<p class="navbar-text">Você Saiu do Sistema!!</p>
			</li><br>
			<li><a href="index.php">Entrar</a></li>
		<?php } ?>
	</ul>
</div>