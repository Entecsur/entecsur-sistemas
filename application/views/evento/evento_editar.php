<div class="evt-form" style="display:none" >
							<div class="error"></div>
							<?php 
							$url = base_url('home/eventos/editar-evento');
							?> <input type = "hidden" class="evt-obtnerevento" value = "<?php echo base_url('home/obtener_evento')?>"><?php

							echo form_open($url,array('class' => 'evt-newevent','id'=>'evt-newevent'));
							echo form_input(array('class' => 'evt-condicion','name' => 'evt-condicion', 'type'=> 'hidden'));
							echo form_input(array('id' => 'evt-ideventoo','name' => 'evt-ideventoo','type'=>'hidden','value' => set_value('evt-idevento')));

							?>
							<div class="input-content idevento">
								<div class="label-content">
									<?php echo form_label('Id Evento');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control', 'name' =>'idevento','value' => set_value('idevento'),'id' => 'evt-idevento'))?>
								</div>
							</div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Nombre del evento');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-nombre', 'value' => set_value('evt-nombre'),'id' => 'evt-nombre'))?>

								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-nombre','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Categoría');?>
								</div>
								<div class="field-content">
									<select class="field-cbo form-control" name="evt-categoria" id="evt-categoria">
										<option value="0">Seleccione</option>
										<option value="001">Evento</option>
										<option value="002">Taller</option>
									</select>
								</div>
							</div>

							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Precio');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-precio','value' => set_value('evt-precio'),'id' => 'price'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-precio','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Fecha');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-fecha','value' => set_value('evt-fecha'),'id' => 'datepicker' ))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-fecha','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Hora');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-hora','value' => set_value('evt-hora'),'type'=>'time','id' => 'evt-hora'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-hora','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content">
								<div class="label-content">
									<?php echo form_label('Ambiente');?>
								</div>
								<div class="field-content">
									<?php echo form_input(array('class' => 'field-event form-control','name' => 'evt-ambiente','value' => set_value('evt-ambiente'),'id'=> 'evt-ambiente'))?>
								</div>
							</div>
							<div class="evt-error"><?php echo form_error('evt-ambiente','<div class = "evt-error-event">','</div>');?></div>
							<div class="input-content input-new">
								<div class="label-content">
								.
								</div>
								<div class="field-content">
									<?php echo form_submit(array('class' => 'field-submit btn btn-primary','name' => 'submit','value' => 'Registrar'))?>
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

							<?php echo form_close();?>
							 <?php
			 			if($this->session->flashdata('Message')!='')
						 {
							echo $this->session->flashdata('Message');
			 				}?>
</div>

