{include 'head.tpl'}

<div class="container">

    
    {if $name}
        <div class="mt-2 alert alert-success">
            El usuario de {$surname}, {$name} ha sido creado correctamente
        </div>
    {/if}

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

            {if $error}
                <div class="mt-2 alert alert-danger">
                    {$error}
                </div>
            {/if}
    </form>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <p>O, para realizar una reserva, registrese</p>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="register"><button class="mt-2 btn btn-info btn-sm">Registrarse</button></a>
    </div>
</div>
{include 'footer.tpl'}