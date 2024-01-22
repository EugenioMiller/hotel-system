<?php
/* Smarty version 4.3.4, created on 2024-01-22 19:24:08
  from 'C:\xampp\htdocs\hotel-system\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65aeb2c8e7a857_27741231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d589b4a8740b6ebd9073de91df95f3bc694d866' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel-system\\templates\\home.tpl',
      1 => 1705947737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_65aeb2c8e7a857_27741231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;


<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <div class="mt-2 alert alert-danger">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
<?php }?>

<div class="container">
    <h1>Reserva una habitación</h1>

    <h3 class="mt-2">Busqueda por fecha</h3>
    <form action='searchRooms' method="POST" enctype="multipart/form-data">
        
        <label for="exampleFormControlInput1" class="form-label">Desde</label>
        <input class="form-control" type="date" placeholder="Seleccione fecha" name="check_in" id="check_in" aria-label="Search">
        
        <label for="exampleFormControlInput1" class="form-label mt-2">Hasta</label>
        <input class="form-control" type="date" placeholder="Seleccione fecha" name="check_out" aria-label="Search">
        
        <button class="btn btn-success mt-2" type="submit">Buscar</button>
    </form>

</div>


<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
