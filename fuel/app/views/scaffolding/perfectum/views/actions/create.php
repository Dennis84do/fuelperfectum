<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-plus"></i><span class="break"></span>New <?php echo \Str::ucfirst($singular_name); ?></h2>
			<div class="box-icon">
				<a href="/<?php echo $uri; ?>"><i class="icon-list"></i></a>
				<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
			</div>
		</div>
		<?php echo '<?php'; ?> echo render('<?php echo $view_path ?>/_form'); ?>
	</div><!--/span-->
</div><!--/row-->