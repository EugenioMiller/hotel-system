{include 'head.tpl'}

    
{if $error}
    <div class="mt-2 alert alert-danger">
        {$error}
    </div>
{/if}

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
                <p style="font-size:14px">La contraseña debe tener al menos: 6 carácteres, una minúscula, una mayúscula, un dígito y debe tener menos de 16 carácteres</p>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">Completar registro</button>
            </div>
    </form>

    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="login"><button class="mt-2 btn btn-info btn-sm">Volver</button></a>
    </div>

</div>
{include 'footer.tpl'}