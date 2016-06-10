<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Evento || Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.css">
</head>
<body>
	<h3>Bienvenido:<?php echo $usuario['persona']['personas'][0]['nom_part']." ".$usuario['persona']['personas'][0]['ape_pater']?> </h3>
	<h4>Usuario: <?php echo $usuario['persona']['personas'][0]['usuario_nom']?></h4>
	<h4>Password: <?php echo $usuario['persona']['personas'][0]['pass']?></h4>
	<h4>Cargo: <?php echo $usuario['persona']['personas'][0]['nom_cargo']?> </h4>

<table class="table table-hover">
	<thead>
		<th class="success">Id privilegio</th>
		<th class="warning">Privilegio</th>
		<th class="danger">Url</th>
	</thead>
	
		<?php for($i = 0; $i < count($usuario['persona']['privilegios']); $i++){?>
		<tr class="info">
		<td><?php echo $usuario['persona']['privilegios'][$i]['idprivilegios'];?></td>
		<td><?php echo $usuario['persona']['privilegios'][$i]['label'];?></td>
		<td><a href="<?php echo base_url()?>home/<?php echo str_replace(' ', '-',$usuario['persona']['privilegios'][$i]['link']);?>">Ir</a></td>
		</tr>
   <?php }?>
	
</table>




<a href="<?php echo base_url()?>login/logout">Cerrar Session</a>
</body>
</html>