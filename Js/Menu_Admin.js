// Variable para almacenar la opción seleccionada
var seccionSeleccionada = '';

// Función para actualizar las URLs de los botones "Editar" y "Nuevo"
function actualizarAcciones() {
    var editarBtn = document.getElementById('btn-editar');
    var nuevoBtn = document.getElementById('btn-nuevo');

    // Dependiendo de la sección seleccionada, cambiar los enlaces
    if (seccionSeleccionada === 'docentes') {
        editarBtn.href = 'Editar_Docente.html';
        nuevoBtn.href = 'Agregar_Docente.html';
        mostrarDatosDocentes();
    } else if (seccionSeleccionada === 'medios') {
        editarBtn.href = 'Editar_Medio.html';
        nuevoBtn.href = 'Agregar_Medio.html';
        mostrarDatosMedios();
    } else if (seccionSeleccionada === 'aulas') {
        editarBtn.href = 'Editar_Aula.html';
        nuevoBtn.href = 'Agregar_Aula.html';
        mostrarDatosAulas();
    } else if (seccionSeleccionada === 'reportes') {
        editarBtn.href = 'Editar_Reporte.html';
        nuevoBtn.href = 'Agregar_Reporte.html';
        mostrarGrafico(); // Mostrar gráfico solo
    } else {
        // Si no hay ninguna opción seleccionada, deshabilitar los enlaces
        editarBtn.href = '#';
        nuevoBtn.href = '#';
    }
}

// Función para mostrar los datos de docentes
function mostrarDatosDocentes() {
    var dataButtons = document.getElementById('data-buttons');
    dataButtons.innerHTML = `
        <button class="btn">Docente 1</button>
        <button class="btn">Docente 2</button>
        <button class="btn">Docente 3</button>
        <button class="btn">Docente 4</button>
        <button class="btn">Docente 5</button>
        <button class="btn">Docente 6</button>
        <button class="btn">Docente 7</button>
        <button class="btn">Docente 8</button>
        <button class="btn">Docente 1</button>
        <button class="btn">Docente 2</button>
        <button class="btn">Docente 3</button>
        <button class="btn">Docente 4</button>
        <button class="btn">Docente 5</button>
        <button class="btn">Docente 6</button>
        <button class="btn">Docente 7</button>
        <button class="btn">Docente 8</button>
        <button class="btn">Docente 1</button>
        <button class="btn">Docente 2</button>
        <button class="btn">Docente 3</button>
        <button class="btn">Docente 4</button>
        <button class="btn">Docente 5</button>
        <button class="btn">Docente 6</button>
        <button class="btn">Docente 7</button>
        <button class="btn">Docente 8</button>
        <button class="btn">Docente 1</button>
        <button class="btn">Docente 2</button>
        <button class="btn">Docente 3</button>
        <button class="btn">Docente 4</button>
        <button class="btn">Docente 5</button>
        <button class="btn">Docente 6</button>
        <button class="btn">Docente 7</button>
        <button class="btn">Docente 8</button>
    `;
    dataButtons.style.display = 'grid'; // Mostrar los botones
    document.getElementById('chart-container').style.display = 'none'; // Ocultar el gráfico
}

// Función para mostrar los datos de medios
function mostrarDatosMedios() {
    var dataButtons = document.getElementById('data-buttons');
    dataButtons.innerHTML = `
        <button class="btn">Medio 1</button>
        <button class="btn">Medio 2</button>
        <button class="btn">Medio 3</button>
        <button class="btn">Medio 4</button>
        <button class="btn">Medio 5</button>
        <button class="btn">Medio 6</button>
        <button class="btn">Medio 7</button>
        <button class="btn">Medio 8</button>
    `;
    dataButtons.style.display = 'grid'; // Mostrar los botones
    document.getElementById('chart-container').style.display = 'none'; // Ocultar el gráfico
}

// Función para mostrar los datos de aulas
function mostrarDatosAulas() {
    var dataButtons = document.getElementById('data-buttons');
    dataButtons.innerHTML = `
        <button class="btn">Aula 1</button>
        <button class="btn">Aula 2</button>
        <button class="btn">Aula 3</button>
        <button class="btn">Aula 4</button>
        <button class="btn">Aula 5</button>
        <button class="btn">Aula 6</button>
        <button class="btn">Aula 7</button>
        <button class="btn">Aula 8</button>
    `;
    dataButtons.style.display = 'grid'; // Mostrar los botones
    document.getElementById('chart-container').style.display = 'none'; // Ocultar el gráfico
}

// Función para mostrar el gráfico
function mostrarGrafico() {
    document.getElementById('data-buttons').style.display = 'none'; // Ocultar botones de datos
    document.getElementById('chart-container').style.display = 'block'; // Mostrar gráfico
    showChart(); // Llamar a la función para mostrar el gráfico
}

// Inicializar el estado para que los botones no hagan nada si no se ha seleccionado una sección
actualizarAcciones();

// Agregar eventos a los botones
document.getElementById('btn-docentes').addEventListener('click', function() {
    seccionSeleccionada = 'docentes';
    actualizarAcciones();
});

document.getElementById('btn-medios').addEventListener('click', function() {
    seccionSeleccionada = 'medios';
    actualizarAcciones();
});

document.getElementById('btn-aulas').addEventListener('click', function() {
    seccionSeleccionada = 'aulas';
    actualizarAcciones();
});

document.getElementById('btn-reportes').addEventListener('click', function() {
    seccionSeleccionada = 'reportes';
    actualizarAcciones();
});

// Función para mostrar el gráfico
function showChart() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Solicitudes',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}