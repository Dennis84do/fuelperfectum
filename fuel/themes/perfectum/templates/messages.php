				<!-- Begin messages -->
				<?php if (Session::get_flash('error')): ?>
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Error</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</div>
				<?php endif; ?>

				<?php if (Session::get_flash('warning')): ?>
					<div class="alert alert-block">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Warning</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('warning'))); ?>
					</div>	
				<?php endif; ?>

				<?php if (Session::get_flash('success')): ?>
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Success</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</div>		
				<?php endif; ?>

				<?php if (Session::get_flash('info')): ?>
					<div class="alert alert-info">
						<button class="close" data-dismiss="alert" type="button">×</button>
						<strong>Info</strong>
						<?php echo implode('</p><p>', e((array) Session::get_flash('info'))); ?>
					</div>			
				<?php endif; ?>
				<!-- End of messages -->