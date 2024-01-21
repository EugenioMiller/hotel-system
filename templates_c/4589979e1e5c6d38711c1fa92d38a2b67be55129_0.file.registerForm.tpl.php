<?php
/* Smarty version 4.3.4, created on 2024-01-21 21:02:46
  from 'C:\xampp\htdocs\hotel-system\templates\registerForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ad78665a36a5_34311742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4589979e1e5c6d38711c1fa92d38a2b67be55129' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel-system\\templates\\registerForm.tpl',
      1 => 1705867363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_65ad78665a36a5_34311742 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <h2 class="text-center mt-5"> Registrarse </h2>


    <form method="POST" action="registerComplete" class="col-md-4 offset-md-4 mt-4">

            <div class="mb-3">
                <label for="textInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="name" placeholder="Ingrese su nombre" autocomplete="none" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="textInputEmail1" class="form-label">Apellido</label>
                <input type="text" name="surname" placeholder="Ingrese su apellido" autocomplete="none" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" placeholder="Ingrese email" autocomplete="none" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cree una contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" autocomplete="none" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">Completar registro</button>
            </div>
    </form>

    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="login"><button class="mt-2 btn btn-info btn-sm">Volver</button></a>
    </div>

</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
