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
			'rules' => 'required|is_string|trim'
			),
		),
	);