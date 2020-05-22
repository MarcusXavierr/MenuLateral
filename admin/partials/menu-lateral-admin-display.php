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
    Para usar basta entrar na aba de configurações (Settings) e adicionar as url e os nomes dos links que você deseja exibir no menu lateral do site
    </div>

    <?php 
        if (!$wpdb->get_var("SHOW TABLES LIKE {$wpdb->prefix}menuLateral") == $wpdb->menuLateral)
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
        else
        {
            $results = $wpdb->get_results("SELECT url,link FROM {$wpdb->prefix}menuLateral");
    ?>
        <h4 class="mt-5">
            Veja abaixo uma listagem dos links que estão no menu atualmente
        </h4>
           <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Url</th>
                    <th scope="col">Nome do link</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($results as $result){ ?>
                    <tr>
                    <td><?=$result->url?></td>
                    <td><?=$result->link?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

    <?php
        }
    ?>
</div>