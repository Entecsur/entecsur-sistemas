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
						<?php $this->load->view('evento/evento_editar');?>
						<div class="evt-editar" >
						<div class="evt-search">
							<?php
							echo form_open('home/search_event',array('class' =>'evt-formbuscar'));
							?><div class="evt-input-search"><?php echo form_input(array('class' => 'evt-buscar form-control','id' => 'evt-buscar','name' => 'evt-buscar','placeholder' => 'Buscar eventos'));?></div>
							<div class="evt-input-categoria">
								<select class="evt-cat form-control" name="evt-cat" id="evt-cat">
									<option value="0">Seleccione categoria</option>
									<option value="001">Evento</option>
									<option value="002">Taller</option>
								</select>
							</div>
							<div class="evt-inputsubmit"></div>

						</div>

						
						<div class="evt-table">
						 <?php
			 			if($this->session->flashdata('Message')!='')
						 {
							echo $this->session->flashdata('Message');
			 				}?>
							<table class="table table-hover ">
								<thead>
								<tr  class="table-header">
									<th>Id Evento</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Fecha</th>
									<th>Hora de incio</th>
									<th>Ambiente</th>
									<th>Categoria</th>
									<th></th>
								</tr>
								</thead>

								<?php foreach($eventos as $clave => $value){?>
									<tr class="table-hov">
										<td><?php echo $value['id_evento']?> </td>
										<td><?php echo $value['nom_evento']?></td>
										<td>S/. <?php echo $value['precio']?></td>
										<td><?php echo $value['fecha_evento']?></td>
										<td><?php echo $value['hora_ini']?></td>
										<td><?php echo $value['ambiente']?></td>
										<td><?php echo $value['nom_categoria']?></td>
										<td colspan ="2" ><span title="Editar" class="icon-pen" onclick="editar('<?php echo $value['id_evento']?>');" ></span></a></td>

									</tr>
								<?php }?>
							</table>
						</div>
						</div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
				
			</script>
</body>
</html>