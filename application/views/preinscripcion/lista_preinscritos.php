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
									<li><a href="<?php echo base_url()?>home/preinscripcion/<?php echo $value['link']?>" class ="<?php echo $value['link']?>"  ><span class ="<?php echo $value['img_priv']?>"></span><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>

						<div class="evt-search">
							<?php
							//echo form_open('home/search_preinscritos',array('class' =>'evt-formbuscar'));
							?><div class="evt-input-search"><?php echo form_input(array('class' => 'evt-spreinscritos form-control','id' => 'evt-spreinscritos','name' => 'evt-spreinscritos','placeholder' => 'Buscar pre-inscritos'));?></div>
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
									<th>E-mail</th>
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
										<td><?php echo $value['correo']?></td>
										<td><?php echo $value['ambiente']?></td>
										<td colspan ="2" ><a  title="ver detalle" href="<?php echo base_url()?>home/preinscripcion/editar-preinscritos/<?php echo $value['idpersona']?>" onclick="ver_detalle_inscripcion('<?php echo $value['idpersona']?>');" ><span  class="icon-pen" ></span>ver detalle</a></td>

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
                            	console.log(data);
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

                $(document).on("ready",function(){
                	$("input#evt-regp").on("click",function(e){
                		e.preventDefault();
                		var url = "<?php echo base_url()?>home/registrar_pagos";
                		$.ajax({
                			url:url,
                			type:"post",
                			data: $(".evt-newevent").serialize(),
                			success:function(data){
                				if(data != 1){
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
                					return false;
                				}else{
                					window.location.href = "<?php echo base_url()?>home/pagos";
                					return false;
                				}
                			},
                		});
                		return false;
                	});
				 $("input#evt-spreinscritos").on("keyup",function(){
				 	var url = "<?php echo base_url()?>home/search_preinscritos";
				 	var nombre = $(this).val();
				 	$.ajax({
				 		url:url,
				 		type: "post",
				 		data: {search : nombre},
				 		success:function(data){
				 			$(".evt-table").html(data);
				 		}
				 	});
				 });
                });

			</script>
</body>
</html>