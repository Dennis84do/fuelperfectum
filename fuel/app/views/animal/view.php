<h2>Viewing #<?php echo $animal->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $animal->name; ?></p>
<p>
	<strong>Age:</strong>
	<?php echo $animal->age; ?></p>

<?php echo Html::anchor('animal/edit/'.$animal->id, 'Edit'); ?> |
<?php echo Html::anchor('animal', 'Back'); ?>