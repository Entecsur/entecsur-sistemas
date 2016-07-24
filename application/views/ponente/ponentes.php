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
									<li><a href="<?php echo base_url()?>home/ponentes/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form" >
							<?php 
							$url = "";
							?> <input type = "hidden" class="evt-obtnerevento" value = "<?php echo base_url('home/obtener_evento')?>"><?php

							echo form_open($url,array('class' => 'evt-newevent','id'=>'evt-newevent'));
							?>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Nombre');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-nombrep', 'value' => set_value('evt-nombrep'),'id' => 'evt-nombrep'))?>

								</div>
							</div>
							<div class="nombrep-error evt-error"><?php echo form_error('evt-nombrep','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('A. Paterno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidop','value' => set_value('evt-apellidop'),'id' => 'evt-apellidop'))?>
								</div>
							</div>
							<div class="apellidop-error evt-error"><?php echo form_error('evt-apellidop','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('A. Materno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidom','value' => set_value('evt-apellidom'),'id' => 'evt-apellidom'))?>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-apellidom','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Dni');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-dnip','value' => set_value('evt-dnip'),'id' => 'evt-dnip' ))?>
								</div>
							</div>
							<div class="dnip-error evt-error"><?php echo form_error('evt-dnip','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Sexo');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-cbosex">
										<option >Seleccione</option>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
								</div>
							</div>
							<div class="sexop-error evt-error"></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Telefóno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-telefonop','value' => set_value('evt-telefonop'),'id' => 'evt-telefonop'))?>
								</div>
							</div>
							<div class="telefonop-error evt-error"><?php echo form_error('evt-telefonop','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('E-mail');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-email','value' => set_value('evt-email'),'id'=> 'evt-email'))?>
								</div>
							</div>
							<div class="email-error evt-error"><?php echo form_error('evt-email','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Distrito');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-cbodistrito">
										<option>Seleccione Distrito</option>
										<?php for($i = 0; $i < count($distritos); $i++){?>
											<option value="<?php echo $distritos[$i]['id_distrito']?>"><?php echo $distritos[$i]['nom_dis']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="cbodistrito-error evt-error"></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Procedencia');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-cboprocedencia">
										<option>Seleccione Procedencia</option>
										<?php for($i = 0; $i < count($procedencia); $i++){?>
											<option value="<?php echo $procedencia[$i]['id_proce']?>"><?php echo $procedencia[$i]['nom_proce']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="cboprocedencia-error evt-error"></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Agregar eventos');?>
								</div>
								<div class="evt-adde"><a href="#"  onclick="document.getElementById('id01').style.display='block'">Agregar un evento</a></div>

								<div class="field-content campostext">
									<div class="evt-adde">
											<div class="evt-nomev"><?php echo form_input(array('class' => 'form-control evt-opcion', 'name' => 'evt-opcion','type' => 'hidden'))?></div>
											<div class="evt-fecev"><?php echo form_input(array('class' => 'form-control','type' => 'hidden'))?></div>
											<div class="evt-horev"><?php echo form_input(array('class' => 'form-control','type' => 'hidden'))?></div>

									</div>
								</div>
							</div>
							<div class="evt-message evt-error"></div>
							<div class="mtotal-error evt-error"></div>

							<div class="input-content input-new">
								<div class="label-content">
								.
								</div>
								<div class="field-content">
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary evt-regpn','name' => 'submit','value' => 'Registrar Ponente','id' => 'evt-regpn'))?>
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

							<?php echo form_close();?>
						</div>
						 <?php
			 			if($this->session->flashdata('Message')!='')
						 {
							echo $this->session->flashdata('Message');
			 				}?>
						<div id="id01" class="w3-modal">

  							<div class="w3-modal-content w3-animate-zoom">
  								<div class="w3-header">
  									Lista de eventos <span title ="Cerrar" class="icon-cancel-circle" onclick="document.getElementById('id01').style.display='none'" ></span>
  								</div>
  								<div class="w3-contenido">
  									<div class="evt-table">
				
										<table class="table table-hover ">
											<thead>
											<tr  class="table-header">
												<th>Id Evento</th>
												<th>Nombre</th>
												<th>Precio</th>
												<th>Ambiente</th>
												<th>Categoria</th>
												<th>Agregar</th>
											</tr>
											</thead>

											<?php foreach($eventos as $clave => $value){?>
												<tr class="table-hov">
													<td><?php echo $value['id_evento']?> </td>
													<td><?php echo $value['nom_evento']?></td>
													<td>S/. <?php echo $value['precio']?></td>
													<td><?php echo $value['ambiente']?></td>
													<td><?php echo $value['nom_categoria']?></td>
													<td colspan ="2" ><a href="#" id="<?php echo $value['id_evento']?>" ><button class = "<?php echo $value['id_evento']?> ">Agregar</button></a></td>

												</tr>
											<?php }?>
										</table>
									</div>
  								</div>
  								<div class="w3-footer">
  								</div>
							</div>
  						</div>


				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
				$(document).on("ready",function(){
					var maxInputs = 8;
					var contenedor = $(".campostext");
					var x = $(".campostext.evt-adde").length +1;
					var fieldCont = x-1;

					$("button").on("click",function(e){
						var select = $(this).attr('class');
						var url = "<?php echo base_url()?>home/obtener_evento";
						$(".evt-opcion").val(select);
						$.ajax({
							url:url,
							type: 'post',
							data: {id:select},
							success:function(data){
								 var json=JSON.parse(data);
								 console.log(json[0]['nom_evento']);
								if(x <= maxInputs){
									fieldCont++;
									$(".campostext").append("<div class = 'evt-adde'><div class='evt-nomev'><input type = 'text'  class = 'form-control' style = 'font-size:12px' value = "+json[0]['nom_evento']+"></div><div class='evt-fecev'><input type = 'text' class = 'form-control' style = 'font-size:12px' value = "+json[0]['fecha_evento']+"></div><div class='evt-horev'><input type = 'text' class = 'form-control' style = 'font-size:12px' value = "+json[0]['hora_ini']+"></div><div class='evt-eliminar'><a title ='Eliminar' href='#' class='eliminar'>&times;</a></div></div></div><input type = 'hidden' name = 'idevento[]' value ="+select+">");
									x++;
								}
								$(".w3-modal").hide();
								return false;
							}
						});
						return false;
					});
					$("body").on("click",".eliminar", function(e){
        				if( x > 1 ) {
            				$(this).parent('div').parent('div').remove();
            				x--;
        				}
        				return false;
    				});
    				$("#evt-regpn").on("click",function(){
    					var url = "<?php echo base_url()?>home/registrar_ponente";
    					$.ajax({
    						url:url,
    						type: 'post',
    						data:$(".evt-newevent").serialize(),
    						success:function(data){
    							if(data != 1){
									var json = JSON.parse(data);
									if(data == 0){
										$(".evt-message").html("<div class = 'evt-error-event'>Agregue taller o conferencia del ponente</div>");
									}
									$(".nombrep-error").html(json.nombrep);
									$(".apellidop-error").html(json.apellidop);
									$(".apellidom-error").html(json.apellidom);
									$(".dnip-error").html(json.dnip);
									$(".telefonop-error").html(json.telefonop);
									$(".email-error").html(json.emailp);
									$(".cbodistrito-error").html(json.cbodistrito);
									$(".cboprocedencia-error").html(json.cboprocedencia);
    							}else{
    								window.location.href = "<?php echo base_url()?>home/ponentes";
    							}
    							return false;
    						}
    					});
    					return false;
    				});
				});
			</script>
</body>
</html>