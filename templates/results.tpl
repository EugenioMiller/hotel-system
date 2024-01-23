{include 'head.tpl'}

{include 'navbar.tpl'};

<div class="container">

    {if $rooms}
    <h2 class="text-center">Seleccione la habitación que desea reservar</h2>

    <div class="d-flex justify-content-evenly mt-5">
    {foreach $rooms item=room}
        <div class="card" style="width: 18rem;">
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
                <a href="reserveRoom/{$room->room_number}/{$user_id}/{$check_in}/{$check_out}" class="btn btn-success">Realizar reserva</a>
            </div>
        </div>
    {/foreach}
    </div>

    {else}

    <h3>Actualmente no hay habitaciones disponibles para las fechas que está buscando. Sepa disculpar las molestias.</h3>

    {/if}
</div>

{include 'footer.tpl'}