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
function varDump($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

varDump($_POST);

function create_table()
{
    try{
        global $wpdb;

    $table_name = $wpdb->prefix . "menuLateral";

    $charset_collate = $wpdb->get_charset_collate();

    

    $sql = "Create table if not exists $table_name(
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            url varchar(250),
            link varchar(100),
            PRIMARY KEY  (id)
            )$charset_collate;";

    require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($sql);
    echo "deu certo";
    }catch(Error $e)
    {
        var_dump($e);
    }
    
}

function menu_lateral_data()
{
    global $wpdb;

    $url = $_POST['url'];
    $link_name = $_POST['link_name'];

    $table_name = $wpdb->prefix . 'menuLateral';

    if($_POST['url'] && $_POST['link_name'])
    {
        echo "funciona";
        $wpdb->insert(
            $table_name,
            [
                'url' => $url,
                'link' => $link_name
            ]
        );
    }
}


function recupera()
{
    global $wpdb;

    $results = $wpdb->get_results("SELECT url,link FROM wp_menuLateral");

    foreach($results as $result)
    {
        echo $result->url;
        echo "<br>";
        echo $result->link;
    }

    //print_r($results);
}

recupera();
//create_table();
//menu_lateral_data();

//register_activation_hook( '', 'menu_lateral_data' );

