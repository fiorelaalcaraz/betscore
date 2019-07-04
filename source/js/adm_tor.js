$(function() {

    ////TABLA
    var tabla = $('#referencial').dataTable({

        "columns": [

            { "data": "codigo" },
            { "data": "descripcion" },
            { "data": "costo" },
            { "data": "fec_ini" },
            { "data": "id_liga" },
            { "data": "acciones" }
        ]

    });
    cargar();

    function cargar() {
        tabla.fnReloadAjax('/php/class/datos_torneo.php');
    }
    ////FIN TABLA

    //AGREGAR
    $("#btnsave").attr("disabled", "disabled");
    $('#obs').keyup(function() {
        if ($("#obs").val() === "") {
            $("#btnsave").attr("disabled", "disabled");
        } else {
            $("#btnsave").removeAttr("disabled");
        }
    });


    $(document).on("click", "#btnsave", function() {
        var nombre = $("#descri").val();
        var liga = $("#liga").val();
        var fec_ini = $("#fec_ini").val();
        var costo = $("#costo").val();
        var obs = $("#obs").val();
        var pri = $("#primero").val();
        var seg = $("#segundo").val();
        var ter = $("#tercero").val();
        var cuar = $("#cuarto").val();


        $("#btnsave").attr("disabled", "disabled");
        $("#btnsave").html("AGREGANDO...");
        $.ajax({
            type: "POST",
            url: "/php/class/grabar_torneo.php",
            data: { codigo: '0', nombre: nombre, liga: liga, fec_ini: fec_ini, costo: costo, obs: obs, pri: pri, seg: seg, ter: ter, cuar: cuar, ope: 'insercion' }
        }).done(function(msg) {
            alert(msg);
            cargar();
            $("#btnsave").html("Agregar");
            $("#descri").val('');
            $("#liga").val('');
            $("#fec_ini").val('');
            $("#costo").val('');
            $("#obs").val('');
            $("#primero").val('');
            $("#segundo").val('');
            $("#tercero").val('');
            $("#cuarto").val('');

        });
    });
    //FIN AGREGAR

    //IR A DETALLE
    $(document).on("click", ".agregar_p", function() {
        var pos = $(".agregar_p").index(this);
        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(0)').each(function() {
            var p_id_torneo;
            p_id_torneo = $(this).html();
            location.href = "det_tor.php?l_id_torneo=" + p_id_torneo;

        });
    });
    //FIN IR A DETALLE



    /* MODULO DETALLES DE TORNEO */
    //DIRECCIONAR SI ACEPTA
    $(document).on("click", "#btnacept", function() {
        var p_id_torneo_ = $("#id_torneo_").val();
        location.href = "/index.php?l_id_torneo_=" + p_id_torneo_;

    });
    //FIN DIRECCIONA SI ACEPTA



    //SELECCIONA TORNEO
    $(document).on("change", "#usu_torneo", function() {
        var p_id_torneo_ = $("#usu_torneo").val();
        var p_id_usu = $("#id_usu").val();

        $.ajax({
            type: "POST",
            url: "/php/class/datos_det_tor.php",
            data: { torneo: p_id_torneo_, p_id_usu: p_id_usu }
        }).done(function(msg) {
            var data = $.parseJSON(msg);

            for (i = 0; i < data.length; i++) {
                $("#descri").val(data[i]['des_tor']);
                $("#costo").val(data[i]['costo']);
                $("#fec_ini").val(data[i]['fec_ini']);
                $("#liga").val(data[i]['liga']);
                $("#creador").val(data[i]['creador']);
                $("#id_torneo_").val(p_id_torneo_);
            }

            var torneo = $("#id_torneo_").val();
            var tabla = $('#participantes').dataTable({
                destroy: true,
                bFilter: false,
                bLengthChange: false,
                "columns": [
                    { "data": "nombre" },
                    { "data": "email" }

                ]
            });
            tabla.fnReloadAjax('/php/class/datos_part.php?torneo=' + torneo);
            cargar();

            var tabla = $('#tabla_posiciones').dataTable({
                destroy: true,
                bFilter: false,
                bLengthChange: false,
                "columns": [
                    { "data": "puesto" },
                    { "data": "participante" },
                    { "data": "puntos" }
                ]
            });
            tabla.fnReloadAjax('/php/class/datos_tab_pos.php?torneo=' + torneo);
            cargar();

        });
    });
    //FIN SELECCIONA TORNEO


    //SELECCIONA TORNEO EN PREMIOS.PHP
    $(document).on("change", "#usu_torneo_pre", function() {
        var p_id_torneo_ = $("#usu_torneo_pre").val();
        var tabla = $('#premios_table').dataTable({
            destroy: true,
            bFilter: false,
            bLengthChange: false,
            "columns": [
                { "data": "puesto" },
                { "data": "participante" },
                { "data": "premio" }
            ]
        });
        tabla.fnReloadAjax('/php/class/datos_premios.php?torneo=' + p_id_torneo_);
        cargar();


    });
    //FIN SELECCIONA EN PREMIOS.PHP




    //ENVIAR INVITACION
    $("#btn_add").attr("disabled", "disabled");
    $('#email').keyup(function() {
        if ($("#email").val() === "") {
            $("#btn_add").attr("disabled", "disabled");
        } else {
            $("#btn_add").removeAttr("disabled");
        }
    });


    $(document).on("click", "#btn_add", function() {
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var id_torneo = $("#id_torneo_").val();


        $("#btn_add").attr("disabled", "disabled");
        $("#btn_add").html("Enviando...");
        $.ajax({
            type: "POST",
            url: "/php/class/guardarparti.php",
            data: { codigo: '0', nombre: nombre, email: email, id_torneo, id_torneo, ope: 'insercion' }
        }).done(function(msg) {
            alert(msg);
            cargar1();
            cargar2();
            $("#btn_add").html("Enviar");
            $("#nombre").val('');
            $("#email").val('');
            $("#id_torneo").val('');
        });
    });
    //FIN ENVIAR INVITACION

    ////TABLA PARTICIPANTES

    var torneo = $("#id_torneo_").val();
    var tabla1 = $('#participantes').dataTable({
        bFilter: false,
        bLengthChange: false,
        "columns": [

            { "data": "nombre" },
            { "data": "email" }

        ]
    });
    tabla1.fnReloadAjax('/php/class/datos_part.php?torneo=' + torneo);


    function cargar1() {
        tabla1.fnReloadAjax();
    }
    ////FIN TABLA PARTICIPANTES

    ////TABLA POSICIONES

    var torneo = $("#id_torneo_").val();
    var tabla1 = $('#tabla_posiciones').dataTable({
        bFilter: false,
        bLengthChange: false,
        bPaginate: false,
        "columns": [

            { "data": "puesto" },
            { "data": "participante" },
            { "data": "puntos" }
        ]
    });
    tabla1.fnReloadAjax('/php/class/datos_tab_pos.php?torneo=' + torneo);


    function cargar2() {
        tabla1.fnReloadAjax();
    }
    ////FIN TABLA POSICIONES


    //DIRECCIONA APOSTAR
    $(document).on("click", "#btnapostar", function() {
        var p_id_torneo_ = $("#id_torneo_").val();
        if (p_id_torneo_ == 0) {
            alert("Debe seleccionar un torneo");
        } else {
            location.href = "/php/core/apuestas/apuestas.php?l_id_torneo_=" + p_id_torneo_;
        }
    });
    //FIN DIRECCIONA APOSTAR



});