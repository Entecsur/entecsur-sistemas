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
	"usuario" => array(
		array(
			'field' =>'evt-nombrep',
			'label' =>'Nombres',
			'rules' =>'required|is_string|trim'
			),
		array(
			'field' => 'evt-apellidop',
			'label' => 'Apellido Paterno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-apellidom',
			'label' => 'Apellido Materno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-dnip',
			'label' => 'Doc. de Identidad',
			'rules' => 'required|is_string|trim'
			),
		/*array(
			'field' => 'evt-cbosex',
			'label' => 'Sexo',
			'rules' => 'required|validaCheckbox'
			),*/
		array(
			'field' => 'evt-telefonop',
			'label' => 'Teléfono',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'evt-email',
			'label' => 'E-mail',
			'rules' => 'required|is_string|trim|valid_email'
			),
		array(
			'field' => 'evt-cbodistrito',
			'label' => 'Distrito',
			'rules' => 'required|validaCheckbox'
			),
		array(
			'field' => 'evt-cboprocedencia',
			'label' => 'Procedencia',
			'rules' => 'required|validaCheckbox'
			),
		/*array(
			'field' => 'evt-cbocargo',
			'label' => 'Cargo',
			'rules' => 'required|validaCheckbox',
			),*/
		array(
			'field' => 'evt-usuario',
			'label' => 'Usuario',
			'rules' => 'required|is_string|trim',
			),
		array(
			'field' => 'evt-password',
			'label' => 'Password',
			'rules' => 'required|is_string|trim',
			),
		array(
			'field' => 'evt-repassword',
			'label' => 'Repassword',
			'rules' => 'required|is_string|trim'
			),
		),
	"preinscripcion" => array(
		array(
			'field' => 'nombre',
			'label' => 'Nombres',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'paterno',
			'label' => 'Apellido paterno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'materno',
			'label' => 'Apellido Materno',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'doc_id',
			'label' => 'Doc. de Identidad',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'fec_nac',
			'label' => 'Fec. de Nacimiento',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'distrito',
			'label' => 'Distrito',
			'rules' => 'validaCheckbox'
			),
		array(
			'field' => 'telef',
			'label' => 'Teléfono',
			'rules' => 'required|is_string|trim'
			),
		array(
			'field' => 'correo',
			'label' => 'Correo',
			'rules' => 'required|valid_email'
			),
		array(
			'field' => 'proced',
			'label' => 'Procedencia',
			'rules' => 'validaCheckbox'
			),
		/*array(
			'field' => 'sexo',
			'label' => 'Sexo',
			'rules' => 'validaCheckbox'
			),*/
		),

	);