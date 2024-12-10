(function () {
    listarTablaAprendices();
    listarInstructores();

    function listarTablaAprendices() {
        let objData = { "listarAprendices": "ok" };
        let objInstructor = new Instructor(objData);
        objInstructor.listarAprendices();
    }

    function listarInstructores() {
        let objData = { "listarInstructores": "ok" };
        let objInstructor = new Instructor(objData);
        objInstructor.listarInstructores();
    }

    // Botón Regresar
    let btnRegresarTabla = document.getElementById("btn-Regresar");
    if (btnRegresarTabla) {
        btnRegresarTabla.addEventListener("click", () => {
            $("#contenedorEditar").hide();
            $("#contenedorTablaRegistrar").show();
        });
    }

    // Botón Eliminar Aprendiz
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
                let idaprendiz = $(this).attr("idaprendiz");
                let objData = { "eliminarAprendiz": "ok", "id": idaprendiz };
                let objInstructor = new Instructor(objData);
                objInstructor.eliminarAprendiz();
            }
        });
    });

    // Botón EditarAprendiz
    $(document).on("click", "#btnEditarAprendiz", function () {
        $("#contenedorTablaRegistrar").hide();
        $("#contenedorEditar").show();

        let idaprendiz = $(this).attr("idaprendiz");
        let nombre = $(this).attr("nombre");
        let documento = $(this).attr("documento");
        let correo = $(this).attr("correo");
        let telefono = $(this).attr("telefono");
        let jornada = $(this).attr("jornada");
        let numeroficha = $(this).attr("numeroficha");
        let instructor_id = $(this).attr("instructor_id");
        let usuario = $(this).attr("usuario");
        let rol_id = $(this).attr("rol_id");

        $("#txt_edit_Nombre").val(nombre);
        $("#txt_edit_Documento").val(documento);
        $("#txt_edit_Correo").val(correo);
        $("#txt_edit_Telefono").val(telefono);
        $("#txt_edit_Jornada").val(jornada);
        $("#txt_edit_NumeroFicha").val(numeroficha);
        $("#txt_edit_Instructor").val(instructor_id);
        $("#txt_edit_Usuario").val(usuario);
        $("#txt_edit_Rol").val(rol_id);
        $("#btn-EditarAprendiz").attr("idaprendiz", idaprendiz);
    });

    // Registrar Aprendiz
    var formRegistroAprendices = document.getElementById("formRegistroAprendices");

    if (formRegistroAprendices) {
        formRegistroAprendices.addEventListener("submit", function (event) {
            event.preventDefault();

            if (!this.checkValidity()) {
                event.stopPropagation();
                this.classList.add('was-validated');
            } else {
                let nombre = document.getElementById("txt_Nombre").value;
                let documento = document.getElementById("txt_Documento").value;
                let correo = document.getElementById("txt_Correo").value;
                let telefono = document.getElementById("txt_Telefono").value;
                let jornada = document.getElementById("txt_Jornada").value;
                let numeroFicha = document.getElementById("txt_NumeroFicha").value;
                let instructor_id = document.getElementById("txt_Instructor").value;
                let usuario = document.getElementById("txt_Usuario").value;
                let password = document.getElementById("txt_Password").value;
                let rol_id = document.getElementById("txt_Rol").value;

                let objData = {
                    "registrarAprendiz": "ok",
                    "nombre": nombre,
                    "documento": documento,
                    "correo": correo,
                    "telefono": telefono,
                    "jornada": jornada,
                    "numeroFicha": numeroFicha,
                    "instructor_id": instructor_id,
                    "usuario": usuario,
                    "password": password,
                    "rol_id": rol_id
                };

                let objInstructor = new Instructor(objData);
                objInstructor.registrarAprendiz();
            }
        });
    }

    // Editar Aprendiz
    var formEditarAprendiz = document.getElementById("formEditarAprendiz");

    if (formEditarAprendiz) {
        formEditarAprendiz.addEventListener("submit", function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                event.stopPropagation();
                this.classList.add('was-validated');
            } else {
                let idaprendiz = $("#btn-EditarAprendiz").attr("idaprendiz");
                let nombre = document.getElementById("txt_edit_Nombre").value;
                let documento = document.getElementById("txt_edit_Documento").value;
                let correo = document.getElementById("txt_edit_Correo").value;
                let telefono = document.getElementById("txt_edit_Telefono").value;
                let jornada = document.getElementById("txt_edit_Jornada").value;
                let numeroFicha = document.getElementById("txt_edit_NumeroFicha").value;
                let instructor_id = document.getElementById("txt_edit_Instructor").value;
                let usuario = document.getElementById("txt_edit_Usuario").value;
                let password = document.getElementById("txt_edit_Password").value;
                let rol_id = document.getElementById("txt_edit_Rol").value;

                let objData = {
                    "editarAprendiz": "ok",
                    "id": idaprendiz,
                    "nombre": nombre,
                    "documento": documento,
                    "correo": correo,
                    "telefono": telefono,
                    "jornada": jornada,
                    "numeroFicha": numeroFicha,
                    "instructor_id": instructor_id,
                    "usuario": usuario,
                    "password": password,
                    "rol_id": rol_id
                };

                let objInstructor = new Instructor(objData);
                objInstructor.editarAprendiz();
            }
        });
    }
})();

