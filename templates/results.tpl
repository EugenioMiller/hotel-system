{include 'head.tpl'}

{include 'navbar.tpl'};

<div class="container">
    <h2>Seleccione la habitación que desea reservar</h2>

    <table class="table table-striped table-info">
            <td class= "titleTable">Número de habitación</td>
            <td class= "titleTable">Cantidad de camas</td>
            <td class="titleTable">Aire acondicionado</td>
            <td class="titleTable">Tiene TV</td>
            <td class="titleTable">Tiene wifi</td>
            <td class="titleTable">Precio</td>
            <td class="titleTable">Reservar</td>

                {foreach $rooms item=room}
                    <tr>
                        <td class="room"><b>{$room->room_number}</b></td>
                        <td class="room"><b>{$room->beds}</b></td>
                        <td class="room">{$room->air}</td>
                        <td class="room">{$room->tv}</td>
                        <td class="room">{$room->wifi}</td>
                        <td class="room">{$room->price}</td>
                        <td> <a class="btn btn-success" href="reserveRoom/{$room->room_number}/{$user_id}/{$check_in}/{$check_out}">Realizar reserva</a></td>
                    </tr>
                {/foreach}
    </table>
</div>

{include 'footer.tpl'}