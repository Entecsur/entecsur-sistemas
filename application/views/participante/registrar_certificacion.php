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
	<script  src = "<?php echo base_url()?>/public/js/jquery.js"></script>
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
									<li><a href="<?php echo base_url()?>home/participantes/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form" >
							<?php 
							$url = base_url('home/pagos');
							?> <input type = "hidden" class="evt-obtnerevento" value = "<?php echo base_url('home/obtener_evento')?>"><?php
							echo form_open($url,array('class' => 'evt-newevent','id'=>'evt-newevent'));
							?>
							<div class="input-content">
								<hr>
									Datos Personales
								<hr>
							</div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Nombres');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-nombrep', 'value' => $datos_participante[0]['nom_part'],'id' => 'evt-nombrep'))?>

								</div>
							</div>
							<div class="nombrep-error evt-error"><?php echo form_error('evt-nombrep','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Apellidos');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidosp','value' => $datos_participante[0]['ape_pater']." ".$datos_participante[0]['ape_mater'],'id' => 'evt-apellidosp'))?>
								</div>
							</div>
							<div class="apellidosp-error evt-error"><?php echo form_error('evt-apellidosp','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Dni');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-dnip','value' => $datos_participante[0]['doc_id'],'id' => 'evt-dnip' ))?>
								</div>
							</div>
							<div class="dnip-error evt-error"><?php echo form_error('evt-dnip','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Telefóno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-telefonop','value' => $datos_participante[0]['telf'],'id' => 'evt-telefonop'))?>
								</div>
							</div>
							<div class="telefonop-error evt-error"><?php echo form_error('evt-telefonop','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Procedencia');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-procedenciap','value' => $datos_participante[0]['procedencia_id_proce'],'id'=> 'evt-procedenciap'))?>
								</div>
							</div>
							<div class="procedenciap-error evt-error"><?php echo form_error('evt-procedenciap','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Codigo de Boleta');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-numbol','value' => $datos_participante[0]['id_doc_pago'],'id'=> 'evt-numbol'))?>
								</div>
							</div>
							<div class="numbolp-error evt-error"><?php echo form_error('evt-procedenciap','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content" id="input-contentt" style="height:500">
							</div>
							<div class="cursos-error evt-error"><?php echo form_error('evt-procedenciap','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Monto  total');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-mtotal','value' => $datos_participante[0]['monto_tot'],'id'=> 'evt-mtotal'))?>
								</div>
							</div>
							<div class="mtotal-error evt-error"></div>
							<div class="input-content">
								<hr>
									Cursos y tallleres(Registrar certificación)
								<hr>
							</div>
							<div class="input-content">
								<table class="table table-bordered">
									<tr>
										<th>#</th>
										<th>Cursos y/o talleres</th>
										<th>ponentes</th>
									</tr>
									<?php for($i = 0; $i < count($cursos_talleres); $i++){?>
									<tr>
										<td><input type="checkbox" name="cursos[]"></td>
										<td><?php echo $cursos_talleres[$i]['nom_evento']?></td>
										<td><?php echo $cursos_talleres[$i]['nom_part']." ".$cursos_talleres[$i]['ape_pater']?></td>
									</tr>
									<?php }?>
								</table>
							</div>

							<div class="input-content input-new">
								<div class="label-content">
								.
								</div>
								<div class="field-content">
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary','name' => 'submit','value' => 'Registrar Pago','id' => 'evt-regp'))?>
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
							<input type="hidden" class="evt-idpersona" name="evt-idpersona">
							<div class="input-content">
								<hr>
							</div>
							<?php echo form_close();?>
						</div>

						<div class="prueba"></div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
</body>
</html>