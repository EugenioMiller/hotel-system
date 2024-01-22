// Esperamos a la carga del DOM 
window.addEventListener('DOMContentLoaded', (evento) => {
    //Obtenemos la fecha de hoy en formato ISO 
    const check_in = new Date().toISOString().substring(0, 10);
    // Buscamos la etiqueta, ya sea por ID (que no tiene) o por su selector 
    document.querySelector("input[name='check_in']").min = check_in;

    //Espero a que cambie el valor del primer input
    document.getElementById("check_in").addEventListener("change", function() {
        //Obtengo la fecha del primer input
        let date = this.value
        console.log(date)
        // Buscamos la etiqueta del segundo input
        document.querySelector("input[name='check_out']").min = date;
    })
});
