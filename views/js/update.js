const fechaInicio = document.getElementById('fecha_inicio');
const fechaFin = document.getElementById('fecha_fin');

if(fechaInicio && fechaFin){
    const today = new Date().toISOString().split('T')[0];
    fechaInicio.min = today;
    fechaFin.min = today;
    fechaInicio.addEventListener('change', function(){
        fechaFin.min = this.value;
        fechaFin.value = '';
    });
}


let tipoHabitacion = document.getElementById("categoria_id");
let numeroHabitacion = document.getElementById("habitacion_id")

tipoHabitacion.addEventListener("change", async () => {
    try {
        const response = await fetch(`index.php?action=rooms&tipoRoom=${tipoHabitacion.value}`);
        const text = await response.text();
        const result = JSON.parse(text);
        const habitaciones = result.data;
        numeroHabitacion.innerHTML = '<option value="">Seleccione una habitacion</option>';
        habitaciones.forEach((habitacion) => {
            numeroHabitacion.innerHTML += `<option value="${habitacion.id}">Habitacion ${habitacion.num_habitacion}</option>`;
        });
    } catch (error) {
        console.log(error);
    }
});