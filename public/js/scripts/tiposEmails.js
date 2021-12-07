
import Persona from "./Persona"; // Ruta correcta al archivo Js

let per= new Persona("Stack");
console.log(per.saludar());


// Call the dataTables jQuery plugin
$(document).ready(function() {

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

});//close document ready
