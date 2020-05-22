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

global $wpdb;
$links = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}menuLateral");
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="../wp-content/plugins/menu-lateral/admin/js/menu-lateral-admin.js"></script>

<div class="wrap">
    <div id="icon-themes" class="icon32"></div>  
    <h2>Menu Lateral</h2>  
    <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
    <h3>Bem vindo ao plugin Menu-lateral!</h3>
    <div>
    Para usar basta entrar na aba de configurações e adicionar as url e os nomes dos links que você deseja exibir no menu lateral do site
    </div>

    <?php 
        if ($wpdb->prefix)
        {
    ?>
        <br>
        <div>
            <div class="text-danger">
            percebi que você não tem uma tabela no banco de dados para criar sua tabela, por favor cole o seguinte codigo no seu banco de dados e execute-o
            </div>
            <br>
            Create table if not exists <?=$wpdb->prefix?>menuLateral(
            id int NOT NULL AUTO_INCREMENT,
            url varchar(250),
            link varchar(100),
            PRIMARY KEY  (id)
            )<?=$wpdb->get_charset_collate()?>;
        </div>
    <?php
        }
    ?>
    <body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<? foreach($links as $link) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $link->id ?>">
											<?= $link->url ?> (<?= $link->link ?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $link->id ?>)"></i>
											
											<? if(true) { ?>
												<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $link->id ?>, '<?= $link->link ?>')"></i>
												<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $link->id ?>)"></i>
											<? } ?>
										</div>
									</div>

								<? } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</div>