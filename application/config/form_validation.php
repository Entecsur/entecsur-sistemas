<?php

$config = array(
	"login" => array(
		array(
			'field' => 'evt-usuario',
			'label' => 'Usuario',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-password',
			'label' => 'Password',
			'rules' => 'required|is_string|trim',
			),
		),
	"evento" => array(
		array(
			'field' => 'evt-nombre',
			'label' => 'Evento',
			'rules' =>'required|is_string|trim'
			),
		array(
			'field' => 'evt-precio',
			'label' => 'Precio',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-fecha',
			'label' => 'Fecha',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-hora',
			'label' => 'Hora',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-ambiente',
			'label' => 'Ambiente',
			'rules' => 'required|is_string|trim'
			),
		),
	"pagos" => array(
		array(
			'field' => 'evt-nombrep',
			'label' => 'Nombres',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-apellidosp',
			'label' => 'Apellidos',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-dnip',
			'label' => 'DNI',
			'rules' =>'required|is_string|trim'
			),
		array(
			'field' => 'evt-telefonop',
			'label' => 'Teléfono',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-procedenciap',
			'label' => 'Procedencia',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-numbol',
			'label' => 'Numero de boleta',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-cursos[]',
			'label' => 'Cursos',
			'rules' => 'required'
			),
		array(
			'field' => 'evt-mtotal',
			'label' =>'Monto total',
			'rules' => 'required|is_string|trim'
			)
		),
	"ponentes"  => array(
		array(
			'field' => 'evt-nombrep',
			'label' => 'Nombres',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-apellidop',
			'label' => 'A. Paterno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-apellidom',
			'label' => 'A. Materno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-dnip',
			'label' => 'Dni',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-telefonop',
			'label' => 'Teléfono',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-email',
			'label' => 'E-mail',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-cbodistrito',
			'label' => 'Distrito',
			'rules' => 'validaCheckbox'
			),
		
		array(
			'field' => 'evt-cboprocedencia',
			'label' => 'Procedencia',
			'rules' => 'validaCheckbox'
			),

		),
	);