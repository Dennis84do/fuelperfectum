<!-- start: Main Menu -->
<div class="span2 main-menu-span">
	<div class="nav-collapse sidebar-nav">
		<ul id="nav" class="nav nav-tabs nav-stacked main-menu">

			<?php foreach ($navitems as $__nav): ?>
			<li><a href="<?php echo $__nav['link']; ?>" class="<?php echo $__nav['class']?>"><i class="<?php echo $__nav['icon']?>"></i><span class="hidden-tablet"> <?php echo $__nav['name']?></span></a></li>
			<?php endforeach; ?>

<!-- 			<li><a href="index-2.html"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
			<li><a href="ui.html"><i class="icon-eye-open icon-white"></i><span class="hidden-tablet"> UI Features</span></a></li>
			<li><a href="form.html"><i class="icon-edit icon-white"></i><span class="hidden-tablet"> Forms</span></a></li>
			<li><a href="chart.html"><i class="icon-list-alt icon-white"></i><span class="hidden-tablet"> Charts</span></a></li>
			<li><a href="typography.html"><i class="icon-font icon-white"></i><span class="hidden-tablet"> Typography</span></a></li>
			<li><a href="gallery.html"><i class="icon-picture icon-white"></i><span class="hidden-tablet"> Gallery</span></a></li>
			<li><a href="table.html"><i class="icon-align-justify icon-white"></i><span class="hidden-tablet"> Tables</span></a></li>
			<li><a href="calendar.html"><i class="icon-calendar icon-white"></i><span class="hidden-tablet"> Calendar</span></a></li>
			<li><a href="grid.html"><i class="icon-th icon-white"></i><span class="hidden-tablet"> Grid</span></a></li>
			<li><a href="file-manager.html"><i class="icon-folder-open icon-white"></i><span class="hidden-tablet"> File Manager</span></a></li>
			<li><a href="icon.html"><i class="icon-star icon-white"></i><span class="hidden-tablet"> Icons</span></a></li>
			<li><a href="login.html"><i class="icon-lock icon-white"></i><span class="hidden-tablet"> Login Page</span></a></li>
 -->
		</ul>
	</div><!--/.well -->
</div><!--/span-->
<!-- end: Main Menu -->