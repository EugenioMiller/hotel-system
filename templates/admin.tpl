{include 'head.tpl'}

{include 'navbar.tpl'};

<div class="container">
    <h1>Administrar</h1>

    <table class="table table-striped table-primary">
            <td class="titleTable">Número de habitación</td>
            <td class="titleTable">Cantidad de camas</td>
            <td class="titleTable">Aire acondicionado</td>
            <td class="titleTable">Tiene TV</td>
            <td class="titleTable">Tiene wifi</td>
            <td class="titleTable">Precio</td>
            <td class="titleTable">Editar</td>
            <td class="titleTable">Eliminar</td>

                {foreach $rooms item=room}
                    <tr>
                        <td class="room"><b>{$room->room_number}</b></td>
                        <td class="room"><b>{$room->beds}</b></td>
                        <td class="room">
                            {if $room->air === 1}
                            SI
                            {else}
                            NO
                            {/if}
                        </td>
                        <td class="room">
                            {if $room->tv === 1}
                            SI
                            {else}
                            NO
                            {/if}
                        </td>
                        <td class="room">
                            {if $room->wifi === 1}
                            SI
                            {else}
                            NO
                            {/if}
                        </td>
                        <td class="room">{$room->price}</td>
                        <td class="room"> <a class="btn btn-outline-success" href="editRoom/{$room->room_number}">Editar</a></td>
                        <td class="room"> <a class="btn btn-outline-danger" href="deleteRoom/{$room->room_number}">Eliminar</a></td>
                    </tr>
                {/foreach}
    </table>


        <div class= "col-md-3">
            <a href="addRoom"><button type="button" class="btn btn-primary">Agregar habitación</button></a> 
        </div>
</div>

{include 'footer.tpl'}