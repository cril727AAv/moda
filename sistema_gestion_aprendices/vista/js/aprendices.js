document.addEventListener("DOMContentLoaded", function() {
    listarAprendicesDisponibles();
    
    function listarAprendicesDisponibles(){
        let objData = {"listarAprendicesDisponibles" : "ok"}
        let objAprendiz = new Aprendices(objData);
        objAprendiz.cargarAprendicesDisponible();
    }
});
