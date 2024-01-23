{include 'head.tpl'}

{include 'navbar.tpl'}

<div class="container">

    <div class= "d-flex justify-content-start mt-4">
        <a href="addRoom"><button type="button" class="btn btn-primary">+Agregar habitación</button></a> 
    </div>

    <div class="d-flex flex-wrap justify-content-evenly mb-5">
    {foreach $rooms item=room}
        <div class="card mt-4" style="width: 18rem;">
        <img src="{$room->img}" class="card-img-top" alt="Imagen de habitación ">
            <div class="card-body">
                <h5 class="card-title">Habitación {$room->room_number} / ${$room->price}</h5>
                <p class="card-text">
                Camas: {$room->beds}.
                </br>
                {if $room->air === 1}
                Cuenta con aire acondicionado.
                {else}
                No cuenta con aire acondicionado. 
                {/if}
                </br>
                {if $room->tv === 1}
                Cuenta con televisión.
                {else}
                No cuenta con televisión. 
                {/if}
                </br>
                {if $room->wifi === 1}
                Cuenta con wifi.
                {else}
                No cuenta con wifi. 
                {/if}
                </p>
                <a class="btn btn-success" href="editRoom/{$room->room_number}">Editar</a>
                <a class="btn btn-danger" href="deleteRoom/{$room->room_number}">Eliminar</a>
            </div>
        </div>
    {/foreach}
    </div>


</div>

{include 'footer.tpl'}