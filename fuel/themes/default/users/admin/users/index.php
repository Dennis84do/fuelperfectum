<?php if ($users): ?>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th></th>
			<th>Username</th>
			<th>Email</th>
			<th>Group</th>
			<th>Active</th>
			<th>Joined</th>
			<th>Last visit</th>
			<th class="center">Options</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td class="right shrink"><?php echo '#'.$user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo isset($groupnames[$user->group]) ? $groupnames[$user->group]['name'] : ('Group '.$user->group) ; ?></td>
			<td class="center"><?php echo $user->group == -1 ? 'No' : 'Yes'; ?></td>
			<td><?php echo Date::forge($user->created_at)->format('eu_datetime'); ?></td>
			<td><?php echo Date::forge($user->last_login)->format('eu_datetime'); ?></td>
			<td class="center shrink">
				<?php echo Html::anchor('admin/users/users/view/'.$user->id, 'View', array('class' => 'btn btn-mini')); ?>
				<?php echo Html::anchor('admin/users/users/edit/'.$user->id, 'Edit', array('class' => 'btn btn-mini')); ?>
				<?php echo Html::anchor('admin/users/users/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-mini')); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php echo \Pagination::create_links(); ?>

<?php else: ?>
<p>There are no users defined.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/users/users/create', 'Add new User', array('class' => 'btn btn-success pull-right')); ?>
</p>
