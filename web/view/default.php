<div id="desktop">
	<div id="menu">
		<a href="javascript: app.openPage('view/project.form.php', '#internal')">Novo Projeto</a> |
		<a href="controller/logout.control.php">Sair</a>
	</div>
	<div id="projects">
		<div class="title">Projetos</div>
		<div id="projects_content">
			<?php
				$includeFile = "view/project.list.php";
				if(!file_exists($includeFile)) {
					$includeFile = "../view/project.list.php";
				}
				require_once($includeFile);
			?>
		</div>
	</div>
	<div id="internal"></div>
</div>
<?php
	$page = $_SESSION["accessPage"]["#internal"];
	if($page):
?>
<script type="text/javascript">
	app.openPage( "<?php echo $page; ?>", "#internal" );
</script>
<?php endif; ?>