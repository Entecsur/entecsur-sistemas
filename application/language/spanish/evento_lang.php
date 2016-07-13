
<?php
$lang['evt-evento-add'] = "<div class = 'alert alert-success fade in '' > <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Evento agredado con éxtito!</div>
	<script>
	$(document).on('ready',function(){

		$('#evt-newevent')[0].reset();
		$('.alert').delay(2000).hide(2000);
		//alert('Se ha editado correctamente');
	});
  </script>
 ";
$lang['evt-evento-edit'] = "<div class = 'alert alert-success fade in'  > <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Evento editado con éxtito!</div>
 	<script>
	$(document).on('ready',function(){

		$('#evt-newevent')[0].reset();
		$('.evt-form').hide();
		$('.evt-editar').fadeIn();
		$('.alert').delay(2000).hide(2000);
		//alert('Se ha editado correctamente');
	});


 	</script>
 
  ";