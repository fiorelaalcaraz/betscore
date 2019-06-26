$(function() {

    //ELIMINAR
    $(document).on("click", ".eliminar", function() {
        var pos = $(".eliminar").index(this);
        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(0)').each(function() {
            var campo1;
            campo1 = $(this).html();
            $("#cod_eliminar").val(campo1);
        });
    });
    $(document).on("click", ".elimi", function() {
        var cod = $("#cod_eliminar").val();
        $.ajax({
            type: "POST",
            url: "grabar.php",
            data: { descri: '', vruc: '', vdirec: '', vtel: '', ope: 'eliminacion', codigo: cod }
        }).done(function(msg) {
            $('.cerrar').click();
            cargar();
            alert(msg);
        });

    });
    //FIN ELIMINAR

    //EDITAR
    $(document).on("click", ".editar", function() {
        $("#btn_edit").attr("disabled", "disabled");
        var pos = $(".editar").index(this);
        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(1)').each(function() {
            var campo1;
            campo1 = $(this).html();
            $("#descri_edit").val(campo1);
            $("#descri_edit").focus();
            $('#descri_edit').keyup(function() {
                if ($("#descri_edit").val() === "" || $("#descri_edit").val() === campo1) {
                    $("#btn_edit").attr("disabled", "disabled");
                } else {
                    $("#btn_edit").removeAttr("disabled");
                }
            });
        });


        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(2)').each(function() {
            var campo3;
            campo3 = $(this).html();
            $("#vruc_edit").val(campo3);
            $("#vruc_edit").focus();
            $('#vruc_edit').keyup(function() {
                if ($("#vruc_edit").val() === "" || $("#vruc_edit").val() === campo3) {
                    $("#btn_edit").attr("disabled", "disabled");
                } else {
                    $("#btn_edit").removeAttr("disabled");
                }
            });

        });

        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(3)').each(function() {
            var campo4;
            campo4 = $(this).html();
            $("#vdirec_edit").val(campo4);
            $("#vdirec_edit").focus();
            $('#vdirec_edit').keyup(function() {
                if ($("#vdirec_edit").val() === "" || $("#vdirec_edit").val() === campo4) {
                    $("#btn_edit").attr("disabled", "disabled");
                } else {
                    $("#btn_edit").removeAttr("disabled");
                }
            });
        });

        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(4)').each(function() {
            var campo5;
            campo5 = $(this).html();
            $("#vtel_edit").val(campo5);
            $("#vtel_edit").focus();
            $('#vtel_edit').keyup(function() {
                if ($("#vtel_edit").val() === "" || $("#vvtel_edit").val() === campo5) {
                    $("#btn_edit").attr("disabled", "disabled");
                } else {
                    $("#btn_edit").removeAttr("disabled");
                }
            });
        });


        $("#referencial tbody tr:eq(" + pos + ")").find('td:eq(0)').each(function() {
            var campo2 = $(this).html();
            $("#cod_edit").val(campo2);
        });
    });

    $(document).on("click", "#btn_edit", function() {
        var nacio = $("#descri_edit").val();
        var nacio2 = $("#cod_edit").val();
        var nacio3 = $("#vruc_edit").val();
        var nacio4 = $("#vdirec_edit").val();
        var nacio5 = $("#vtel_edit").val();
        $("#btn_edit").attr("disabled", "disabled");
        $("#btn_edit").html("Editando...");
        $.ajax({
            type: "POST",
            url: "grabar.php",
            data: { codigo: nacio2, descri: nacio, vruc: nacio3, vdirec: nacio4, vtel: nacio5, ope: 'modificacion' }
        }).done(function(msg) {
            $('.cerrar').click();
            $("#btn_edit").html("Editar");
            cargar();
            alert(msg);
        });
    });

    $("#descri_edit").keypress(function(e) {
        if (e.which === 13 && $("#descri_edit").val() !== "") {
            $("#btn_edit").focus();
            $("#btn_edit").click();
        } else {

        }
    });
    //FIN EDITAR    

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
        tabla.fnReloadAjax('/betscore/php/class/datos_torneo.php');
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
            url: "/betscore/php/class/grabar_torneo.php",
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
        location.href = "/betscore/index.php?l_id_torneo_=" + p_id_torneo_;

    });
    //FIN DIRECCIONA SI ACEPTA



    //SELECCIONA TORNEO
    $(document).on("change", "#usu_torneo", function() {
        var p_id_torneo_ = $("#usu_torneo").val();
        var p_id_usu = $("#id_usu").val();

        //location.href = "?l_id_torneo_=" + p_id_torneo_;
        $.ajax({
            type: "POST",
            url: "/betscore/php/class/datos_det_tor.php",
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
                "columns": [
                    { "data": "nombre" },
                    { "data": "email" },
                    { "data": "acciones" }
                ]
            });
            tabla.fnReloadAjax('/betscore/php/class/datos_part.php?torneo=' + torneo);
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
            tabla.fnReloadAjax('/betscore/php/class/datos_tab_pos.php?torneo=' + torneo);
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
        tabla.fnReloadAjax('/betscore/php/class/datos_premios.php?torneo=' + p_id_torneo_);
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
            url: "/betscore/php/class/guardarparti.php",
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
        "columns": [

            { "data": "nombre" },
            { "data": "email" },
            { "data": "acciones" }
        ]
    });
    tabla1.fnReloadAjax('/betscore/php/class/datos_part.php?torneo=' + torneo);


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
    tabla1.fnReloadAjax('/betscore/php/class/datos_tab_pos.php?torneo=' + torneo);


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
            location.href = "/betscore/php/core/apuestas/apuestas.php?l_id_torneo_=" + p_id_torneo_;
        }
    });
    //FIN DIRECCIONA APOSTAR



});