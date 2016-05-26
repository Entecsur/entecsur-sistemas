<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->lang->line('evt-title')?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src = "<?php echo base_url()?>public/js/jquery.js"></script>
	<script type="text/javascript" src = "<?php echo base_url()?>public/js/event.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/event.css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="<?php echo base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="evt-content">

		<div class="evt-login"><?php echo $this->lang->line("evt-logo")?></div>
		<div class="evt-form">
			 <?php 
			 if($this->session->flashdata('Message')!='')
			 {
					echo $this->session->flashdata('Message');
			 }?>
			<?php echo form_open('login',array('class' => 'evt-form-login'));?>
			<label><?php echo $this->lang->line('evt-usuario')?></label>
			<?php echo form_input(array('type' => 'text','name' => 'evt-usuario','class' => 'evt-user','id' => 'usuario','value' => set_value('evt-usuario')))?>
			<?php echo form_error('evt-usuario','<span class = "evt-error-user">','</span>');?><br>
			<label><?php echo $this->lang->line('evt-password')?></label>
			<?php echo form_input(array('type' => 'password','name' => 'evt-password', 'class' => 'evt-user','id' =>'password', 'value' => set_value('evt-password')))?>
			<?php echo form_error('evt-password','<span class = "evt-error-password">','</span>');?>
			<?php echo form_submit(array('class' => 'evt-submit btn btn-primary','name' => 'evt-submit'),'Ingresar')?>
			<?php echo form_close();?>
		</div>
		<!--<div class="evt-login-footer">footer</div>-->
	
</div>
</body>
</html>
