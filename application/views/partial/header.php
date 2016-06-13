
	<div class="evt-content">
		<nav >
			<div class="evt-logo">ENTECSUR</div>
			<div class="evt-nav">

				<ul>
				<li><a href="<?php echo base_url()?>home"><span class ="icon-home5"></span>Inicio</a></li>
				<?php
				$usuario = $this->user->get_usuario();
				$row  = $usuario['persona']['privilegios'];
				$this->user->filtrar_array($row,'nombre_cat');
				
				foreach($row as $categoria => $priv){?>
					<li>
						<a href ="<?php echo base_url()?>home/<?php echo strtolower(str_replace('ó', 'o',$categoria)) ;?>">
							<span class="<?php echo $priv[0]['img_cat']?>"></span>
							<?php echo $categoria;?>
						</a>
					</li>
				<?php } ?>
				 <li><a href="<?php echo base_url()?>login/logout"><span class="icon-switch"></span>Salir</a></li>
				</ul>
			</div>
		</nav>
		<section>
			<div class="evt-header">
				<div class="evt-h1">untecs</div>
				<div class="evt-h2"><p><?php echo $usuario['persona']['personas'][0]['nom_part']." ".$usuario['persona']['personas'][0]['ape_pater']?> | <a href="<?php echo base_url()?>login/logout">Salir</a></p></div>
			</div>