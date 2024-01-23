{include 'head.tpl'}

{include 'navbar.tpl'};

{if $error}
    <div class="mt-2 alert alert-danger">
        {$error}
    </div>
{/if}

<div class="container">
    <h3>Complete todos los datos para crear una nueva habitación</h3>

    <form action='createRoom' method="POST" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label for="" class="form-label">Número</label>
            <input type="number" name="room_number" class="form-control" id="" aria-describedby="emailHelp" placeholder="Número de la habitación" autocomplete="off">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Camas</label>
            <input type="number" name="beds" class="form-control" id="exampleInputPassword1" placeholder="Cantidad de camas" autocomplete="off">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Tiene aire acondicionado</label>
            <select name="air" class="form-group col-md-4">
                <option value="1" selected> SI</option>
                <option value="0">NO</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tiene televisióno</label>
            <select name="tv" class="form-group col-md-4">
                <option value="1" selected> SI</option>
                <option value="0">NO</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Tiene wifi</label>
            <select name="wifi" class="form-group col-md-4">
                <option value="1" selected> SI</option>
                <option value="0">NO</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input step="any" type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Precio" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Imagen</label>
            <input type="text" name="img" class="form-control" id="exampleInputPassword1" placeholder="Agregue el link de la imagen" autocomplete="off">
        </div>

        <input type="submit" value="Agregar habitación" class="btn btn-success">
    </form>


    <div class= "d-flex justify-content-start mt-4">
        <a href="admin"><button type="button" class="btn btn-primary">Volver</button></a> 
    </div>
    
</div>



{include 'footer.tpl'}