(function () {
    listarTablaEquipos();

    function listarTablaEquipos() {
        let objData = { "listarEquipos": "ok" };
        let objEquipo = new Equipo(objData);
        objEquipo.listarEquipos();
    }

    // Botón Regresar
    let btnRegresarTabla = document.getElementById("btn-Regresar");
    if (btnRegresarTabla) {
        btnRegresarTabla.addEventListener("click", () => {
            $("#contenedorEditar").hide();
            $("#contenedorTablaRegistrar").show();
        });
    }

    // Botón Eliminar Equipo
    $(document).on("click", "#btnEliminar", function () {
        Swal.fire({
            title: "¿Está usted seguro?",
            text: "Si confirma esta opción no podrá recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                let idequipo = $(this).attr("idequipo");
                let objData = { "eliminarEquipo": "ok", "id": idequipo };
                let objEquipo = new Equipo(objData);
                objEquipo.eliminarEquipo();
            }
        });
    });

    // Botón EditarEquipo
    $(document).on("click", "#btnEditarEquipo", function () {
        $("#contenedorTablaRegistrar").hide();
        $("#contenedorEditar").show();

        let idequipo = $(this).attr("idequipo");
        let marca = $(this).attr("marca");
        let tipo = $(this).attr("tipo");
        let numero_serial = $(this).attr("numero_serial");
        let memoria = $(this).attr("memoria");
        let almacenamiento = $(this).attr("almacenamiento");

        $("#txt_edit_Marca").val(marca);
        $(`input[name="txt_edit_Tipo"][value="${tipo}"]`).prop('checked', true);
        $("#txt_edit_NumeroSerial").val(numero_serial);
        $("#txt_edit_Memoria").val(memoria);
        $("#txt_edit_Almacenamiento").val(almacenamiento);
        $("#btn-EditarEquipo").attr("idequipo", idequipo);
    });

    // Registrar Equipo
    var formRegistroEquipos = document.getElementById("formRegistroEquipos");

    if (formRegistroEquipos) {
        formRegistroEquipos.addEventListener("submit", function (event) {
            event.preventDefault();

            if (!this.checkValidity()) {
                event.stopPropagation();
                this.classList.add('was-validated');
            } else {
                let marca = document.getElementById("txt_Marca").value;
                let tipo = document.querySelector('input[name="txt_Tipo"]:checked').value;
                let numero_serial = document.getElementById("txt_NumeroSerial").value;
                let memoria = document.getElementById("txt_Memoria").value;
                let almacenamiento = document.getElementById("txt_Almacenamiento").value;

                let objData = {
                    "registrarEquipo": "ok",
                    "marca": marca,
                    "tipo": tipo,
                    "numero_serial": numero_serial,
                    "memoria": memoria,
                    "almacenamiento": almacenamiento
                };

                let objEquipo = new Equipo(objData);
                objEquipo.registrarEquipo();
            }
        });
    }

    // Editar Equipo
    var formEditarEquipo = document.getElementById("formEditarEquipo");

    if (formEditarEquipo) {
        formEditarEquipo.addEventListener("submit", function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                event.stopPropagation();
                this.classList.add('was-validated');
            } else {
                let idequipo = $("#btn-EditarEquipo").attr("idequipo");
                let marca = document.getElementById("txt_edit_Marca").value;
                let tipo = document.querySelector('input[name="txt_edit_Tipo"]:checked').value;
                let numero_serial = document.getElementById("txt_edit_NumeroSerial").value;
                let memoria = document.getElementById("txt_edit_Memoria").value;
                let almacenamiento = document.getElementById("txt_edit_Almacenamiento").value;

                let objData = {
                    "editarEquipo": "ok",
                    "id": idequipo,
                    "marca": marca,
                    "tipo": tipo,
                    "numero_serial": numero_serial,
                    "memoria": memoria,
                    "almacenamiento": almacenamiento
                };

                let objEquipo = new Equipo(objData);
                objEquipo.editarEquipo();
            }
        });
    }
})();

