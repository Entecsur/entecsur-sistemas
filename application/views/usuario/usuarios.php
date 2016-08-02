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
									<li><a href="<?php echo base_url()?>home/usuarios/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form"  >
						<?php if($this->session->flashdata('Message')!=''){echo $this->session->flashdata('Message');}?>

							<?php 
							$url = base_url('home/usuarios');
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
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-nombrep', 'value' => set_value('evt-nombrep'),'id' => 'evt-nombrep'))?>

								</div>
							</div>
							<div class="nombrep-error evt-error"><?php echo form_error('evt-nombrep','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Apellido Paterno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidop','value' => set_value('evt-apellidop'),'id' => 'evt-apellidop'))?>
								</div>
							</div>
							<div class="apellidop-error evt-error"><?php echo form_error('evt-apellidop','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Apellido Materno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidom','value' => set_value('evt-apellidom'),'id' => 'evt-apellidom'))?>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-apellidom','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Doc. de Identidad');?>
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
									<select class="field-cbo form-control " name="evt-cbosex" id="evt-cbosex">
										<option >Seleccione</option>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-cbosex','<div class = "evt-error-event">','</div>');?></div>


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
									<select class="field-cbo form-control" name="evt-cbodistrito" id="evt-cbodistrito">
										<option>Seleccione Distrito</option>
										<?php for($i = 0; $i < count($distritos); $i++){?>
											<option value="<?php echo $distritos[$i]['id_distrito']?>"><?php echo $distritos[$i]['nom_dis']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-cbodistrito','<div class = "evt-error-event">','</div>');?></div>


							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Procedencia');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-cboprocedencia" id="evt-cboprocedencia">
										<option>Seleccione Procedencia</option>
										<?php for($i = 0; $i < count($procedencia); $i++){?>
											<option value="<?php echo $procedencia[$i]['id_proce']?>"><?php echo $procedencia[$i]['nom_proce']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-cboprocedencia','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Cargo');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-cbocargo" id="evt-cbocargo">
										<option>Seleccione Cargo</option>
										<?php for($i = 0; $i < count($cargos); $i++){?>
											<option value="<?php echo $cargos[$i]['id_Cargo']?>"><?php echo $cargos[$i]['nom_cargo']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-cbocargo','<div class = "evt-error-event">','</div>');?></div>


							<div class="input-content">
								<hr>
								Usuario
								<hr>
							</div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Usuario');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-usuario','value' => set_value('evt-usuario'),'id'=> 'evt-usuario'))?>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-usuario','<div class = "evt-error-event">','</div>');?></div>

							<div class="evt-error"><?php if($this->session->flashdata('Message_')!=''){echo $this->session->flashdata('Message_');}?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Password');?>
								</div>
								<div class="field-content">
									<?php echo form_password(array('class' => 'field-event form-control','name' => 'evt-password','value' => set_value('evt-password'),'id'=> 'evt-password'))?>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-password','<div class = "evt-error-event">','</div>');?></div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Re-password');?>
								</div>
								<div class="field-content">
									<?php echo form_password(array('class' => 'field-event form-control','name' => 'evt-repassword','value' => set_value('evt-password'),'id'=> 'evt-repassword'))?>
								</div>
							</div>
							<div class="apellidom-error evt-error"><?php echo form_error('evt-repassword','<div class = "evt-error-event">','</div>');?></div>

							<div class="evt-error"><?php if($this->session->flashdata('Message___')!=''){echo $this->session->flashdata('Message___');}?></div>

							<div class="repassword-error evt-error"></div>
							<div class="input-content">
							<input type="hidden" name="evt-opcion" value="add">
								<hr>
									Privilegios
								<hr>
							</div>
							<div class=""><?php if($this->session->flashdata('Message__')!=''){echo $this->session->flashdata('Message__');}?></div>

							<div class="input-content">
								<table class="table table-bordered">
									<tr>
										<th>#</th>
										<th>Privilegios</th>
										<th>Modulo</th>
									</tr>
									<?php for($i = 0; $i <count($listpriv); $i++){?>
									<tr>
										<td><input type="checkbox" value="<?php echo $listpriv[$i]['idprivilegios']?>" class="" name="evt-privilegios[]"></td>
										<td><?php echo $listpriv[$i]['label']?></td>
										<td><?php echo $listpriv[$i]['nombre_cat']?></td>
									</tr>
									<?php }?>

								</table>

							</div>

							<div class="evt-message evt-error"></div>
							<div class="mtotal-error evt-error"></div>

							<div class="input-content input-new">
								<div class="label-content">
								.
								</div>
								<div class="field-content" >
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary evt-regpn','name' => 'submit','value' => 'Registrar Usuario','id' => 'evt-regpn'))?>
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
							<input type="hidden" class="evt-idpersona" name="evt-idpersona" id="evt-idpersona" >
							<input type="hidden" name="regp" value="editarp">
							<?php echo form_close();?>
						</div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
			$(document).on("ready",function(){
				$("input#evt-repassword").on("keyup",function(){
					var password = $("input#evt-password").val();
					var repassword = $("input#evt-repassword").val();
					if(password == repassword){
						$(".repassword-error").hide();
					}else{
						$(".repassword-error").html("<div class = 'evt-error-event'>Password y repassword no coinciden</div>");
					}
				});
			});
			</script>

</body>
</html>