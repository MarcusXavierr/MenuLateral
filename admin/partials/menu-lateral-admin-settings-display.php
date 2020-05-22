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
					 $results = $wpdb->get_results("SELECT url,link FROM {$wpdb->prefix}menuLateral;");
				 ?>  
    <form method="POST" action="admin.php?page=menu-lateral-query">
		<div class="mb-3 mt-2 d-flex">
			<div class="btn btn-primary" onclick="adicionar()">Adicionar link</div>
			<div class="btn btn-danger" onclick="remover()">Remover link</div>
		</div> 
		<?php foreach($results as $result) { ?>
			 
		<div class="campo">	
		<div class="form-group">
			<label for="">URL</label>
			<input type="text" class="form-control" name="url" placeholder="Insira a URL da página" value="<?=$result->url?>">
		</div>
		<div class="form-group">
			<label for="">Nome</label>
			<input type="text" class="form-control" name="link_name" placeholder="Insira a o nome da página" value="<?=$result->link?>">
		</div>
		</div>
		<div id="novosCampos"></div>  
		<?php } ?>
		<button onclick="submit()" class="btn btn-success">
			Enviar
		</button>
		
		<div>
		
		</div>        
       
    </form> 
</div>
<script>
	function adicionar()
	{
		var campo = document.getElementById('novosCampos');
		campo.innerHTML += '<div class="campo"><div class="form-group"><label for="">URL</label><input type="text" class="form-control" name="url" placeholder="Insira a URL da página"></div><div class="form-group"><label for="">Nome</label><input type="text" class="form-control" name="link_name" placeholder="Insira a o nome da página"></div></div>'
	}

	function remover()
	{
		
			var campos = document.getElementsByClassName('campo');
			var lastCampo = campos.length - 1
			campos[lastCampo].innerHTML = "";
			var lastCampo = campos.lenght - 1
			campos = document.getElementsByClassName('campo');
	}
</script>