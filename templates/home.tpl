{include 'head.tpl'}

{include 'navbar.tpl'};


{if $error}
    <div class="mt-2 alert alert-danger">
        {$error}
    </div>
{/if}

<div class="container">

    {if $admin === 0}
        <h1 class="text-center">Reserva una habitación</h1>

        <h3 class="mt-5 text-center">Busqueda por fecha</h3>
        <form action='searchRooms' class="container-fluid" method="POST" enctype="multipart/form-data">
            
            <div class="form-group text-center mt-4">
                <label for="exampleFormControlInput1" class="form-label">Desde</label>
                <input class="form-control-sm m-1" type="date" placeholder="Seleccione fecha" name="check_in" id="check_in" aria-label="Search">
            </div>

            <div class="form-group text-center">
                <label for="exampleFormControlInput1" class="form-label mt-3">Hasta</label>
                <input class="form-control-sm m-1" type="date" placeholder="Seleccione fecha" name="check_out" aria-label="Search">
            </div>

            <div class="form-group text-center mt-3">
                <button class="btn btn-success" type="submit">Buscar</button>
            </div>
        </form>
    {else}

    <h3>Esta sección está reservada para que los usuarios puedan realizar reservaciones</h3>

    {/if}

</div>


{include 'footer.tpl'}