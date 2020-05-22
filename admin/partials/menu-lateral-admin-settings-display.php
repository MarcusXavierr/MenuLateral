<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       não-possui
 * @since      1.0.0
 *
 * @package    Menu_Lateral
 * @subpackage Menu_Lateral/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="wrap">
		        <div id="icon-themes" class="icon32"></div>  
		        <h2>Configurações menu lateral</h2>  
		         <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
				 <?php 
					 settings_errors(); 
					 global $wpdb;
					 $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}menuLateral;");
				 ?>  
    
		
		<?php foreach($results as $result) { ?>
			<form method="POST" action="admin.php?page=menu-lateral-query">	 
		<div class="campo">	
		<div class="form-group">
			<label for="">URL</label>
			<input type="text" class="form-control" name="url" placeholder="Insira a URL da página" value="<?=$result->url?>">
		</div>
		<input type="hidden" name="id" value="<?=$result->id?>">
		<div class="form-group">
			<label for="">Nome</label>
			<input type="text" class="form-control" name="link_name" placeholder="Insira a o nome da página" value="<?=$result->link?>">
		</div>
		<button type="submit" name="btn-value" value="delete" class="btn btn-danger">Apagar</button>
		<button type="submit" name="btn-value" value="update" class="btn btn-warning">Atualizar</button>
		</div> 
		</form> 
		<?php } ?>
		<form method="POST" action="admin.php?page=menu-lateral-query">	 
		<div class="mb-3 mt-5 d-flex">
			<div class="btn btn-primary" id="add" onclick="adicionar()">Adicionar link</div>
			<div class="btn btn-danger" id="remove" onclick="remover()" style="visibility:hidden">Remover link</div>
			<button onclick="submit()" class="btn btn-success" name="btn-value" value="create">
			Enviar
			</button>
		</div> 
		<div id="novosCampos"></div> 
	      
       
		</form> 
</div>
<script>
	function adicionar()
	{
		var campo = document.getElementById('novosCampos');
		campo.innerHTML += '<div class="campo"><div class="form-group"><label for="">URL</label><input type="text" class="form-control" name="url" placeholder="Insira a URL da página"></div><div class="form-group"><label for="">Nome</label><input type="text" class="form-control" name="link_name" placeholder="Insira a o nome da página"></div></div>'
		document.getElementById("add").style.visibility = "hidden";
		document.getElementById("remove").style.visibility = "visible";
	}

	function remover()
	{
		
			var campos = document.getElementsByClassName('campo');
			var lastCampo = campos.length - 1
			campos[lastCampo].innerHTML = "";
			var lastCampo = campos.lenght - 1
			campos = document.getElementsByClassName('campo');
			document.getElementById("add").style.visibility = "visible";
			document.getElementById("remove").style.visibility = "hidden";

	}
</script>