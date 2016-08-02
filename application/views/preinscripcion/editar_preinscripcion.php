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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/w3.css">
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
									<li><a href="<?php echo base_url()?>home/preinscripcion/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form"  >
						<?php if($this->session->flashdata('Message')!=''){echo $this->session->flashdata('Message');}?>
								<div class="">
				<?php $ruta = "home/preinscripcion/editar-preinscripcion/".$preinscritos[0]['idpersona']?>
		<?php  $url = base_url($ruta);?> 
		<?php echo form_open($url,array('class' => 'evt-newevent evt-contpre')); ?>
		<div class="">
								<hr>
									Editar Preinscripción
								<hr>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Nombre (*)', 'nombre');?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'nombre','value' => $preinscritos[0]['nom_part'])); ?>
					<?php echo form_error('nombre','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Apellido Paterno (*)', 'paterno'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'paterno','value' => $preinscritos[0]['ape_pater'])); ?>
					<?php echo form_error('paterno','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Apellido Materno (*)', 'materno'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'materno','value' => $preinscritos[0]['ape_mater'])); ?>
					<?php echo form_error('materno','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Doc. de Identidad (*)', 'doc_id'); ?>
					<?php echo form_input(array('class' => 'form-control', 'name' => 'doc_id','value' => $preinscritos[0]['doc_id'])); ?>
					<?php echo form_error('doc_id','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Fec. de Nacimiento (*)', 'fec_nac'); ?>
					<div class="input-group">
						<?php echo form_input(array('class' => 'form-control', 'type' => 'date', 'name' => 'fec_nac','value' => $preinscritos[0]['fec_nac'])); ?>
						<span class=" input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					<?php echo form_error('fec_nac','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Distrito (*)', 'distrito'); ?>
					<?php if(isset($distritos)){ ?>
					<select name="distrito" class="form-control evt-distrito">
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
					<?php echo form_input(array('class' => 'form-control', 'name' => 'telef','value' => $preinscritos[0]['telf'])); ?>
					<?php echo form_error('telef','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Correo (*)', 'correo'); ?>
					<?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'name' => 'correo','value' => $preinscritos[0]['correo'])); ?>
					<?php echo form_error('correo','<div class = "evt-error-event">','</div>')?>
				</div>
			</div>		
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Procedencia (*)', 'proced'); ?>
					<?php if(isset($procedencia)){ ?>
						<select name="proced" class="form-control evt-procedencia">
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
					<select name="sexo" class="form-control evt-sexo">
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
						<?php foreach ($conferencia as $conf) {
							$chk = "";
							for($j = 0; $j < count($cursos_talleres); $j++)
								{
									if($conf['id_evento'] == $cursos_talleres[$j]['id_evento'])
									{
										$chk=" checked";
										break;
									}
								}
						 ?>
							<li><?php echo "<input type='checkbox' name='evento[]' value='".$conf['id_evento']."'".$chk." >"?> <?php echo $conf['nom_evento'];?></li>
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
						<?php foreach ($taller as $taller) {
							$chk = "";
							for($j = 0; $j < count($cursos_talleres); $j++)
								{
									if($taller['id_evento'] == $cursos_talleres[$j]['id_evento'])
									{
										$chk=" checked";
										break;
									}
								}
						?>
							<li><?php echo "<input type='checkbox' name='evento[]'' value='".$taller['id_evento']."'".$chk.">"?> <?php echo $taller['nom_evento'];?></li>
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
					<input type="hidden" value="edit" name="evt-opcion">
					<?php echo form_submit(array('class' => 'btn btn-default btn-lg btn-block'), 'Inscribirme'); ?>
				</div>
			</div>
		</div>
		<div class="">
			<hr>
		</div>
		<?php echo form_close(); ?>
		
	</div>
						</div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
			$(document).on("ready",function(){
				var distrito = "<?php echo $preinscritos[0]['distrito_id_distrito']?>";
				var sexo = "<?php echo $preinscritos[0]['sexo']?>";
				var procedencia = "<?php echo $preinscritos[0]['procedencia_id_proce']?>";
				$(".form-group .evt-distrito").val(distrito);
				$(".form-group .evt-procedencia").val(procedencia);
				$(".form-group .evt-sexo").val(sexo);
			});
			</script>

</body>
</html>