<?php \Theme::instance()->asset->css(array('docs.css', 'highlight.css'), array(), 'header'); ?>

<div id="docs">
	<div id="spinner"></div>
	<div class="header">
		<div class="alignleft">
			<h1>Online Documentation</h1>
		</div>
		<div class="alignright">
			<?php echo \Form::open(array('name' => 'version_select', 'action' => '/', 'method' => 'post'));?>
				<h5 style="margin-bottom:0px;">FuelPHP version: </h5>
				<?php echo \Form::select('branch', $selection['version'], $versions, array('style' => 'min-width:125px;', 'onchange' => 'this.form.action = \'/documentation/version/\' + this.value; this.form.submit();')); ?>
			<?php echo \Form::close(); ?>
		</div>
	</div>

	<div class="content">

		<div class="sidebar">

			<ul>
				<li>
					<?php if ($editable): ?>
					<?php echo \Form::open(array('action' => '/documentation/add/'.$selection['version'], 'style' => 'display:inline;'));?>
					<button class="btn small purple">New page</button> &nbsp;
					<?php echo \Form::close(); ?>
					<?php endif; ?>
					<?php if ($menutree): ?>
					<button class="btn small expand_all">Expand all</button>
					<button class="btn small collapse_all">Collapse all</button>
					<?php endif; ?>
				</li>
			</ul>

			<div id="menu_list">
				<?php echo $menutree; ?>
			</div>

		</div>

		<div class="page">
			<?php if ($function == 'page'): ?>
				<?php if (\Auth::has_access('access.staff') or ($editable and \Session::get('ninjauth.authentication.provider', false) == 'github')): ?>
					<div class="editpage">
						<?php
							if ($doccount !== null)
							{
								echo \Form::open(array('action' => 'documentation/edit/'.$selection['page'], 'style' => 'display:inline;'));
								echo \Form::submit('edit', 'Edit', array('class' => 'btn small purple'));
								echo \Form::close();
								if ($doccount > 1)
								{
									echo \Form::open(array('action' => 'documentation/diff/'.$selection['page'], 'style' => 'display:inline;'));
									echo \Form::submit('diff', 'Versions', array('class' => 'btn small'));
									echo \Form::close();
								}
							}
							if ($page_id and \Auth::has_access('access.staff'))
							{
								echo \Form::open(array('action' => 'documentation/delete/'.$selection['page'], 'style' => 'display:inline;'));
								echo \Form::submit('delete', 'Delete', array('class' => 'btn small'));
								if ($pagedata)
								{
									if ($userinfo = \Auth::get_user_id())
									{
										list($driver, $id) = $userinfo;
										if ($id == $pagedata['user_id'])
										{
											echo \Form::submit('undo', 'Undo', array('class' => 'btn small'));
										}
									}
									if ($pagedata['editable'])
									{
										echo \Form::submit('lock', 'Lock', array('class' => 'btn small'));
									}
									else
									{
										echo \Form::submit('unlock', 'Unlock', array('class' => 'btn small'));
									}
								}
								echo \Form::close();
							}
						?>
					</div>
				<?php endif; ?>
				<p class="right">
					<?php if ($pagedata):?>
						Page last modified by <strong><?php echo $pagedata['user']; ?></strong> on <strong><?php $date = \Date::forge($pagedata['updated']); echo $date->format($pagedata['format'].'_full', true);?></strong> <?php echo $date->get_timezone_abbr(true); ?>
					<?php endif; ?>
				</p>
			<?php endif; ?>
			<div class="details">
			<?php echo $details; ?>
			</div>
		</div>
		<div class="clearfix"></div>

	</div>
</div>

<?php \Theme::instance()->asset->js(array('jquery.cooki.js', 'jquery.ui.nestedSortable.js', 'jquery.clickable.js', 'highlight.pack.js'), array(), 'footer'); ?>
