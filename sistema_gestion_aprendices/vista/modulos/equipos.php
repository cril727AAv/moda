<?php include_once "vista/modulos/menuInstructores.php"; ?>
<script src="vista/js/cl_equipos.js"></script>

<div class="col-md-10">
    <div class="container col-md-12">
        <div class="p-5 mb-4 bg-light rounded-3 shadow">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-center text-primary">Gestión de Equipos</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row g-4" id="contenedorTablaRegistrar">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Registrar Equipo</h5>
                </div>
                <div class="card-body">
                    <form id="formRegistroEquipos" class="needs-validation" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label for="txt_Marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="txt_Marca" required>
                            <div class="invalid-feedback">Por favor ingrese la marca.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="txt_Tipo" id="txt_Tipo_Portatil" value="portatil" required>
                                    <label class="form-check-label" for="txt_Tipo_Portatil">Portátil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="txt_Tipo" id="txt_Tipo_TodoEnUno" value="todo_en_uno" required>
                                    <label class="form-check-label" for="txt_Tipo_TodoEnUno">Todo en Uno</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Por favor seleccione un tipo.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_NumeroSerial" class="form-label">Número Serial</label>
                            <input type="text" class="form-control" id="txt_NumeroSerial" required>
                            <div class="invalid-feedback">Por favor ingrese el número serial.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_Memoria" class="form-label">Memoria</label>
                            <input type="text" class="form-control" id="txt_Memoria" required>
                            <div class="invalid-feedback">Por favor ingrese la memoria.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_Almacenamiento" class="form-label">Almacenamiento</label>
                            <input type="text" class="form-control" id="txt_Almacenamiento" required>
                            <div class="invalid-feedback">Por favor ingrese el almacenamiento.</div>
                        </div>

                        <button class="btn btn-primary w-100" id="btn-RegistrarEquipo" type="submit">Registrar Equipo</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Lista de Equipos</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaEquipos" class="table table-primary table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Número Serial</th>
                                    <th scope="col">Memoria</th>
                                    <th scope="col">Almacenamiento</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div id="contenedorEditar" style="display: none;">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark text-center">
                    <h5>Editar Equipo</h5>
                </div>
                <div class="card-body">
                    <form id="formEditarEquipo" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="txt_edit_Marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="txt_edit_Marca" required>
                            <div class="invalid-feedback">Por favor ingrese la marca.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="txt_edit_Tipo" id="txt_edit_Tipo_Portatil" value="portatil" required>
                                    <label class="form-check-label" for="txt_edit_Tipo_Portatil">Portátil</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="txt_edit_Tipo" id="txt_edit_Tipo_TodoEnUno" value="todo_en_uno" required>
                                    <label class="form-check-label" for="txt_edit_Tipo_TodoEnUno">Todo en Uno</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Por favor seleccione un tipo.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_edit_NumeroSerial" class="form-label">Número Serial</label>
                            <input type="text" class="form-control" id="txt_edit_NumeroSerial" required>
                            <div class="invalid-feedback">Por favor ingrese el número serial.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_edit_Memoria" class="form-label">Memoria</label>
                            <input type="text" class="form-control" id="txt_edit_Memoria" required>
                            <div class="invalid-feedback">Por favor ingrese la memoria.</div>
                        </div>

                        <div class="mb-3">
                            <label for="txt_edit_Almacenamiento" class="form-label">Almacenamiento</label>
                            <input type="text" class="form-control" id="txt_edit_Almacenamiento" required>
                            <div class="invalid-feedback">Por favor ingrese el almacenamiento.</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" id="btn-EditarEquipo" type="submit">Guardar Cambios</button>
                            <button class="btn btn-secondary" id="btn-Regresar" type="button">Regresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="vista/js/equipos.js"></script>
