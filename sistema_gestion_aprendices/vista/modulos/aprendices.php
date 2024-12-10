<script src="vista/js/cl_reportes.js"></script>
<script src="vista/js/cl_aprendices.js"></script>

<div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-primary">Panel de Reporte de Estado</h1>
        <p class="col-md-8 mx-auto fs-4 text-muted">
            Selecciona tu nombre y completa la información sobre el estado de tu equipo asignado.
        </p>
        <li class="nav justify-content-center">
            <button id="btnLogout" class="btn btn-outline-danger">Cerrar Sesión</button>
        </li>


    </div>

    <div class="container mt-4">
        <form id="reporteEstado" method="POST" class="row g-3 needs-validation" novalidate>

            <!-- Campo desplegable para buscar por nombre -->
            <div class="col-md-6">
                <label for="aprendicesSelect" class="form-label fw-bold">Nombre del aprendiz:</label>
                <select id="aprendicesSelect" name="nombre" class="form-select" required>
                    <option value="">Seleccione su nombre</option>
                </select>
                <div class="invalid-feedback">Por favor selecciona tu nombre.</div>
            </div>

            <!-- Campos autocompletados (no editables) -->
            <div class="col-md-6">
                <label for="ficha" class="form-label fw-bold">Número de ficha:</label>
                <input type="text" id="ficha" name="ficha" class="form-control" readonly>
            </div>

            <div class="col-md-6">
                <label for="jornada" class="form-label fw-bold">Jornada:</label>
                <input type="text" id="jornada" name="jornada" class="form-control" readonly>
            </div>

            <div class="col-md-6">
                <label for="serial" class="form-label fw-bold">Serial del equipo:</label>
                <input type="text" id="serial" name="serial" class="form-control" readonly>
            </div>

            <div class="col-md-6">
                <label for="tipo" class="form-label fw-bold">Tipo de equipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control" readonly>
            </div>

            <div class="col-md-6">
                <label for="nombreIns" class="form-label fw-bold">Instructor:</label>
                <input type="text" id="nombreIns" name="nombreIns" class="form-control" readonly>
            </div>

            <input type="hidden" id="idins" name="idins">

            <!-- Hidden field for equipment ID -->
            <input type="hidden" id="idequipo" name="idequipo">

            <!-- Campos editables -->
            <div class="col-12">
                <label for="observacion" class="form-label fw-bold">Observaciones:</label>
                <textarea id="observacion" name="observacion" class="form-control" rows="4" required></textarea>
                <div class="invalid-feedback">Por favor escribe las observaciones.</div>
            </div>

            <div class="col-md-6">
                <label for="fecha" class="form-label fw-bold">Fecha del reporte:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
                <div class="invalid-feedback">Por favor selecciona la fecha.</div>
            </div>

            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Guardar Observación</button>
            </div>
        </form>
    </div>
</div>

<script src="vista/js/login.js"></script>
<script src="vista/js/aprendices.js"></script>
<script src="vista/js/reportes.js"></script>