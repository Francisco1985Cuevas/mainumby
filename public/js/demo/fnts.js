// Call the dataTables jQuery plugin
$(document).ready(function() {

    /*
    //--- Paises ---//
    //DataTable list Paises
	$('#dataTable_paises').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_Paises


	//boton eliminar del form edit.
	$("#btn_delete_editFormPais").click(function() {
        dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ dataId);
        $('#form_delete_editFormPais').attr('action', '/paises/'+dataId);
        $('#modal_delete_editFormPais').modal('show');
    });


	//boton eliminar del listado.
	var dataTablePaises = $('#dataTable_paises').DataTable();
    dataTablePaises.on('click', '#btn_delete_listPais', function(){//hace referencia al link del listado a href delete
    //$('#dataTable_paises').DataTable().on('click', '#btn_delete_listPais', function(){
        //alert("entro aca");
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataPais = dataTablePaises.row($tr).data();
        //var data = $('#dataTable_paises').DataTable().row($tr).data();
        console.log("data: "+dataPais);
        console.log("data2: "+dataPais[0]);

        //var $tr = $(this).closest('tr');
        //var rowData = $('#dataTable_paises').DataTable().row($tr).data();
        //console.log(rowData);

        //$('#id').val(data[0]);
        $('#form_delete_listPais').attr('action', '/paises/'+dataPais[0]);
        $('#modal_delete_listPais').modal('show');
    });
    //--- End Paises ---//



    //--- Departamentos ---//
    //DataTable list Departamentos
	$('#dataTable_departamentos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_departamentos


	//boton eliminar del form edit.
	$("#btn_delete_editFormDepartamento").click(function() {
        dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ dataId);
        $('#form_delete_editFormDepartamento').attr('action', '/departamentos/'+dataId);
        $('#modal_delete_editFormDepartamento').modal('show');
    });


    //boton eliminar del listado.
	var dataTableDepartamentos = $('#dataTable_departamentos').DataTable();
    dataTableDepartamentos.on('click', '#btn_delete_listDepartamento', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataDepartamento = dataTableDepartamentos.row($tr).data();
        console.log("dataDepartamento: "+dataDepartamento);

        //$('#id').val(data[0]);
        $('#form_delete_listDepartamento').attr('action', '/departamentos/'+dataDepartamento[0]);
        $('#modal_delete_listDepartamento').modal('show');
    });
    //--- End Departamentos ---//


    //--- Ciudades ---//
    //DataTable list Ciudades
	$('#dataTable_ciudades').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_ciudades


    //boton eliminar del form edit.
    $("#btn_delete_editFormCiudad").click(function() {
        dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ dataId);
        $('#form_delete_editFormCiudad').attr('action', '/ciudades/'+dataId);
        $('#modal_delete_editFormCiudad').modal('show');
    });


    //boton eliminar del listado.
	var dataTableCiudades = $('#dataTable_ciudades').DataTable();
    dataTableCiudades.on('click', '#btn_delete_listCiudad', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataCiudad = dataTableCiudades.row($tr).data();
        console.log(dataCiudad);

        //$('#id').val(data[0]);
        $('#form_delete_listCiudad').attr('action', '/ciudades/'+dataCiudad[0]);
        $('#modal_delete_listCiudad').modal('show');
    });
    //--- End Ciudades ---//


    //--- Barrios ---//
    //DataTable list Barrios
	$('#dataTable_barrios').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_barrios


    //boton eliminar del form edit.
    $("#btn_delete_editFormBarrio").click(function() {
        dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ dataId);
        $('#form_delete_editFormBarrio').attr('action', '/barrios/'+dataId);
        $('#modal_delete_editFormBarrio').modal('show');
    });


    //boton eliminar del listado.
    var dataTableBarrios = $('#dataTable_barrios').DataTable();
    dataTableBarrios.on('click', '#btn_delete_listBarrio', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataBarrio = dataTableBarrios.row($tr).data();
        console.log(dataBarrio);

        //$('#id').val(data[0]);
        $('#form_delete_listBarrio').attr('action', '/barrios/'+dataBarrio[0]);
        $('#modal_delete_listBarrio').modal('show');
    });
    //--- End Barrios ---//


    //--- Tipos Direcciones ---//
    //DataTable list Tiposdirecciones
	$('#dataTable_tiposdirecciones').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_direcciones


    //boton eliminar del form edit.
    $("#btn_delete_editFormTipoDireccion").click(function() {
        dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ dataId);
        $('#form_delete_editFormTipoDireccion').attr('action', '/tiposdirecciones/'+dataId);
        $('#modal_delete_editFormTipoDireccion').modal('show');
    });


    //boton eliminar del listado.
	var dataTableTiposDirecciones = $('#dataTable_tiposdirecciones').DataTable();
    dataTableTiposDirecciones.on('click', '#btn_delete_listTipoDireccion', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTipoDireccion = dataTableTiposDirecciones.row($tr).data();
        console.log("data: "+dataTipoDireccion);
        console.log("data2: "+dataTipoDireccion[0]);

        $('#form_delete_listTipoDireccion').attr('action', '/tiposdirecciones/'+dataTipoDireccion[0]);
        $('#modal_delete_listTipoDireccion').modal('show');
    });
    //--- End Tipos Direcciones ---//


    //--- Tipos Contactos ---//
    //DataTable list tipos contactos
	$('#dataTable_tiposContactos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_tiposContactos


    //boton eliminar del form edit.
    $("#btn_delete_editFormTipoContacto").click(function() {
        dataId = $(this).attr("data-id");
        $('#form_delete_editFormTipoContacto').attr('action', '/tiposcontactos/'+dataId);
        $('#modal_delete_editFormTipoContacto').modal('show');
    });


    //boton eliminar del listado.
    var dataTableTiposContactos = $('#dataTable_tiposContactos').DataTable();
    dataTableTiposContactos.on('click', '#btn_delete_listTipoContacto', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTipoContacto = dataTableTiposContactos.row($tr).data();
        console.log("data: "+dataTipoContacto);
        console.log("data2: "+dataTipoContacto[0]);

        $('#form_delete_listTipoContacto').attr('action', '/tiposcontactos/'+dataTipoContacto[0]);
        $('#modal_delete_listTipoContacto').modal('show');
    });
    //--- End Tipos Contactos ---//


    //--- Tipos Personas ---//
    //DataTable list Tipos Personas
	$('#dataTable_tiposPersonas').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_tiposPersonas


    //boton eliminar del form edit.
    $("#btn_delete_editFormTipoPersona").click(function() {
        dataId = $(this).attr("data-id");
        $('#form_delete_editFormTipoPersona').attr('action', '/tipospersonas/'+dataId);
        $('#modal_delete_editFormTipoPersona').modal('show');
    });


    //boton eliminar del listado.
    var dataTableTiposPersonas = $('#dataTable_tiposPersonas').DataTable();
    dataTableTiposPersonas.on('click', '#btn_delete_listTipoPersona', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTipoPersona = dataTableTiposPersonas.row($tr).data();

        $('#form_delete_listTipoPersona').attr('action', '/tipospersonas/'+dataTipoPersona[0]);
        $('#modal_delete_listTipoPersona').modal('show');
    });
    //--- End Tipos Personas ---//


    //--- Tipos Documentos ---//
    //DataTable list Tipos Documentos
	$('#dataTable_tiposDocumentos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_tiposDocumentos


	//boton eliminar del form edit.
	$("#btn_delete_editFormTipoDocumento").click(function() {
        dataId = $(this).attr("data-id");
        $('#form_delete_editFormTipoDocumento').attr('action', '/tiposdocumentos/'+dataId);
        $('#modal_delete_editFormTipoDocumento').modal('show');
    });


	//boton eliminar del listado.
	var dataTableTiposDocumentos = $('#dataTable_tiposDocumentos').DataTable();
    dataTableTiposDocumentos.on('click', '#btn_delete_listTipoDocumento', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTipoDocumento = dataTableTiposDocumentos.row($tr).data();

        $('#form_delete_listTipoDocumento').attr('action', '/tiposdocumentos/'+dataTipoDocumento[0]);
        $('#modal_delete_listTipoDocumento').modal('show');
    });
    //--- End Tipos Documentos ---//


    //--- Tipos Emails ---//
    //DataTable list Tipos Emails
	$('#dataTable_tiposemails').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_tiposemails


	//boton eliminar del form edit.
	$("#btn_delete_editFormTipoEmail").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormTipoEmail').attr('action', '/tiposemails/'+dataId);
        $('#modal_delete_editFormTipoEmail').modal('show');
    });


	//boton eliminar del listado.
	var dataTableTiposEmails = $('#dataTable_tiposemails').DataTable();
    dataTableTiposEmails.on('click', '#btn_delete_listTipoEmail', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTipoEmail = dataTableTiposEmails.row($tr).data();
        $('#form_delete_listTipoEmail').attr('action', '/tiposemails/'+dataTipoEmail[0]);
        $('#modal_delete_listTipoEmail').modal('show');
    });
    //--- End Tipos Emails ---//

*/

    //--- Personas ---//
    //DataTable list Personas
   $('#dataTable_personas').DataTable({
		language: {
           url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_personas


	//boton eliminar del form edit.
	$("#btn_delete_editFormPersona").click(function() {
        dataId = $(this).attr("data-id");
        $('#form_delete_editFormPersona').attr('action', '/personas/'+dataId);
        $('#modal_delete_editFormPersona').modal('show');
    });


	//boton eliminar del listado.
	var dataTablePersonas = $('#dataTable_personas').DataTable();
    dataTablePersonas.on('click', '#btn_delete_listPersona', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataPersona = dataTablePersonas.row($tr).data();

        $('#form_delete_listPersona').attr('action', '/personas/'+dataPersona[0]);
        $('#modal_delete_listPersona').modal('show');
    });
    //--- End Personas ---//


    //--- Direcciones ---//
    //DataTable list Direcciones
	$('#dataTable_direcciones').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_direcciones


	//boton eliminar del form edit.
	$("#btn_delete_editFormDireccion").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormDireccion').attr('action', '/direcciones/'+dataId);
        $('#modal_delete_editFormDireccion').modal('show');
    });


	//boton eliminar del listado.
	var dataTableDirecciones = $('#dataTable_direcciones').DataTable();
    dataTableDirecciones.on('click', '#btn_delete_listDireccion', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataDireccion = dataTableDirecciones.row($tr).data();

        $('#form_delete_listDireccion').attr('action', '/direcciones/'+dataDireccion[0]);
        $('#modal_delete_listDireccion').modal('show');
    });
    //--- End Direcciones ---//


    //--- Telefonos ---//
    //DataTable list Telefonos
	$('#dataTable_telefonos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_telefonos


	//boton eliminar del form edit.
	$("#btn_delete_editFormTelefono").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormTelefono').attr('action', '/telefonos/'+dataId);
        $('#modal_delete_editFormTelefono').modal('show');
    });


	//boton eliminar del listado.
	var dataTableTelefonos = $('#dataTable_telefonos').DataTable();
    dataTableTelefonos.on('click', '#btn_delete_listTelefono', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataTelefono = dataTableTelefonos.row($tr).data();

        $('#form_delete_listTelefono').attr('action', '/telefonos/'+dataTelefono[0]);
        $('#modal_delete_listTelefono').modal('show');
    });
    //--- End Telefonos ---//


    //--- Emails ---//
    //DataTable list Emails
	$('#dataTable_emails').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_emails


	//boton eliminar del form edit.
	$("#btn_delete_editFormEmail").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormEmail').attr('action', '/emails/'+dataId);
        $('#modal_delete_editFormEmail').modal('show');
    });


	//boton eliminar del listado.
	var dataTableEmails = $('#dataTable_emails').DataTable();
    dataTableEmails.on('click', '#btn_delete_listEmail', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataEmail = dataTableEmails.row($tr).data();

        $('#form_delete_listEmail').attr('action', '/emails/'+dataEmail[0]);
        $('#modal_delete_listEmail').modal('show');
    });
    //--- End Emails ---//


    //--- Documentos ---//
    //DataTable list Documentos
	$('#dataTable_documentos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_documentos


	//boton eliminar del form edit.
	$("#btn_delete_editFormDocumento").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormDocumento').attr('action', '/documentos/'+dataId);
        $('#modal_delete_editFormDocumento').modal('show');
    });


	//boton eliminar del listado.
	var dataTableDocumentos = $('#dataTable_documentos').DataTable();
    dataTableDocumentos.on('click', '#btn_delete_listDocumento', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataDocumento = dataTableDocumentos.row($tr).data();

        $('#form_delete_listDocumento').attr('action', '/documentos/'+dataDocumento[0]);
        $('#modal_delete_listDocumento').modal('show');
    });
    //--- End Documentos ---//


    //--- Contactos ---//
    //DataTable list Contactos
	$('#dataTable_contactos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_contactos


	//boton eliminar del form edit.
	$("#btn_delete_editFormContacto").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormContacto').attr('action', '/contactos/'+dataId);
        $('#modal_delete_editFormContacto').modal('show');
    });


	//boton eliminar del listado.
	var dataTableContactos = $('#dataTable_contactos').DataTable();
    dataTableContactos.on('click', '#btn_delete_listContacto', function(){//hace referencia al link del listado a href delete

        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataContacto = dataTableContactos.row($tr).data();

        $('#form_delete_listContacto').attr('action', '/contactos/'+dataContacto[0]);
        $('#modal_delete_listContacto').modal('show');
    });
    //--- End Contactos ---//













    //VER LA FORMA PARA VALIDAR CAMPOS POR JQUERY O JAVASCRIPT
    /*
    --------ESTA FUE MI PRIMERA PRUEBA Y HASTA YA FUNCIONA!--------
    $("#btn_agregarItem_createFormDocumento").click(function() {
        //alert("entroaca");

        //items.push('<i>aaaa</i>');
        //$('#contenedorPrueba').append( items.join('') );

        //$('#contenedorPrueba').append('<i>aaaa</i>');

        //$( "#myselect" ).val();
        // => 1
        //$( "#myselect option:selected" ).text();
        // => "Mr"



        $('#listadoDocumento').show();

        var tipoDocumento_id = $( "#tipoDocumento_id" ).val();
        var tipoDocumento_descripcion = $( "#tipoDocumento_id option:selected" ).text();

        var numero_documento = $( "#numero_documento" ).val();
        //$('#contenedorPrueba').append('<i>'+numero_documento+'--'+tipoDocumento_id+'--'+tipoDocumento_descripcion+'</i>');

        $('#dataTableDocumentos').append('<tr>'+'<td>'+tipoDocumento_descripcion+'</td>'+'<td><input name="numero_documento" type="text" value="'+numero_documento+'"></td>'+'<td>'+'<a href="#" class="btn btn-primary" title="Editar Registro"><i class="fas fa-edit"></i></a>'+'<a href="#" class="btn btn-danger" title="Eliminar Registro"><i class="fas fa-trash"></i></a>'+'</td>'+'</tr>');
    });
    */



    //var itemsDocumento = new Array();
    //var itemNro;
    //itemNro = 0;
    //$("#btn_agregarItem_createFormDocumento").click(function() {

        /*
        $('#listadoDocumento').show(); //mostrar listado
        $('#alertInfoDocumentos').hide(); //ocultar alert div

        var tipoDocumento_id = $( "#item_tipoDocumento_id" ).val();
        var tipoDocumento_descripcion = $( "#item_tipoDocumento_id option:selected" ).text();

        var numero_documento = $( "#item_numero_documento" ).val();

        //var fechaCreacion = new Date();
        //var fechaActualizacion = new Date();
        var hoy = new Date();
        var fecha = hoy.getDate()+'-'+(hoy.getMonth()+1)+'-'+hoy.getFullYear();
        var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
        var fechaHora = fecha + ' '+ hora;

        //$('#dataTableDocumentos').append('<tr>'+'<td>'+tipoDocumento_descripcion+'</td>'+'<td><input name="numero_documento" type="text" value="'+numero_documento+'"></td>'+'<td>'+'<span class="badge badge-light text-dark">Pendiente</span>'+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+'<button id="btn_delete_listDocumento" class="btn btn-danger" type="button"><i class="fas fa-trash"></i></button>'+'</td>'+'</tr>');
        //$('#dataTableDocumentos').append('<tr>'+'<td>'+tipoDocumento_descripcion+'</td>'+'<td><input name="numero_documento" type="text" value="'+numero_documento+'"></td>'+'<td>'+'<span class="badge badge-light text-dark">Pendiente</span>'+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+'<input type="checkbox" name="itemDocumento">'+'</td>'+'<input type="hidden" name="itemsDocumento['+tipoDocumento_id+']" value="'+numero_documento+'">'+'</tr>');
        $('#dataTableDocumentos').append('<tr>'+'<td>'+tipoDocumento_descripcion+'</td>'+'<td>'+numero_documento+'</td>'+'<td>'+'<span class="badge badge-light text-dark">Pendiente</span>'+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+fechaHora+'</td>'+'<td>'+'<input type="checkbox" name="itemDocumento">'+'</td>'+'<input type="hidden" name="itemsDocumento[]" value="'+tipoDocumento_id+';'+numero_documento+'">'+'</tr>');
        itemNro = itemNro + 1;
        alert("itemNro: "+itemNro);


        //var index = tipoDocumento_id;
        //var value = numero_documento;
        //coche["tipoDocumento_id"] = "numero_documento";

        //$('#containerDocumento').append('<input type="hidden" name="to[]" value="'+tipoDocumento_id+'">');
        //$('#containerDocumento').append('<input type="hidden" name="itemsDocumento['+tipoDocumento_id+']" value="'+numero_documento+'">');




        //volver a limpiar inputs
        //$('#tipoDocumento_id').val('');
        $('#item_tipoDocumento_id').focus();
        $('#item_numero_documento').val('');
        */




    //});


    //$("#btn_delete_listDocumento").click(function() {
    //    alert("ENTRO ACA");
    //});

    // Find and remove selected table rows
    //$(".delete-row").click(function(){
    /*$("#btn_deleteItemDocumento").click(function(){
        //$("table tbody").find('input[name="record"]').each(function(){
        $("table tbody").find('input[name="itemDocumento"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });*/



});//close document ready




/*
jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            title: jQuery('#nombre').val(),
            description: jQuery('#abreviatura').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'paises';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';
                todo += '<td><button class="btn btn-primary edit-modal" value="' + data.id + '">Edit</button>&nbsp;';
                todo += '<button class="btn btn-danger delete-todo" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    jQuery('#todo-list').append(todo);
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
*/


/*
//****INTENTOS DE HACER CON AJAX***
// Call the dataTables jQuery plugin
$(document).ready(function() {

    $('#dataTable_paises').DataTable();

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                //'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                'X-CSRF-TOKEN': $('#_token').val()
            }
        });
        e.preventDefault();
        var formData = {
            nombre: jQuery('#nombre').val(),
            abreviatura: jQuery('#abreviatura').val()//,
            //token: jQuery('#_token').val()
        };
        //nombre = $("#nombre").val();
        //abreviatura = $("#abreviatura").val();
        //token = $("#_token").val();
        //console.log("nombre: "+nombre+" abreviatura: "+abreviatura);
        //var state = jQuery('#btn-save').val();
        var type = "POST";
        //var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'paises';
        $.ajax({
            //headers: token,
            type: type,
            url: ajaxurl,
            data: formData,
            //data: {nombre: nombre, abreviatura: abreviatura},
            dataType: 'json',
            success: function (data) {
                //var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.abreviatura + '</td>';
                //todo += '<td><button class="btn btn-primary edit-modal" value="' + data.id + '">Edit</button>&nbsp;';
                //todo += '<button class="btn btn-danger delete-todo" value="' + data.id + '">Delete</button></td></tr>';
                //if (state == "add") {
                //    jQuery('#todo-list').append(todo);
                //} else {
                //    jQuery("#todo" + todo_id).replaceWith(todo);
                //}
                //jQuery('#myForm').trigger("reset");
                //jQuery('#formModal').modal('hide')

                //var todo = '<p>SE AGREGO</p>';
                //jQuery('#todo-list').append(todo);
                console.log("se agrego");
            },
            error: function (data) {
                //console.log(data);
                console.log(JSON.stringify(data));
            }
        });
    });

});//close document ready
*/


/*
// Call the dataTables jQuery plugin
$(document).ready(function() {

    $('#dataTable_paises').DataTable();

    $("#btn-save2").click(function () {
        var nombre = $("#nombre").val();
        var abreviatura = $("#abreviatura").val();
        var token = $("#_token").val();
        var route = "http://127.0.0.1:8000/paises";

        $.ajax({
            url:route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {nombre:nombre, abreviatura:abreviatura}
        });

        //console.log("nombre: "+nombre+" abreviatura: "+abreviatura+" token: "+token);
        //alert("nombre: "+nombre+" abreviatura: "+abreviatura+" token: "+token);
    });
});//close document ready
*/


/*$(document).ready(function() {
    $('#dataTable_paises').DataTable();
    $('form').submit(function (e) {
        e.preventDefault();
        var nombre = $("#nombre").val();
        var abreviatura = $("#abreviatura").val();
        var token = $("#_token").val();
        var route = "http://127.0.0.1:8000/paises";
        $.ajax({
            url:route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {nombre:nombre, abreviatura:abreviatura}
        });
    });
});//close document ready
*/


