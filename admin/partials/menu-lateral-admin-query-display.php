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
// function varDump($data)
// {
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// }

function message($message,$type)
{
    if($type == 1)
    {
    ?>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <div class="alert alert-success" role="alert">
        <?=$message?>
        </div>
    <?php
    }
    else
    {
    ?>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <div class="alert alert-danger" role="alert">
        <?=$message?>
        </div>
    <?php
    }
}


function delete_link()
{
    global $wpdb;
    $id = $_POST['id'];
    $wpdb->delete("{$wpdb->prefix}menuLateral",array('id' => $id));
    return true;
}

function update_link()
{
    global $wpdb;
    $id = $_POST['id'];
    $url = $_POST['url'];
    $link_name = $_POST['link_name'];
    $wpdb->update("{$wpdb->prefix}menuLateral", 
    array('url' => $url, 'link' => $link_name),
    array('id' => $id)
    );
    return true;
}
function create_link()
{
    global $wpdb;
    $url = $_POST['url'];
    $link_name = $_POST['link_name'];

    $table_name = $wpdb->prefix . 'menuLateral';

    if($_POST['url'] && $_POST['link_name'])
    {
        $wpdb->insert(
            $table_name,
            [
                'url' => $url,
                'link' => $link_name
            ]
        );

        return true;
    }

    return false;
}

if (isset($_POST['btn-value']))
{
    if ($_POST['btn-value'] == 'create')
    {
        if(create_link())
        {
            $message = "Link criado com sucesso";
            message($message,1);
        }
        else
        {
            message('Problema ao criar link, por favor tente novamente',0);
        }
    }

    if ($_POST['btn-value'] == 'delete')
    {
        if(delete_link())
        {
            message('Link apagado com sucesso',1);
        }
        else
        {
            message('Problema ao deletar link, por favor tente novamente',0);
        }
    }

    if ($_POST['btn-value'] == 'update')
    {
        if (update_link())
        {
            message('Link atualizado com sucesso',1);
        }
        else
        {
            message('Problema ao atualizar link, por favor tente novamente',0);
        }
    }
}

else
{
    message('Nada a ser feito',1);
}

?>


