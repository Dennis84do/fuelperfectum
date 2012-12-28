		<div class="box-content">
			<?php echo Form::open(array('class' => 'form-horizontal')); ?>
			 	<fieldset>
			 		
				 	<div class="control-group">	
						<?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>

						<div class='controls'><?php echo Form::input('name', Input::post('name', isset($animal) ? $animal->name : ''), array('class' => 'span4')); ?></div>
					</div>  
						
				 	<div class="control-group">	
						<?php echo Form::label('Age', 'age', array('class' => 'control-label')); ?>

						<div class='controls'><?php echo Form::input('age', Input::post('age', isset($animal) ? $animal->age : ''), array('class' => 'span4')); ?></div>
					</div>  
					
					<div class="form-actions">
						<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
					</div>

				</fieldset>
			<?php echo Form::close(); ?> 
		</div>