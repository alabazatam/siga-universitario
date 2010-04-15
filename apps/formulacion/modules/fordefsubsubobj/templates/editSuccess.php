<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 13:12:48
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Políticas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefsubsubobj/edit_header', array('fordefsubsubobj' => $fordefsubsubobj)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefsubsubobj/edit_messages', array('fordefsubsubobj' => $fordefsubsubobj, 'labels' => $labels)) ?>
<?php include_partial('fordefsubsubobj/edit_form', array('fordefsubsubobj' => $fordefsubsubobj, 'equilibrio' => $equilibrio, 'subobjetivo' => $subobjetivo, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefsubsubobj/edit_footer', array('fordefsubsubobj' => $fordefsubsubobj)) ?>
</div>

</div>