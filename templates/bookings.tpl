{include 'head.tpl'}

{include 'navbar.tpl'};

<div class="container">
    <h1 class="text-center">Administrar mis reservas</h1>

    {if $bookings}
    <table class="table table-striped table-primary">
            <td class= "titleTable">Número de habitación</td>
            <td class= "titleTable">Check-in</td>
            <td class= "titleTable">Check-out</td>
            <td class="titleTable">Dar de baja</td>

                {foreach $bookings item=booking}
                    <tr>
                        <td class="room"><b>{$booking->fk_room_number}</b></td>
                        <td class="room"><b>{$booking->check_in}</b></td>
                        <td class="room">{$booking->check_out}</td>
                        <td class="room"> <a class="btn btn-warning" href="deleteBooking/{$booking->booking_id}">Cancelar reserva</a></td>
                    </tr>
                {/foreach}
    </table>
    {else}
    <h3 class="mt-5">Usted no tiene ninguna reserva realizada. Puede reservar haciendo click <a href="home">AQUÍ</a></h3>
    {/if}

</div>

{include 'footer.tpl'}