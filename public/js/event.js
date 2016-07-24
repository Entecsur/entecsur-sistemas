

$(document).on("ready",function(){
	$("input#usuario").on("keyup",function(){
		$(".evt-error-user").hide();
	});
	$("input#password").on("keyup",function(){
		$(".evt-error-password").hide();
	});
 

	$("#price").val('0.00');
    $("#datepicker").val("yy-mm-dd");
	$( "#datepicker" ).datepicker({
        appendText:"(yy-mm-dd)",
        dateFormat:"yy-mm-dd",

    });
    $( "#datepicker" ).datepicker( "option", "showAnim", "slide" );

    
    $(".input-edit").hide();
    $(".evt-condicion").val('new');


     $("input#evt-buscar").on("keyup",function(){
            var url = $(".evt-formbuscar").attr('action');
            var buscar = $(this).val();
            var categoria = $(".evt-cat option:selected").val();
            $.ajax({
                url: url,
                type: "POST",
                data:{buscar:buscar,categoria:categoria},
                success:function(data){
                   $(".evt-table").fadeIn('slow').html(data);

                }
            });
            return false;
        
     });
     $("input#editar").on("click",function(){
        $(".evt-form").show();
     });
    

});
function editar(id){
    $(".evt-editar").hide();
    $(".input-new").hide();
    $(".input-edit").show();
    //$(".idevento").show();
    $("input#evt-idevento").prop('disabled', true);
    $("input#evt-idevento").val(id);
    $("input#evt-ideventoo").val(id);
    $(".evt-condicion").val('');
    $(".evt-condicion").val('edit');
    $(".evt-form").fadeIn();
    var url =  $(".evt-obtnerevento").attr('value');
    var m = $(".evt-newevent").attr('action');
   $.ajax({
        url: url,
        type:"POST",
        data:{id:id},
        success:function(data){
            var json=JSON.parse(data);
            $("input#evt-nombre").val(json[0]['nom_evento']);
            $(".field-content select").val(json[0]['categoria_id_tipo_evento']);
            $("input#price").val(json[0]['precio']);
            $("input#datepicker").val(json[0]['fecha_evento']);
            $("input#evt-hora").val(json[0]['hora_ini']);
            $("input#evt-ambiente").val(json[0]['ambiente']);

        }
    });

}






