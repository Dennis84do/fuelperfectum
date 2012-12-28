<!-- Show Object Overview -->
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-list"></i><span class="break"></span>Overview Animals</h2>
			<div class="box-icon">
				<a href="/animal/create"><i class="icon-plus"></i></a>
				<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<?php if ($animals): ?>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  	<thead>
					<tr>
						<th>Name</th>
						<th>Age</th>
						<th>Actions</th>
					</tr>
			  	</thead>   
			  	<tbody>
			  	<?php foreach ($animals as $animal): ?>
			  		<tr>
						<td><?php echo $animal->name; ?></td>
						<td><?php echo $animal->age; ?></td>
						<td class="center">
							<a class="btn btn-success" href="#viewModal_<?php echo $animal->id; ?>" data-toggle="modal">
								<i class="icon-eye-open icon-white"></i>  
							</a>
							<a class="btn btn-info" href="/animal/edit/<?php echo $animal->id; ?>">
								<i class="icon-edit icon-white"></i>  
							</a>
							<a class="btn btn-danger" href="#deleteModal_<?php echo $animal->id; ?>" data-toggle="modal">
								<i class="icon-trash icon-white"></i> 
							</a>					
						</td>
					</tr>
				<?php endforeach; ?>
			  	</tbody>
		  	</table>            
		</div>
		<?php else: ?>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Age</th>
						<th>Actions</th>
				  	</tr>
				</thead>   
		  	</table>            
		</div>		
		<?php endif; ?>
	</div><!--/span-->
</div><!--/row-->

<?php if ($animals): ?>
	<?php foreach ($animals as $animal): ?>
		<!-- Modal View Object -->
		<div class="modal hide fade" id="viewModal_<?php echo $animal->id; ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>View Animal #<?php echo $animal->id; ?></h3>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr><th>Name</th><td><?php echo $animal->name; ?></td></tr>
					<tr><th>Age</th><td><?php echo $animal->age; ?></td></tr>
				</table>            
			</div>
			<div class="modal-footer">
				<input name="cancel" value="Back" class="btn btn-success" data-dismiss="modal" type="submit" id="form_cancel" />
			</div>
		</div>	
		<!-- Modal Delete Object -->
		<div class="modal hide fade" id="deleteModal_<?php echo $animal->id; ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>Delete Animal #<?php echo $animal->id; ?></h3>
			</div>
			<div class="modal-body">		
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr><th>Name</th><td><?php echo $animal->name; ?></td></tr>
					<tr><th>Age</th><td><?php echo $animal->age; ?></td></tr>
			    </table>            
			</div>
			<div class="modal-footer">
				<form action="/animal/delete/<?php echo $animal->id; ?>" accept-charset="utf-8" method="post">
					<input name="delete_id" value="<?php echo $animal->id; ?>" type="hidden" id="form_delete_id" />
					<input name="cancel" value="Abort" class="btn btn-success" data-dismiss="modal" type="submit" id="form_cancel" />
					<input name="submit" value="Delete" class="btn btn-danger" type="submit" id="form_submit" />
				</form>
			</div>
		</div>	
	<?php endforeach; ?>
<?php endif; ?>
