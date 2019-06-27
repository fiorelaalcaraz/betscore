$(function() {

    //APOSTAR
    $(document).on("click", ".local", function() {
        var pos = $(".local").index(this);
        $("#fixture_table tbody tr:eq(" + pos + ")").find('td:eq(7)').each(function() {
            var campo7;
            campo7 = $(this).html();
            $("#id_partido").val(campo7);
            $("#eleccion").val('L');
        });


    });
    $(document).on("click", ".empate", function() {
        var pos = $(".empate").index(this);
        $("#fixture_table tbody tr:eq(" + pos + ")").find('td:eq(7)').each(function() {
            var campo7;
            campo7 = $(this).html();
            $("#id_partido").val(campo7);
            $("#eleccion").val('E');
        });


    });
    $(document).on("click", ".visi", function() {
        var pos = $(".visi").index(this);
        $("#fixture_table tbody tr:eq(" + pos + ")").find('td:eq(7)').each(function() {
            var campo7;
            campo7 = $(this).html();
            $("#id_partido").val(campo7);
            $("#eleccion").val('V');
        });


    });
    $(document).on("click", ".saveapuesta", function() {

        var id_partido = $("#id_partido").val();
        var eleccion = $("#eleccion").val();
        var cod_torneo = $("#cod_torneo").val();
        $(".saveapuesta").attr("disabled", "disabled");
        $(".saveapuesta").html("Guardando");
        $.ajax({
            type: "POST",
            url: "/php/class/grabar_apuesta.php",
            data: { id_partido: id_partido, eleccion: eleccion, cod_torneo: cod_torneo }
        }).done(function(msg) {

            document.getElementById("mensaje_modal").innerHTML = msg;
            cargar();

            setTimeout(function() {
                $(".saveapuesta").html("Confirmar");
                $(".saveapuesta").removeAttr("disabled");
                $('.cerrar').click();
                document.getElementById("mensaje_modal").innerHTML = "Estas seguro?";
            }, 1000);



        });

    });
    //FIN APOSTAR

    var cod_torneo = $("#cod_torneo").val();
    ////TABLA
    var tabla = $('#fixture_table').dataTable({
        "columns": [

            { "data": "fec_partido" },
            { "data": "hora" },
            { "data": "equipo_local" },
            { "data": "img_local" },
            { "data": "acciones" },
            { "data": "img_visi" },
            { "data": "equipo_visi" },

            { "data": "id_partido" },
            { "data": "id_equipo_local" },
            { "data": "id_equipo_visi" }

        ],
        "columnDefs": [{
                "targets": [8],
                "visible": false
            },
            {
                "targets": [9],
                "visible": false
            }
        ]
    });

    tabla.fnReloadAjax('/php/class/datos_apuestas.php?torneo=' + cod_torneo);

    function cargar() {
        tabla.fnReloadAjax();
    }
    ////FIN TABLA
});