<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pre-Inscripción</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/js/jquery.js">
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/inicio.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/eventos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/datetimepicker/jquery.datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/w3.css">
	<style>
		.pacifico{
			font-family: 'Pacifico', cursive;
		}
		.verde{
			color: #007A8A;
		}
		.center{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<header class="header">
			<h1 class="pacifico verde center">Pre - Inscripción</h1><br>
		</header>
		<?php if($this->session->flashdata('Message')!=''){echo $this->session->flashdata('Message');}?>

		<?php  $url = base_url('pre_inscripcion');?> 
		<?php echo form_open($url); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Nombre (*)', 'nombre');?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'nombre')); ?>
					<?php echo form_error('nombre','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Apellido Paterno (*)', 'paterno'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'paterno')); ?>
					<?php echo form_error('paterno','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Apellido Materno (*)', 'materno'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'materno')); ?>
					<?php echo form_error('materno','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Doc. de Identidad (*)', 'doc_id'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'doc_id')); ?>
					<?php echo form_error('doc_id','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Fec. de Nacimiento (*)', 'fec_nac'); ?>
					<div class="input-group">
						<?php echo form_input(array('class' => 'form-control', 'type' => 'date', 'name' => 'fec_nac')); ?>
						<span class=" input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					<?php echo form_error('fec_nac','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Distrito (*)', 'distrito'); ?>
					<?php if(isset($distritos)){ ?>
					<select name="distrito" class="form-control">
						<option value="">Seleccione</option>
					<?php foreach ($distritos as $distrito) { ?>
						<option value="<?php echo $distrito['id_distrito'];?>"><?php echo $distrito['nom_dis'];?></option>
					<?php } ?>
					</select>
					<?php } ?>
					<?php echo form_error('distrito','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Telefono (*)', 'telef'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'telef')); ?>
					<?php echo form_error('telef','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Correo (*)', 'correo'); ?>
					<?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'name' => 'correo')); ?>
					<?php echo form_error('correo','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>		
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Procedencia (*)', 'proced'); ?>
					<?php if(isset($procedencia)){ ?>
						<select name="proced" class="form-control">
							<option value="">Seleccione</option>
						<?php foreach ($procedencia as $pro) { ?>
							<option value="<?php echo $pro['id_proce'];?>"><?php echo $pro['nom_proce'];?></option>
						<?php } ?>
						</select>
					<?php } ?>
					<?php echo form_error('proced','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Sexo (*)', 'sexo'); ?>
					<select name="sexo" class="form-control">
						<option value="">Seleccione</option>
						<option value="M">Masculino</option>
						<option value="F">Femenino</option>
					</select>
					<?php echo form_error('sexo','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					Miscélanea
					<ul>
						<li>Arquitectura</li>
						<li>Redes y Telecomunicaciones</li>
						<li>Charla sobre JAVA</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<h3>Conferencia</h3>
					<?php if(isset($conferencia)){ ?>
						<ul style="list-style: none">
						<?php foreach ($conferencia as $conf) { ?>
							<li><input type="checkbox" name="evento[]" value="<?php echo $conf['id_evento'];?>"> <?php echo $conf['nom_evento'];?></li>
						<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>			
			<div class="col-md-4">
				<div class="form-group">
					<h3>Taller</h3>
					<?php if(isset($taller)){ ?>
						<ul style="list-style: none">
						<?php foreach ($taller as $taller) { ?>
							<li><input type="checkbox" name="evento[]" value="<?php echo $taller['id_evento'];?>"> <?php echo $taller['nom_evento'];?></li>
						<?php } ?>
						</ul>
					<?php } ?>				
				</div>
			</div>			
		</div>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_submit(array('class' => 'btn btn-default btn-lg btn-block'), 'Inscribirme'); ?>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</body>
</html>