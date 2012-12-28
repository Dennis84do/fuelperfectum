		<div class="box-content">
			<?php echo Form::open(array('class' => 'form-horizontal')); ?>
			  <fieldset>
				<div class="control-group">	
				  <?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>
				  <div class="controls"><?php echo Form::input('name', Input::post('name', isset($monkey) ? $monkey->name : ''), array('class' => 'span4')); ?></div>
				</div>      
				<div class="control-groupe">
				  <?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?>
				  <div class="controls"><?php echo Form::textarea('description', Input::post('description', isset($monkey) ? $monkey->description : ''), array('class' => 'cleditor', 'rows' => 4)); ?><br></div>
				</div>
				<div class="control-groupe">
				  <?php echo Form::label('Bio', 'bio', array('class' => 'control-label')); ?>		
				  <div class="controls"><?php echo Form::textarea('bio', Input::post('bio', isset($monkey) ? $monkey->bio : ''), array('class' => 'cleditor', 'rows' => 4)); ?><br></div>
				</div>			
				<div class="form-actions">
				  <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
				</div>
			  </fieldset>
			<?php echo Form::close(); ?>   
		</div>