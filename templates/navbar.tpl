<nav class="navbar navbar-light bg-ligh" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">🏨</a>
    <ul class="navbar-nav d-flex flex-row bd-highlight">
        {if $admin === 1}
        <li class="nav-item">
            <a class="nav-link active p-2 mt-2" href="admin">Administración</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active p-2 mt-2" href="bookings">Reservaciones</a>
        </li>
        {else}
        <li class="nav-item">
            <a class="nav-link active p-2 mt-2" href="adminReserves/{$user_id}">Mis reservas</a>
        </li>
        {/if}
        <li class="nav-item">
            <a class="nav-link active p-2 mt-2" href="logout">Cerrar sesión</a>
        </li>
    </ul>  
  </div>
</nav>