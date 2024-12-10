document.addEventListener('DOMContentLoaded', function () {
    const formLogin = document.getElementById('formLogin');
    const btnLogout = document.getElementById('btnLogout');

    if (formLogin) {
        formLogin.addEventListener('submit', function (e) {
            e.preventDefault();

            if (this.checkValidity()) {
                const nombre_usuario = document.getElementById('nombre_usuario').value;
                const contrasena = document.getElementById('contrasena').value;

                const formData = new FormData();
                formData.append('accion', 'login');
                formData.append('nombre_usuario', nombre_usuario);
                formData.append('contrasena', contrasena);

                fetch('controlador/loginControlador.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.codigo === "200") {
                            if (data.usuario.rol === 'Instructor') {
                                window.location.href = 'instructores';
                            } else if (data.usuario.rol === 'Aprendiz') {
                                window.location.href = 'aprendices';
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Rol no reconocido. No se puede redirigir.'
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.mensaje
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al iniciar sesión. Por favor, intente de nuevo.'
                        });
                    });
            } else {
                this.classList.add('was-validated');
            }
        });
    }

    if (btnLogout) {
        btnLogout.addEventListener('click', function (e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('accion', 'logout');

            fetch('controlador/loginControlador.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.codigo === "200") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: data.mensaje
                        }).then(() => {
                            window.location.href = 'index.php'; // Redirect to login page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.mensaje
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al cerrar sesión. Por favor, intente de nuevo.'
                    });
                });
        });
    }
});

