		<div class="box-content">
			<?php echo "<?php echo Form::open(array('class' => 'form-horizontal')); ?>" ?><?php echo "\n" ?>
			 	<fieldset>
			 	<?php foreach ($fields as $field): ?>
			 	<?php if ($field['name'] != 'xml'): ?><?php echo "\n" ?>
					<div class="control-group">	
						<?php echo "<?php echo Form::label('". \Inflector::humanize($field['name']) ."', '{$field['name']}', array('class' => 'control-label')); ?>\n"; ?><?php echo "\n" ?>
		<?php switch($field['type']):
			case 'text':
				echo "\t\t\t\t<div class='controls'><?php echo Form::textarea('{$field['name']}', Input::post('{$field['name']}', isset(\${$singular_name}) ? \${$singular_name}->{$field['name']} : ''), array('class' => 'cleditor', 'rows' => 4)); ?></div>\n";
			break;

			default:
				echo "\t\t\t\t<div class='controls'><?php echo Form::input('{$field['name']}', Input::post('{$field['name']}', isset(\${$singular_name}) ? \${$singular_name}->{$field['name']} : ''), array('class' => 'span4')); ?></div>\n";
		endswitch; ?>
					</div> 
					<?php endif; ?>
					<?php endforeach; ?>

					<div class="form-actions">
						<?php echo "<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>"; ?><?php echo "\n" ?>
					</div>

				</fieldset>
			<?php echo "<?php echo Form::close(); ?>"; ?> 
		</div>