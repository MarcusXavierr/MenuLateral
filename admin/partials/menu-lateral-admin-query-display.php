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

    return true;
}

if (menu_lateral_data())
{
    echo "<h1>Link criado com sucesso!</h1>";
}




