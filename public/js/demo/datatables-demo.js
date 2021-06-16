// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();


    var table = $('#dataTableList').DataTable();

    //Start Delete Record
    table.on('click', '.btn_delete', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        //$('#id').val(data[0]);
        $('#deleteForm').attr('action', '/tiposlegales/'+data[0]);
        $('#myModal').modal('show');
    });
    //End Delete Record

    //HAY QUE OPTIMIZAR SI O SI EL MODAL
    //show modal with button delete laravel
    $( ".btn_delete2" ).click(function() {
        $dataId = $(this).attr("data-id");
        //alert( "Handler for .click() called."+ $dataId);
        $('#deleteForm2').attr('action', '/tiposlegales/'+$dataId);
        $('#DeleteModal').modal('show');
    });
    /*function deleteData(id)
    {
        var id = id;
        var url = '{{ route("tiposlegales.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm2").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm2").submit();
    }*/

});
