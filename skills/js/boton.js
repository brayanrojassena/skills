 $(function() { $("#enviar").click(function(event){
    var seleccion = $("#aceptar")[0].checked;
    if(!seleccion){
        event.preventDefault();
        alert("Acepta las condiciones");
    }
});
});