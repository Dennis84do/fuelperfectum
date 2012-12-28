<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-edit"></i><span class="break"></span>Editing Animal #<?php echo $animal->id; ?></h2>
			<div class="box-icon">
				<a href="/animal"><i class="icon-list"></i></a>
				<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<?php echo render('animal/_form'); ?>
	</div><!--/span-->
</div><!--/row-->