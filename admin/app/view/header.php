<?php	$ruta = $_SERVER["REQUEST_URI"];
		@list($raiz, $folder, $foldertwo, $section, $action) = explode("/", $ruta);

		?>

	<section class="panelMain">
		<ul class="mainPrincipal"> 
			<div class="panelLogotipo">				
				<img src="<?php echo $admin_url ?>/images/logo.png" alt="">
			</div>

			<li title="dashboard"><a href="<?php echo $admin_url ?>dashboard"><i class="icon dash"></i></a></li>
			<li><a href=""><i class="icon usua"></i></a></li>
			<li><a href=""><i class="icon ana"></i></a></li>
			<li><a href="<?php echo $admin_url ?>articles/"><i class="icon art"></i></a></li>
			<li><a href="<?php echo $admin_url ?>jobs"><i class="icon ofla"></i></a></li>
			<li><a href="<?php echo $admin_url ?>team"><i class="icon team"></i></a></li>
			<li><a href=""><i class="icon config"></i></a></li>
		</ul>
	</section>

	