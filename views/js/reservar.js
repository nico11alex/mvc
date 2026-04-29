const today = new Date().toISOString().split('T')[0];
document.getElementById('fecha_inicio').min = today;
document.getElementById('fecha_fin').min = today;

document.getElementById('fecha_inicio').addEventListener('change', function () {
    document.getElementById('fecha_fin').min = this.value;
    document.getElementById('fecha_fin').value = '';
});

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

function goStep(step) {
    if (step === 3) {
        document.getElementById('reservaForm').submit();
    }
}