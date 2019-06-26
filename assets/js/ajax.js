$(function(){
    
    
//ELIMINAR
$(document).on("click",".eliminar",function(){
        var pos = $( ".eliminar" ).index( this );
        $("#referencial tbody tr:eq("+pos+")").find('td:eq(0)').each(function () {
            var campo1;
            campo1 = $(this).html();
            $("#cod_eliminar").val(campo1);
        });
});
$(document).on("click",".elimi",function(){
    var cod = $( "#cod_eliminar" ).val();
    $.ajax({
            type: "POST",
            url: "grabar.php",
            data: {descri: '', ope: 'eliminacion', codigo: cod}
        }).done(function(msg){
        $('.cerrar').click();
        cargar();
        alert(msg);
    });
                        
});
//FIN ELIMINAR

//EDITAR
$(document).on("click",".editar",function(){
    $("#btn_edit").attr("disabled","disabled");
    var pos = $( ".editar" ).index( this );
    $("#referencial tbody tr:eq("+pos+")").find('td:eq(1)').each(function () {
        var campo1;
        campo1 = $(this).html();
        $("#descri_edit").val(campo1);
        $("#descri_edit").focus();
        $('#descri_edit').keyup(function () {
            if($("#descri_edit").val()==="" || $("#descri_edit").val()===campo1){
                $("#btn_edit").attr("disabled","disabled");
            }else{
                $("#btn_edit").removeAttr("disabled");
            }
        });
    });
    $("#referencial tbody tr:eq("+pos+")").find('td:eq(0)').each(function () {
        var campo2 = $(this).html();
        $("#cod_edit").val(campo2);
    });
});
    
$(document).on("click","#btn_edit",function(){
    var nacio = $("#descri_edit").val();
    var nacio2 = $("#cod_edit").val();
    $("#btn_edit").attr("disabled","disabled");
    $("#btn_edit").html("Editando...");
   $.ajax({
       type: "POST",
       url: "grabar.php",
       data: {codigo: nacio2, descri: nacio, ope: 'modificacion'}
   }).done(function(msg){
       $('.cerrar').click();
       $("#btn_edit").html("Editar");
       cargar();
       alert(msg);
   });
});
    
$("#descri_edit").keypress(function(e){
if(e.which === 13 && $("#descri_edit").val()!==""){
    $("#btn_edit").focus();
    $("#btn_edit").click();
}else{
    
}
}); 
//FIN EDITAR    
    
////TABLA
 var tabla =  $('#referencial').dataTable({
    "columns":
    [
        { "data": "codigo" },
        { "data": "descripcion" },
        { "data": "acciones"}
    ]
 });
            tabla.fnReloadAjax( 'datos.php' );
    function cargar(){
                    tabla.fnReloadAjax();
    }
////FIN TABLA

//AGREGAR
$("#btnsave").attr("disabled","disabled");
     $('#descri').keyup(function () {
        if($("#descri").val()===""){
            $("#btnsave").attr("disabled","disabled");
        }else{
            $("#btnsave").removeAttr("disabled");
        }
    });
    cargar();
    
    $(document).on("click","#btnsave",function(){
       var descri = $("#descri").val();
       $("#btnsave").attr("disabled","disabled");
       $("#btnsave").html("AGREGANDO...");
       $.ajax({
             type: "POST",
             url: "grabar.php",
             data: {codigo:'0', descri: descri, ope: 'insercion' }
            }).done(function(msg){
                alert(msg);
                cargar();
                $("#btnsave").html("AGREGAR.");
                $("#descri").val('');

            });
    });
//FIN AGREGAR
});

                            