{include 'head.tpl'}

{include 'navbar.tpl'};

<div class="container">

    <div class="success">
        <p>La reserva de su habitación de número: {$room_number}, ha sido realizada con éxito</p>

        </br>
        <p>Su check-in se realizará el día: {$check_in}, y su check-out el día: {$check_out}</p>

        </br>
        <p>Muchas gracias.</p>
    </div>

    <a href="home"><button type="button" class="btn btn-info">Regresar al inicio</button></a>

</div>  

{include 'footer.tpl'}