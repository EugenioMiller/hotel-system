{include 'head.tpl'}

{include 'navbar.tpl'};


{if $error}
    <div class="mt-2 alert alert-danger">
        {$error}
    </div>
{/if}

<div class="container">
    <h3>Editar habitación número {$room->room_number}</h3>

    
    <form action='saveChanges/{$room->room_number}' method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="">Cantidad de camas</label>
            <input type="number" name="beds" value="{$room->beds}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
        </div>
        
        <div class="form-group">
            <label for="">Aire acondicionado</label>
            <select class="form-control" name="air" id="exampleFormControlSelect1">
                {if $room->air === 1}
                <option value="1" selected>SI</option>
                <option value="0">NOI</option>
                {else}
                <option value="1" >SI</option>
                <option value="0" selected>NO</option>
                {/if}
            </select>
        </div>

        <div class="form-group">
            <label for="">Televisión</label>
            <select class="form-control" name="tv" id="exampleFormControlSelect1">
                {if $room->tv === 1}
                <option value="1" selected>SI</option>
                <option value="0">NO</option>
                {else}
                <option value="1" >SI</option>
                <option value="0" selected>NO</option>
                {/if}
            </select>
        </div>

        <div class="form-group">
            <label for="">Wifi</label>
            <select class="form-control" name="wifi" id="exampleFormControlSelect1">
                {if $room->wifi === 1}
                <option value="1" selected>SI</option>
                <option value="0">NO</option>
                {else}
                <option value="1" >SI</option>
                <option value="0" selected>NO</option>
                {/if}
            </select>
        </div>


        <div class="form-group">
            <label for="">Precio</label>
            <input type="number" name="price" value="{$room->price}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
        </div>
        
        
        <input type="submit" value="Guardar cambios" class="btn btn-primary btnGuardarCambios mt-2">
    </form>
</div>


{include 'footer.tpl'}