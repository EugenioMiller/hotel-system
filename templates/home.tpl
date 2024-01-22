{include 'head.tpl'}

{include 'navbar.tpl'};


{if $error}
    <div class="mt-2 alert alert-danger">
        {$error}
    </div>
{/if}

<div class="container">
    <h1>Reserva una habitación</h1>

    <h3 class="mt-2">Busqueda por fecha</h3>
    <form action='searchRooms' method="POST" enctype="multipart/form-data">
        
        <label for="exampleFormControlInput1" class="form-label">Desde</label>
        <input class="form-control" type="date" placeholder="Seleccione fecha" name="check_in" id="check_in" aria-label="Search">
        
        <label for="exampleFormControlInput1" class="form-label mt-2">Hasta</label>
        <input class="form-control" type="date" placeholder="Seleccione fecha" name="check_out" aria-label="Search">
        
        <button class="btn btn-success mt-2" type="submit">Buscar</button>
    </form>

</div>


{include 'footer.tpl'}