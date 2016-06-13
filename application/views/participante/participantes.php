<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Evento || Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/inicio.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/style.css">
</head>
<body>

			<?php $this->load->view('partial/header');?>
			<div class="evt-body">
				<div class="evt-contenido">
					<div class="evt-navh">
							<ul>
								<?php
								foreach($privilegios as $clave => $value){?>
									<li><a href=""><?php echo $value['label'] ?></a></li>
								<?php }?>
							</ul>
						</div>
				</div>
			</div>
			<?php $this->load->view('partial/footer');?>
		
</body>
</html>