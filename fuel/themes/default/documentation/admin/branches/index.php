<?php if ($versions): ?>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th></th>
			<th>Version</th>
			<th>Default?</th>
			<th>Editable?</th>
			<th class="center">Options</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($versions as $version): ?>		<tr>

			<td class="right shrink"><?php echo '#'.$version->id; ?></td>
			<td><?php echo $version->major.'.'.$version->minor.'/'.$version->branch; ?></td>
			<td><?php echo $version->default ? 'Yes' : 'No'; ?></td>
			<td><?php echo $version->editable ? 'Yes' : 'No'; ?></td>
			<td class="center shrink">
				<?php echo Html::anchor('documentation/admin/branches/view/'.$version->id, 'View', array('class' => 'btn btn-mini')); ?>
				<?php echo Html::anchor('documentation/admin/branches/edit/'.$version->id, 'Edit', array('class' => 'btn btn-mini')); ?>
				<?php echo Html::anchor('documentation/admin/branches/delete/'.$version->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-mini')); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php echo \Pagination::create_links(); ?>

<?php else: ?>
<p>There are no source branches defined.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('documentation/admin/branches/create', 'Add new branch', array('class' => 'btn btn-success pull-right')); ?>
</p>
