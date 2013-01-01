<!-- Show Object Overview -->
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-list"></i><span class="break"></span>Overview <?php echo \Str::ucfirst($plural_name); ?></h2>
			<div class="box-icon">
				<a href="/<?php echo $uri.'/create'; ?>"><i class="icon-plus"></i></a>
				<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<?php echo "<?php if (\${$plural_name}): ?>\n"; ?>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  	<thead>
					<tr>
		<?php foreach ($fields as $field): ?>
				<?php if ($field['name'] != 'xml'): ?><?php echo "\n" ?>
						<th><?php echo \Inflector::humanize($field['name']); ?></th>
				<?php endif; ?><?php echo "\n" ?>
		<?php endforeach; ?>
				<th>Actions</th>
					</tr>
			  	</thead>   
			  	<tbody>
			  	<?php echo "<?php"; ?> foreach ($<?php echo $plural_name; ?> as $<?php echo $singular_name; ?>): <?php echo "?>\n"; ?>
			  		<tr>
		<?php foreach ($fields as $field): ?>
		<?php if ($field['name'] != 'xml'): ?><?php echo "\n" ?>
						<td><?php echo "<?php"; ?> echo $<?php echo $singular_name."->".$field['name']; ?>; <?php echo "?>"; ?></td>
		<?php endif; ?><?php echo "\n" ?>
		<?php endforeach; ?>
				<td class="center">
							<a class="btn btn-success" href="#viewModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>" data-toggle="modal">
								<i class="icon-eye-open icon-white"></i>  
							</a>
							<a class="btn btn-info" href="/<?php echo $uri; ?>/edit/<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>">
								<i class="icon-edit icon-white"></i>  
							</a>
							<a class="btn btn-danger" href="#deleteModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>" data-toggle="modal">
								<i class="icon-trash icon-white"></i> 
							</a>	
							<?php echo "<?php if (\${$singular_name}->xml): ?>\n"; ?>
								<a class="btn btn-warning" href="#xmlModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>" data-toggle="modal">
									<i class="icon-comment icon-white"></i> 
								</a>
							<?php echo "<?php endif; ?>\n"; ?>
						</td>
					</tr>
				<?php echo "<?php endforeach; ?>\n"; ?>
			  	</tbody>
		  	</table>            
		</div>
		<?php echo "<?php else: ?>\n"; ?>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
		<?php foreach ($fields as $field): ?>
		<?php if ($field['name'] != 'xml'): ?><?php echo "\n" ?>
						<th><?php echo \Inflector::humanize($field['name']); ?></th>
		<?php endif; ?><?php echo "\n" ?>
		<?php endforeach; ?>
				<th>Actions</th>
				  	</tr>
				</thead>   
		  	</table>            
		</div>		
		<?php echo "<?php endif; ?>\n"; ?>
	</div><!--/span-->
</div><!--/row-->

<?php echo "<?php if (\${$plural_name}): ?>\n"; ?>
	<?php echo "<?php"; ?> foreach ($<?php echo $plural_name; ?> as $<?php echo $singular_name; ?>): <?php echo "?>\n"; ?>
		<!-- Modal View Object -->
		<div class="modal hide fade" id="viewModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>View <?php echo \Str::ucfirst($singular_name); ?> #<?php echo "<?php"; ?> echo $<?php echo $singular_name; ?>->id; <?php echo "?>"; ?></h3>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<?php foreach ($fields as $field): ?>
			<tr><th><?php echo \Inflector::humanize($field['name']); ?></th><td><?php echo "<?php"; ?> echo $<?php echo $singular_name."->".$field['name']; ?>; <?php echo "?>"; ?></td></tr>
		<?php endforeach; ?>
		</table>            
			</div>
			<div class="modal-footer">
				<?php echo Form::submit(array('name'=>'cancel','value'=>'Back','class'=>'btn btn-success','data-dismiss'=>'modal')); ?><?php echo "\n" ?>
			</div>
		</div>	
		<?php echo "<?php if (\${$singular_name}->xml): ?>\n"; ?>
			<!-- Modal XML Object -->
			<div class="modal hide fade" id="xmlModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h3>XML View <?php echo \Str::ucfirst($singular_name); ?> #<?php echo "<?php"; ?> $<?php echo $singular_name; ?>->id; <?php echo "?>"; ?></h3>
				</div>
				<div class="modal-body">
					<?php echo "<?php echo \Theme::instance()->view('xml/popup')->set('xml', \${$singular_name}->xml); ?>\n"; ?>
				</div>
				<div class="modal-footer">
					<input name="cancel" value="Back" class="btn btn-warning" data-dismiss="modal" type="submit" id="form_cancel" />
				</div>
			</div>	
		<?php echo "<?php endif; ?>\n"; ?>
		<!-- Modal Delete Object -->
		<div class="modal hide fade" id="deleteModal_<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>Delete <?php echo \Str::ucfirst($singular_name); ?> #<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?></h3>
			</div>
			<div class="modal-body">		
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<?php foreach ($fields as $field): ?>
			<tr><th><?php echo \Inflector::humanize($field['name']); ?></th><td><?php echo '<?php'; ?> echo $<?php echo $singular_name.'->'.$field['name']; ?>; <?php echo '?>'; ?></td></tr>
		<?php endforeach; ?>
	    </table>            
			</div>
			<div class="modal-footer">
				<form action="/<?php echo $uri.'/delete/' ?><?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>" accept-charset="utf-8" method="post">
					<input name="delete_id" value="<?php echo '<?php'; ?> echo $<?php echo $singular_name; ?>->id; <?php echo '?>'; ?>" type="hidden" id="form_delete_id" />
					<?php echo Form::submit(array('name'=>'cancel','value'=>'Abort','class'=>'btn btn-success','data-dismiss'=>'modal')); ?><?php echo "\n" ?>
					<?php echo Form::submit(array('name'=>'submit','value'=>'Delete','class'=>'btn btn-danger')); ?><?php echo "\n" ?>
				</form>
			</div>
		</div>	
	<?php echo "<?php endforeach; ?>\n"; ?>
<?php echo "<?php endif; ?>\n"; ?>