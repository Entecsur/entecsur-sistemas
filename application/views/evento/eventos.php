<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Evento || Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/inicio.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/eventos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/datetimepicker/jquery.datetimepicker.css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script  src = "<?php echo base_url()?>/public/datetimepicker/jquery.js"></script>
	<script  src = "<?php echo base_url()?>/public/js/event.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

			<?php $this->load->view('partial/header');?>
			<div class="evt-body">
				<div class="evt-contenido">
						<div class="evt-navh">
							<ul>
								<?php
								foreach($privilegios as $clave => $value){?>
									<li><a href="<?php echo base_url()?>home/eventos/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form" >

							<?php 
							$url = base_url('home/eventos/registrar-evento');
							?> <input type = "hidden" class="evt-obtnerevento" value = "<?php echo base_url('home/obtener_evento')?>"><?php

							echo form_open($url,array('class' => 'evt-newevent','id'=>'evt-newevent'));
							echo form_input(array('class' => 'evt-condicion','name' => 'evt-condicion', 'type'=> 'hidden'));
							echo form_input(array('id' => 'evt-ideventoo','name' => 'evt-ideventoo','type'=>'hidden'));

							?>
							<div class="input-content">
								<hr>
									Datos de evento(Taller o conferencia)
								<hr>
							</div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Nombre del evento');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-nombre', 'value' => set_value('evt-nombre'),'id' => 'evt-nombre'))?>

								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-nombre','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Categoría');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-categoria" id="evt-categoria">
										<option value="0">Seleccione</option>
										<option value="001">Conferencia</option>
										<option value="002">Taller</option>
									</select>
								</div>
							</div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Precio');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-precio','value' => set_value('evt-precio'),'id' => 'price'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-precio','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Fecha');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-fecha','value' => set_value('evt-fecha'),'id' => 'datepicker' ))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-fecha','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Hora');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-hora','value' => set_value('evt-hora'),'type'=>'time','id' => 'evt-hora'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-hora','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Ambiente');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-ambiente','value' => set_value('evt-ambiente'),'id'=> 'evt-ambiente'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-ambiente','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content input-new">
								<div class="label-content">
								.
								</div>
								<div class="field-content">
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary','name' => 'submit','value' => 'Registrar'))?>
								</div>
							</div>
							<div class="input-content input-edit">
								<div class="label-content">
								.
								</div>
								<div class="field-content">
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary','name' => 'submit','value' => 'Editar','id' =>'editar'))?>
								</div>
							</div>
							<div class="input-content">
								<hr>
							</div>
							<?php echo form_close();?>
							 <?php
			 			if($this->session->flashdata('Message')!='')
						 {
							echo $this->session->flashdata('Message');
			 				}?>
						</div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
			</script>
</body>
</html>