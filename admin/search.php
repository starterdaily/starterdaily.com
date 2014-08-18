<?php

    include_once 'app/view/session.php';      
    require_once 'app/view/view.php';

	$search_string  = preg_replace("/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/", " ", $_POST['query']);
	$section_string = preg_replace("/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/", " ", $_POST['section']);


if (strlen($search_string) >= 1 && $search_string !== ' ') {
	$query = "SELECT stp_id , stp_name  FROM st_startpage WHERE stp_name LIKE '%$search_string%'";
	$result = mysql_query($query);
	while($row=mysql_fetch_array($result)) {
		$fname=$row['stp_name'];
		$pro=$row['stp_id'];
	?>


	<div class="display_box" >
		<h5 class='addname' id="<?php echo $fname; ?>" title='<?php echo $fname; ?>&nbsp;<?php echo $pro; ?>'>
		<?php echo $fname; ?></h5>
		<a href="javascript:void(0)" id="addpre">Agregar</a>
		<input type="hidden" value="<?php echo $pro ?>" id="valor">
		<input type="hidden" value="<?php echo $fname ?>" id="namepre">
	</div>

	<script type="text/javascript">
		$('#addpre').click(function(){

    	var $databook = $('#valor').val();
    	var $namepre  = $('#namepre').val();
    	$('#idPresenter').val($databook); 
    	$('#searchpro').val($namepre); 
    	$('#resultados').hide();

    	return false;   });
	</script>
	<?php
	}
	if (@$fname =='') {
		echo $noexiste = '<div class="no_register"><p>No hay empresas con ese nombre. ¿deseas <a href="#">crearlo</a>?</div></p>';


	}

		
	}
	?>