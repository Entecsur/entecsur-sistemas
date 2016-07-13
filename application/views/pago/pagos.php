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
									<li><a href="<?php echo base_url()?>home/eventos/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-form" style="display:none">
							<?php 
							$url = base_url('home/pagos');
							?> <input type = "hidden" class="evt-obtnerevento" value = "<?php echo base_url('home/obtener_evento')?>"><?php

							echo form_open($url,array('class' => 'evt-newevent','id'=>'evt-newevent'));
							echo form_input(array('class' => 'evt-condicion','name' => 'evt-condicion', 'type'=> 'hidden'));
							echo form_input(array('id' => 'evt-ideventoo','name' => 'evt-ideventoo','type'=>'hidden'));
							?>
						
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
									<?php echo form_label('Apellidos');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-apellidosp','value' => set_value('evt-apellidosp'),'id' => 'evt-apellidosp'))?>
								</div>
							</div>
							<div class="apellidosp-error evt-error"><?php echo form_error('evt-apellidosp','<div class = "evt-error-event">','</div>');?></div>
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
									<?php echo form_label('Telefóno');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-telefonop','value' => set_value('evt-telefonop'),'id' => 'evt-telefonop'))?>
								</div>
							</div>
							<div class="telefonop-error evt-error"><?php echo form_error('evt-telefonop','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Procedencia');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-procedenciap','value' => set_value('evt-procedenciap'),'id'=> 'evt-procedenciap'))?>
								</div>
							</div>
							<div class="procedenciap-error evt-error"><?php echo form_error('evt-procedenciap','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Codigo de Boleta');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-numbol','value' => set_value('evt-numbol'),'id'=> 'evt-numbol'))?>
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
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-mtotal','value' => set_value('evt-mtotal'),'id'=> 'evt-mtotal'))?>
								</div>
							</div>
							<div class="mtotal-error evt-error"></div>

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
							<input type="hidden" class="evt-idpersona">

							<?php echo form_close();?>
							 <?php
			 			if($this->session->flashdata('Message')!='')
						 {
							echo $this->session->flashdata('Message');
			 			}?>
						</div>

						<div class="evt-search">
							<?php
							echo form_open('home/search_event',array('class' =>'evt-formbuscar'));
							?><div class="evt-input-search"><?php echo form_input(array('class' => 'evt-buscar form-control','id' => 'evt-buscar','name' => 'evt-buscar','placeholder' => 'Buscar pagos'));?></div>
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
									<th>Id Persona</th>
									<th>Nombres</th>
									<th>Dni</th>
									<th>Teléfono</th>
									<th>Evento</th>
									<th>Precio</th>
									<th>Ambiente</th>
									<th></th>
								</tr>
								</thead>

								<?php foreach($preinscritos as $clave => $value){?>
									<tr class="table-hov">
										<td><?php echo $value['idpersona']?> </td>
										<td><?php echo $value['nom_part']." ".$value['ape_mater'];?></td>
										<td><?php echo $value['doc_id']?></td>
										<td><?php echo $value['telf']?></td>
										<td><?php echo $value['nom_evento']?></td>
										<td><?php echo $value['precio']?></td>
										<td><?php echo $value['ambiente']?></td>
										<td colspan ="2" ><a  title="ver detalle" href="#" onclick="ver_detalle_inscripcion('<?php echo $value['idpersona']?>');" ><span  class="icon-pen" ></span>ver detalle</a></td>

									</tr>
								<?php }?>
							</table>
						</div>
						<div class="prueba"></div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
			<script type="text/javascript">
				function ver_detalle_inscripcion(id){
                    var url = "<?php echo base_url('home/obtner_preincritos')?>";
                    $.ajax({
                            url: url,
                            type: "POST",
                            data:{idpersona:id},
                            success:function(data){
                               //console.log(data);
                               var json = JSON.parse(data);
                             	$("input#evt-nombrep").val(json['preinscritos'][0]['nom_part']);
                                $("input#evt-apellidosp").val(json['preinscritos'][0]['ape_pater']+" "+json['preinscritos'][0]['ape_mater']);
                                $("input#evt-dnip").val(json['preinscritos'][0]['doc_id']);
                                $("input#evt-telefonop").val(json['preinscritos'][0]['telf']);
                                $("input#evt-procedenciap").val(json['preinscritos'][0]['nom_proce']);
                                $("input.evt-idpersona").val(json['preinscritos'][0]['idpersona']);
                                var out = "<div><strong>Cursos Preinscritos</strong></div>";
								var i;
								for(i = 0; i < json['preinscritos'].length; i++) {
									out +="<input type = 'checkbox' value="+json['preinscritos'][i]['precio']+" name = 'evt-cursos[]' checked > "+json['preinscritos'][i]['nom_evento'];
									out += "<input type = 'hidden' value = "+json['preinscritos'][i]['id_evento']+" name = 'evt-idevent[]'>";
									out += "<input type = 'hidden' value = "+json['preinscritos'][i]['precio']+" name = 'evt-precio[]'>";
    							}
    							
    							out+="<br>";
    							document.getElementById("input-contentt").innerHTML = out;
                                $(".evt-table").fadeOut();
                                $(".evt-search").fadeOut();
                                $("input#evt-mtotal").val(json['mtotal']);
                    			$(".evt-form").fadeIn();
                            }
                        });
                }

                function calcular(monto)
                {
                	var valor = 0;

                	$('input[name="evt-cursos[]"]:checked').each(function() 
					{
						valor += monto;
					});
					console.log(valor);
                }

                $(document).on("ready",function(){
                	$("input#evt-regp").on("click",function(){
                		var url = "<?php echo base_url()?>home/registrar_pagos";
                		//alert(url);
                		$.ajax({
                			url:url,
                			type:"post",
                			data: $(".evt-newevent").serialize(),
                			success:function(data){
                				console.log(data);
                				if(data == true){
                					console.log("se ha insertado de manera satisfactoria");
                				}else{
                					var json = JSON.parse(data);
                					$(".nombrep-error").html(json.nombrep);
                					$(".apellidosp-error").html(json.apellidosp);
                					$(".dnip-error").html(json.dnip);
                					$(".telefonop-error").html(json.telefonop);
                					$(".procedenciap-error").html(json.procedencia);
                					$(".numbolp-error").html(json.numbol);
                					$(".mtotal-error").html(json.mtotal);
                					if(json.cursos == true){
                						$(".cursos-error").hide();
                					}else{
                						$(".cursos-error").html(json.cursos);
                					}
                					
                				}
                			}
                		});
                		return false;
                	});
                });

			</script>
</body>
</html>