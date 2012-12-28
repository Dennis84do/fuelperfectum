<!-- Show Object Overview -->
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-list"></i><span class="break"></span><?=$table_head?></h2>
			<div class="box-icon">
				<a href="<?php echo Uri::base(false).'monkey/create' ?>"><i class="icon-plus"></i></a>
				<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<?php if ($monkeys): ?>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					<th>Name</th>
					<th>Description</th>
					<th>Bio</th>
					<th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	<?php foreach ($monkeys as $monkey): ?>
				<tr>
					<td class="center"><?php echo $monkey->name; ?></td>
					<td class="center"><?php echo $monkey->description; ?></td>
					<td class="center"><?php echo $monkey->bio; ?></td>
					<!-- <td class="center"><?php #render_label('Active','green'); ?></td> -->
					<td class="center">
						<a class="btn btn-success" href="#viewModal_<?=$monkey->id?>" data-toggle="modal">
							<i class="icon-eye-open icon-white"></i>  
						</a>
						<a class="btn btn-info" href="<?php echo Uri::base(false).'monkey/edit/'.$monkey->id ?>">
							<i class="icon-edit icon-white"></i>  
						</a>
						<a class="btn btn-danger" href="#deleteModal_<?=$monkey->id?>" data-toggle="modal">
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
					<th>Description</th>
					<th>Bio</th>
					<th>Actions</th>
				  </tr>
			  </thead>   
		  	</table>            
		</div>		
		<?php endif; ?><p>	
	</div><!--/span-->

</div><!--/row-->

<?php if ($monkeys): ?>

	<?php foreach ($monkeys as $monkey): ?>

		<!-- Modal View Object -->
		<div class="modal hide fade" id="viewModal_<?=$monkey->id?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3><?=$read_Object?>&nbsp;#<?=$monkey->id?></h3>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr><th>Name</th><td><?php echo $monkey->name; ?></td></tr>
					<tr><th>Description</th><td><?php echo $monkey->description; ?></td></tr>
					<tr><th>Bio</th><td><?php echo $monkey->bio; ?></td></tr>
			    </table>            
			</div>
			<div class="modal-footer">
				<?php echo Form::submit(array('name'=>'cancel','value'=>'Back','class'=>'btn btn-success','data-dismiss'=>'modal')); ?>
			</div>
		</div>	

		<!-- Modal Delete Object -->
		<div class="modal hide fade" id="deleteModal_<?=$monkey->id?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3><?=$delete_Object?>&nbsp;#<?=$monkey->id?></h3>
			</div>
			<div class="modal-body">		
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<tr><th>Name</th><td><?php echo $monkey->name; ?></td></tr>
					<tr><th>Description</th><td><?php echo $monkey->description; ?></td></tr>
					<tr><th>Bio</th><td><?php echo $monkey->bio; ?></td></tr>
			    </table>            
			</div>
			<div class="modal-footer">
				<?php
				echo Form::open('monkey/delete/'.$monkey->id);		
				echo Form::hidden('delete_id', $monkey->id);			
				echo Form::submit(array('name'=>'cancel','value'=>'Abort','class'=>'btn btn-success','data-dismiss'=>'modal'));
				echo Form::submit(array('name'=>'submit','value'=>'Delete','class'=>'btn btn-danger'));
				echo Form::close(); 
				?>
			</div>
		</div>	

	<?php endforeach; ?>

<?php endif; ?><p>	