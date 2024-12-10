(function(){
    const dropdown = document.getElementById("aprendicesSelect");

    dropdown.addEventListener("change", function() {
        const selectedValue = dropdown.value;
        if (selectedValue) {
            let objData = {"listarDetallesReporte":"ok", "id":selectedValue};
            let objReporte = new Reporte(objData);
            objReporte.listarDetallesReporte()
        }
    });

    document.getElementById("reporteEstado").addEventListener("submit", function(event) {
        event.preventDefault();
    
        const formData = {
            "idaprendiz": document.getElementById("aprendicesSelect").value,
            "idequipo": document.getElementById("idequipo").value, // Use the hidden field for equipment ID
            "idins": document.getElementById("idins").value,
            "observacion": document.getElementById("observacion").value,
            "fecha": document.getElementById("fecha").value
        };

        // Validate all fields
        for (const key in formData) {
            if (formData[key] === "" || formData[key] === null) {
                alert("Por favor, complete el campo: " + key);
                return;
            }
        }
    
        const form = new FormData();
        form.append("agregarReporte", "ok");
        for (const key in formData) {
            form.append(key, formData[key]);
        }
    
        fetch("controlador/reporteControlador.php", {
            method: "POST",
            body: form
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server response:", data); // Log the entire response
            if (data.codigo == "200") {
                alert("Reporte agregado exitosamente.");
                document.getElementById("reporteEstado").reset();
            } else {
                alert("Error al agregar el reporte: " + data.mensaje);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Hubo un error en la solicitud.");
        });
    });
})()    