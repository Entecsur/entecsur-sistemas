<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {

	var $CI;
	public function __construct()
	{

		$this->CI = & get_instance();

	}

	public function get_usuario()
	{
		if(!$this->CI->session->userdata('usuario'))
			$this->set_usuario(array());

		return $this->CI->session->userdata('usuario');
	}

	public function set_usuario($usuario=array())
	{
		$this->CI->session->set_userdata('usuario',$usuario);
	}

	public function add_usuario($user){
		$usuario = $this->get_usuario();
		$usuario['persona'] = $user;
		$this->set_usuario($usuario);
		return true;
	}

	public function filtrar_array(&$array, $clave_orden) 
			{
  				$array_filtrado = array(); 
  				foreach($array as $index=>$array_value) 
  				{
	    			$value = $array_value[$clave_orden];
	    			unset($array_value[$clave_orden]);
	    			$array_filtrado[$value][] = $array_value;
    			}

 			 		$array = $array_filtrado; 
			}

	public function zerofill($valor, $longitud)
	{
 		$res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
 		return $res;
	}

	public function  removeleft($id)
	{
		$remove = str_replace('E','0',$id);
		return (int)$remove;
	}

	public function removeleftp($id){
		$remove = str_replace('PG','0',$id);
		return (int)$remove;
	}

	public function _monto_total($datos)
	{
			$total = 0;
			foreach($datos as $key => $value){
				foreach($value as $k => $v){
					$total += $v['precio'];
				}
			}
			return $total;
	}
	public function list_preinscritos($preinscritos){
		?>
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
		<?php
	}
	public function list_event($eventos){
		?>

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
										<td colspan ="2" ><a href="#" title="Editar" onclick="editar('<?php echo $value['id_evento']?>');"><span class="icon-pen"></span></a></td>
									</tr>
								<?php }?>
							</table>
			<?php

	}

}