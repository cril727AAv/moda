<?php include_once "vista/modulos/menuInstructores.php"; ?>

<script src="vista/js/cl_instructores.js"></script>

<div class="col-md-10">
    <div class="container col-md-12">
        <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-5 fw-bold">Gestión de Aprendices</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row g-4" id="contenedorTablaRegistrar">
        <div class="col-md-3">
            <form id="formRegistroAprendices" class="needs-validation bg-white p-4 rounded shadow-sm" autocomplete="off" novalidate>
                <div class="mb-3">
                    <label for="txt_Nombre" class="form-label">Nombre del Aprendiz</label>
                    <input type="text" class="form-control" id="txt_Nombre" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el nombre del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Documento" class="form-label">Documento del Aprendiz</label>
                    <input type="text" class="form-control" id="txt_Documento" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el documento del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Correo" class="form-label">Correo del Aprendiz</label>
                    <input type="email" class="form-control" id="txt_Correo" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un correo válido del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Telefono" class="form-label">Teléfono del Aprendiz</label>
                    <input type="tel" class="form-control" id="txt_Telefono">
                </div>

                <div class="mb-3">
                    <label for="txt_Jornada" class="form-label">Jornada</label>
                    <select class="form-select" id="txt_Jornada" required>
                        <option value="">Seleccione una jornada</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione una jornada.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_NumeroFicha" class="form-label">Número de Ficha</label>
                    <input type="text" class="form-control" id="txt_NumeroFicha" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el número de ficha.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Instructor" class="form-label">Instructor Asignado</label>
                    <select class="form-select" id="txt_Instructor" required>
                        <option value="">Seleccione un instructor</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un instructor.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="txt_Usuario" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un usuario.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="txt_Password" required>
                    <div class="invalid-feedback">
                        Por favor ingrese una contraseña.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_Rol" class="form-label">Rol</label>
                    <select class="form-select" id="txt_Rol" required>
                        <option value="">Seleccione un rol</option>
                        <option value="2">Aprendiz</option>
                        <option value="1">Instructor</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un rol.
                    </div>
                </div>

                <button class="btn btn-primary w-100" id="btn-RegistrarAprendiz" type="submit">
                    Registrar Aprendiz
                </button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="table-responsive bg-white p-4 rounded shadow-sm">
                <table id="tablaAprendices" class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Jornada</th>
                            <th scope="col">Número de Ficha</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div id="contenedorEditar" class="col-md-12 bg-white p-4 rounded shadow-sm" style="display: none;">
            <form id="formEditarAprendiz" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="txt_edit_Nombre" class="form-label">Nombre del Aprendiz</label>
                    <input type="text" class="form-control" id="txt_edit_Nombre" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el nombre del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Documento" class="form-label">Documento del Aprendiz</label>
                    <input type="text" class="form-control" id="txt_edit_Documento" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el documento del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Correo" class="form-label">Correo del Aprendiz</label>
                    <input type="email" class="form-control" id="txt_edit_Correo" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un correo válido del aprendiz.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Telefono" class="form-label">Teléfono del Aprendiz</label>
                    <input type="tel" class="form-control" id="txt_edit_Telefono">
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Jornada" class="form-label">Jornada</label>
                    <select class="form-select" id="txt_edit_Jornada" required>
                        <option value="">Seleccione una jornada</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione una jornada.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_NumeroFicha" class="form-label">Número de Ficha</label>
                    <input type="text" class="form-control" id="txt_edit_NumeroFicha" required>
                    <div class="invalid-feedback">
                        Por favor ingrese el número de ficha.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Instructor" class="form-label">Instructor Asignado</label>
                    <select class="form-select" id="txt_edit_Instructor" required>
                        <option value="">Seleccione un instructor</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un instructor.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="txt_edit_Usuario" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un usuario.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="txt_edit_Password">
                    <div class="invalid-feedback">
                        Por favor ingrese una contraseña.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="txt_edit_Rol" class="form-label">Rol</label>
                    <select class="form-select" id="txt_edit_Rol" required>
                        <option value="">Seleccione un rol</option>
                        <option value="2">Aprendiz</option>
                        <option value="1">Instructor</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un rol.
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary flex-grow-1" id="btn-EditarAprendiz" type="submit">Guardar Cambios</button>
                    <button class="btn btn-secondary flex-grow-1" id="btn-Regresar" type="button">Regresar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vista/js/instructores.js"></script>

