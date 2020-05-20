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
				 <?php settings_errors(); ?>  
    <form method="POST" action="admin.php?page=menu-lateral-query">
		<div class="form-group">
			<label for="">URL</label>
			<input type="text" class="form-control" name="url" placeholder="Insira a URL da página">
		</div>
		<div class="form-group">
			<label for="">Nome</label>
			<input type="text" class="form-control" name="link_name" placeholder="Insira a o nome da página">
		</div>            
        <?php submit_button(); ?>  
    </form> 
</div>