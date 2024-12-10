<div class="col-md-10">
    <div class="container my-4">
        <h2>Gestión de Aprendices</h2>
        <div class="mb-3">
            <label for="filtroJornada" class="form-label">Filtrar por Jornada</label>
            <select id="filtroJornada" class="form-select">
                <option value="">Todos</option>
                <!-- Opciones dinámicas desde la base de datos -->
            </select>
        </div>
        <div class="mb-3">
            <label for="filtroInstructor" class="form-label">Filtrar por Instructor</label>
            <select id="filtroInstructor" class="form-select">
                <option value="">Todos</option>
                <!-- Opciones dinámicas desde la base de datos -->
            </select>
        </div>
        <div class="mb-3">
            <label for="filtroSerial" class="form-label">Filtrar por Serial</label>
            <input type="text" id="filtroSerial" class="form-control" placeholder="Ingrese el serial">
        </div>
        <button id="btnFiltrar" class="btn btn-primary">Filtrar</button>
        <div class="mt-4">
            <table id="tablaAprendices" class="table table-striped">
                <thead>
                    <tr>
                        <th>No Ficha</th>
                        <th>Nombre</th>
                        <th>Jornada</th>
                        <th>Serial</th>
                        <th>Tipo</th>
                        <th>Instructor</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="vista/js/panel.js"></script>
