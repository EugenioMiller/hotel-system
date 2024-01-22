<?php
/* Smarty version 4.3.4, created on 2024-01-22 14:39:01
  from 'C:\xampp\htdocs\hotel-system\templates\loginForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ae6ff5a34635_77977231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91180e70a60f11153dff8a999f5fbeb3f85e8fbc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel-system\\templates\\loginForm.tpl',
      1 => 1705930739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_65ae6ff5a34635_77977231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    
    <?php if ($_smarty_tpl->tpl_vars['name']->value) {?>
        <div class="mt-2 alert alert-success">
            El usuario de <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 ha sido creado correctamente
        </div>
    <?php }?>

    <h2 class="text-center mt-5">Iniciar sesión</h2>
    
    <form method="POST" action="verifyUser" class="col-md-4 offset-md-4 mt-4">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" placeholder="Ingrese email" autocomplete="none" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
                <div class="mt-2 alert alert-danger">
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                </div>
            <?php }?>
    </form>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <p>O, para realizar una reserva, registrese</p>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="register"><button class="mt-2 btn btn-info btn-sm">Registrarse</button></a>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
